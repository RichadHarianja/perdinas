@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>Detail Pengajuan</h2>
        <div class="col-sm-6">
            <fieldset class="border p-2">
                <legend  class="w-auto col-form-label-sm" ><strong>Data Personal</strong></legend>
                <dl class="row">
                    <dt class="col-sm-4">Username</dt>
                    <dd class="col-sm-8">: {{ $pengajuan->pengaju->username }}</dd>
                    <dt class="col-sm-4">Nama Lengkap</dt>
                    <dd class="col-sm-8">: {{ $pengajuan->pengaju->name }}</dd>
                    <dt class="col-sm-4">Posisi</dt>
                    <dd class="col-sm-8">: {{ $pengajuan->pengaju->posisi }}</dd>
                </dl>
            </fieldset>
        </div>

        <div class="col-sm-6">
            <fieldset class="border p-2">
                <legend  class="w-auto col-form-label-sm"><strong>Info Rekening</strong></legend>
                <dl class="row">
                    <dt class="col-sm-4">Nama Bank</dt>
                    <dd class="col-sm-8">: {{ $pengajuan->pengaju->bank }}</dd>
                    <dt class="col-sm-4">No. Rekening</dt>
                    <dd class="col-sm-8">: {{ $pengajuan->pengaju->rekening }}</dd>
                </dl>
            </fieldset>
        </div>

        <div class="col-sm-12">
        <fieldset class="border p-2">
                <legend  class="w-auto col-form-label-sm"><strong>Data Perjalanan Dinas</strong></legend>
                <dl class="row">
                    <dt class="col-sm-3">Judul Perjalanan</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->judul_perjalanan }}</dd>
                    <dt class="col-sm-3">Tipe Perjalanan</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->jenis_transportasi->tipe_perjalanan->nama }}</dd>
                    <dt class="col-sm-3">Tujuan Perjalanan</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->tujuan_perjalanan->nama }}</dd>
                    <dt class="col-sm-3">Waktu Berangkat</dt>
                    <dd class="col-sm-9">: {{ date_format(date_create($pengajuan->datetime_keberangkatan),"d-M-Y H:i") }}</dd>
                    <dt class="col-sm-3">Waktu Kembali</dt>
                    <dd class="col-sm-9">: {{ date_format(date_create($pengajuan->datetime_kembali),"d-M-Y H:i") }}</dd>
                    <dt class="col-sm-3">Lama Perjalanan Dinas</dt>
                    <dd class="col-sm-9">: {{ round(abs(strtotime($pengajuan->datetime_kembali) - strtotime($pengajuan->datetime_keberangkatan))/86400) }} Hari</dd>
                    <dt class="col-sm-3">Jenis Transportasi</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->jenis_transportasi->nama }}</dd>
                    <dt class="col-sm-3">Alamat Tujuan</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->alamat_tujuan }}</dd>
                    <dt class="col-sm-3">Alamat Asal</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->alamat_asal }}</dd>
                    <dt class="col-sm-3">Alamat Tujuan</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->alamat_tujuan }}</dd>
                    <dt class="col-sm-3">Keterangan</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->keterangan }}</dd>
                    <dt class="col-sm-3">PUK</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->PUK->name }}</dd>
                    <dt class="col-sm-3">Total Biaya Pengajuan</dt>
                    <dd class="col-sm-9">: Rp. {{ number_format($pengajuan->jumlah_pengajuan,0,",",".") }}</dd>
                    <dt class="col-sm-3">Lampiran</dt>
                    <dd class="col-sm-9">: <a class="text-primary" href="{{ asset($pengajuan->attachment) }}"><strong>Download Lampiran</strong> </a></dd>
                </dl>
            </fieldset>
        </div>
        <div class="col-sm-12">
        <fieldset class="border p-2">
                <legend  class="w-auto col-form-label-sm"><strong>Status Pengajuan</strong></legend>
                <dl class="row">
                    <dt class="col-sm-3">Status</dt>
                    <dd class="col-sm-9 @if($pengajuan->status_id > 20) text-danger @elseif($pengajuan->status_id == 8) text-success @else text-warning  @endif">: {{ $pengajuan->status->nama }}</dd>
                    @if($pengajuan->status_id == 8)
                    <dt class="col-sm-3">Lampiran Pencairan Biaya Perjalanan Dinas</dt>
                    <dd class="col-sm-9">: <a class="text-primary" href="{{ asset($pengajuan->attachment_pencairan) }}"><strong>Download Lampiran</strong> </a></dd>
                    <dt class="col-sm-3">Surat Perjalanan Dinas</dt>
                    <dd class="col-sm-9">: <a class="text-primary" href="{{ route('pengajuan.download', ['id' => $pengajuan->id ]) }}"><strong>Download</strong> </a></dd>
                    @endif
                    @if($pengajuan->status_id == 23 || $pengajuan->status_id == 24 || $pengajuan->status_id == 25)
                    <dt class="col-sm-3">Keterangan</dt>
                    <dd class="col-sm-9">: {{ $pengajuan->riwayat_status_pengajuan[($pengajuan->riwayat_status_pengajuan->count())-1]->keterangan }}</dd>
                    @endif
                </dl>
                @if(($pengajuan->status_id == 23 || $pengajuan->status_id == 24 || $pengajuan->status_id == 25) && $pengajuan->edited == false && Auth::user()->role_id == 2)
                <a class="btn btn-primary" href="{{ route('pengajuan.edit', ['id' => $pengajuan->id]) }}">Edit</a>
                @endif
            </fieldset>
        </div>
    </div>
</div>

@endsection
