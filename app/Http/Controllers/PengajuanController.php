<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TipePerjalanan;
use App\Models\TujuanPerjalanan;
use App\Models\User;
use App\Models\JenisTransportasi;
use App\Models\Pengajuan;
use App\Models\Role;
use App\Models\RiwayatStatusPengajuan;
use Barryvdh\DomPDF\Facade as PDF;


class PengajuanController extends Controller
{
    //
    public function index(){
        $pengajuan = Pengajuan::where('pengaju_id', Auth::id())->get()->sortByDesc('created_at');
        return view('pengajuan.index', compact('pengajuan'));
    }

    public function pengajuanriwayat(){
        $pengajuan = Pengajuan::where('pengaju_id', Auth::id())->get();
        return view('pengajuan.riwayat', compact('pengajuan'));
    }

    public function create(){

        $tipe_perjalanan = TipePerjalanan::all();
        $tujuan_perjalanan = TujuanPerjalanan::all();
        $PUK = User::where('role_id', 3)->get();
        $jenis_transportasi = JenisTransportasi::all();

        return view('pengajuan.create', compact(['tipe_perjalanan', 'tujuan_perjalanan', 'PUK', 'jenis_transportasi']));
    }

    public function store(Request $request){
        $pengajuan = new Pengajuan($request->all());
        $pengajuan->status_id = 3;
        $pengajuan->jumlah_pengajuan = str_replace('.', '', str_replace("Rp. ","",$request->jumlah_pengajuan));
        $path = $request->attachment->store('public/attachments');
        $pengajuan->attachment = str_replace('public/', 'storage/', $path);
        $pengajuan->save();

        RiwayatStatusPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'status_id' => 1
        ]);

        RiwayatStatusPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'status_id' => 3
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan telah ditambahkan');
    }

    public function view($id){
        $pengajuan = Pengajuan::find($id);
        return view('pengajuan.view', compact('pengajuan'));
    }

    public function riwayat($id){
        $riwayat = RiwayatStatusPengajuan::where('pengajuan_id', $id)->get();
        $riwayat->load('status');
        $riwayat->load('approver');
        return $riwayat->toJson();
    }

    public function download($id){
        $pengajuan = Pengajuan::find($id);

        if($pengajuan->status_id != 8){
            return redirect()->route('pengajuan.index')->with('error', 'Status pengajuan tidak complete');
        }

        //return view('pengajuan.surat-tugas', compact('pengajuan'));

        $pdf = PDF::loadView('pengajuan.surat-tugas', compact('pengajuan'));
        return $pdf->stream();
    }

    public function home(){
        $users = User::with('role')->get();
        $karyawan = User::whereIn('role_id', ['2'])->get();
        $puk1 = User::whereIn('role_id', ['3'])->get();
        $bc = User::whereIn('role_id', ['4'])->get();
        $pc = User::whereIn('role_id', ['5'])->get();
        $pengajuan = Pengajuan::where('pengaju_id', Auth::id())->get();
        $puk = Pengajuan::where('PUK_id', Auth::id())->get();
        $total_count = Pengajuan::all();
        $pengajuan_cancel = Pengajuan::whereIn('status_id', ['23','24','25'])->get();
        $pengajuan_cancel_karyawan = Pengajuan::whereIn('status_id', ['23','24','25'])->where('pengaju_id', Auth::id())->get();
        $pengajuan_cancel_puk = Pengajuan::whereIn('status_id', ['23'])->where('PUK_id', Auth::id())->get();
        $pengajuan_tertunda = Pengajuan::whereIn('status_id', ['1','3','4', '5', '6', '7', '13', '14', '15'])->get();
        $pengajuan_tertunda_karyawan = Pengajuan::whereIn('status_id', ['1','3','4', '5', '6', '7', '13', '14', '15'])->where('pengaju_id', Auth::id())->get();
        $pengajuan_tertunda_puk = Pengajuan::whereIn('status_id', ['3'])->where('PUK_id', Auth::id())->get();
        $pengajuan_success = Pengajuan::whereIn('status_id', ['8'])->get();
        $pengajuan_success_karyawan = Pengajuan::whereIn('status_id', ['8'])->where('pengaju_id', Auth::id())->get();
        $pengajuan_success_puk = Pengajuan::whereIn('status_id', ['13', '8'])->where('PUK_id', Auth::id())->get();

        $count_cancel_karyawan= $pengajuan_cancel_karyawan->count();
        $count_tertunda_karyawan= $pengajuan_tertunda_karyawan->count();
        $count_success_karyawan= $pengajuan_success_karyawan->count();
        $count_cancel_puk= $pengajuan_cancel_puk->count();
        $count_tertunda_puk= $pengajuan_tertunda_puk->count();
        $count_success_puk= $pengajuan_success_puk->count();
        $count_cancel= $pengajuan_cancel->count();
        $count_tertunda= $pengajuan_tertunda->count();
        $count_success= $pengajuan_success->count();
        $count = $total_count->count();
        $count_puk = $puk->count();

        $pengajuan_puk = Pengajuan::whereIn('status_id', ['3','13','23','8'])->where('PUK_id', Auth::id())->get();
        $pengajuan_custodian = Pengajuan::whereIn('status_id', ['4','14','24','8'])->get();
        $pengajuan_payment = Pengajuan::whereIn('status_id', ['5','6','7','8','15','25'])->get();

        return view('home', compact(
            [ 'pengajuan', 
            'puk',
            'users',
            'karyawan',
            'puk1',
            'bc',
            'pc',
            'count', 
            'count_puk',
            'count_cancel', 
            'count_tertunda', 
            'count_success', 
            'count_cancel_karyawan', 
            'count_tertunda_karyawan', 
            'count_success_karyawan',
            'count_cancel_puk', 
            'count_tertunda_puk', 
            'count_success_puk',
            'total_count',
            'pengajuan_custodian',
            'pengajuan_payment',
            'pengajuan_puk'
        ]));
    }

    public function edit($id){
        $pengajuan = Pengajuan::find($id);
        $tipe_perjalanan = TipePerjalanan::all();
        $tujuan_perjalanan = TujuanPerjalanan::all();
        $PUK = User::where('role_id', 3)->get();
        $jenis_transportasi = JenisTransportasi::all();

        if($pengajuan->status_id == 23 || $pengajuan->status_id == 24 || $pengajuan->status_id == 25){
            return view('pengajuan.edit', compact(['pengajuan', 'tipe_perjalanan', 'tujuan_perjalanan', 'PUK', 'jenis_transportasi']));
        }

        return redirect()->route('pengajuan.index')->with('error', 'Tidak dapat mengedit pengajuan');     
    }

    public function update($id, Request $request){

        $pengajuan = Pengajuan::find($id);
        $pengajuan->judul_perjalanan = $request->judul_perjalanan;

        $pengajuan->judul_perjalanan = $request->judul_perjalanan;
        $pengajuan->tujuan_perjalanan_id = $request->tujuan_perjalanan_id;
        $pengajuan->datetime_keberangkatan = $request->datetime_keberangkatan;
        $pengajuan->datetime_kembali = $request->datetime_kembali;
        $pengajuan->jenis_transportasi_id = $request->jenis_transportasi_id;
        $pengajuan->alamat_tujuan = $request->alamat_tujuan;
        $pengajuan->alamat_asal = $request->alamat_asal;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->jumlah_pengajuan = str_replace('.', '', str_replace("Rp. ","",$request->jumlah_pengajuan));
        $pengajuan->PUK_id = $request->PUK_id;
        $pengajuan->status_id = 3;

        if ($request->hasFile('attachment')) {
            $path = $request->attachment->store('public/attachments');
            $pengajuan->attachment = str_replace('public/', 'storage/', $path);
        }
        $pengajuan->save();

        RiwayatStatusPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'status_id' => 2
        ]);

        RiwayatStatusPengajuan::create([
            'pengajuan_id' => $pengajuan->id,
            'status_id' => 3
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diedit');
    }
}
