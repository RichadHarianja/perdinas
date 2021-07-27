<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;
use App\Models\RiwayatStatusPengajuan;

class ApprovalController extends Controller
{
    //
    public function index(){

        if(Auth::user()->role_id == 3){
            $pengajuan = Pengajuan::where([
                'PUK_id' => Auth::user()->id,
                'status_id' => Auth::user()->role_id
            ])->get();
        }
        else{
            $pengajuan = Pengajuan::where([
                'status_id' => Auth::user()->role_id
            ])->get();
        }
        
        return view('approval.index', compact('pengajuan'));
    }

    public function view($id){
        
        $pengajuan = Pengajuan::where('id', $id)->first();
        return view('approval.view', compact('pengajuan'));
    }

    public function process($id, Request $request){

        $role_id = Auth::user()->role_id;
        $action = $request->action;
        $pengajuan = Pengajuan::where('id', $id)->first();

        if($request->action == "terima"){
            $pengajuan->status_id = 1+$role_id;
            $pengajuan->save();
            $riwayat_pengajuan = RiwayatStatusPengajuan::create([
                'approver_id' => Auth::user()->id,
                'pengajuan_id' => $pengajuan->id,
                'status_id' => 10+$role_id,
            ]);

            $riwayat_pengajuan = RiwayatStatusPengajuan::create([
                'approver_id' => Auth::user()->id,
                'pengajuan_id' => $pengajuan->id,
                'status_id' => 1+$role_id,
            ]);
        }
        else{
            $pengajuan->status_id = 20+$role_id;
            $pengajuan->save();
            $riwayat_pengajuan = RiwayatStatusPengajuan::create([
                'approver_id' => Auth::user()->id,
                'pengajuan_id' => $pengajuan->id,
                'status_id' => 20+$role_id,
                'keterangan' => $request->keterangan
            ]);
        }
       return redirect()->route('approval.index')->with('success', 'Proses approval berhasil');
    }
}
