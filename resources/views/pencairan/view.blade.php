@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

@section('content')

<div class="x_panel">
    <div class="x_content">
        @if(Session::has('error'))
        <div class="alert alert-error alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error!</strong> {{ Session::get('error') }}
        </div>
        @endif
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

            <fieldset class="border p-2">
                <legend  class="w-auto col-form-label-sm"><strong>Info Pencairan Biaya Perjalanan Dinas</strong></legend>

                <form class="" action="" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="patch">
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Lampiran<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control-file" type="file" name="attachment" required='required' />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="col-md-6 offset-md-3">
                                <button type='submit' name="action" value="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </field>

        </div>
    </div>
</div>


@endsection
