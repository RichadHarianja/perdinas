<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;
use App\Models\RiwayatStatusPengajuan;

use Illuminate\Http\Request;

class PencairanController extends Controller
{
    //
    public function index(){
        $pengajuan = Pengajuan::where('status_id', 6)->get();

        return view('pencairan.index', compact('pengajuan'));
    }

    public function view($id){
        $pengajuan = Pengajuan::where('id', $id)->first();

        return view('pencairan.view', compact('pengajuan'));
    }

    public function process($id, Request $request){

        if(!$request->hasFile('attachment'))
            return redirect()->back()->with('error', 'Silahkan upload lampiran pencairan');
        
        $pengajuan = Pengajuan::find($id);
        $path = $request->attachment->store('public/attachments');
        $pengajuan->attachment_pencairan = str_replace('public/', 'storage/', $path);

        $pengajuan->status_id = 8;

        $pengajuan->save();

        RiwayatStatusPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'status_id' => 7
        ]);

        RiwayatStatusPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'status_id' => 8
        ]);

        return redirect()->route('pencairan.index')->with('success', 'Upload pencairan dana berhasil');
    }
}
