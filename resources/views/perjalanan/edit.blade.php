@extends('layouts.master')

@section('title', 'Sistem Perjalan Dinas')

@section('content')

<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Tujuan Perjalanan</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-3 col-sm-1  profile_left">
          </div>
          <div class="col-md-8">
            <form method="POST" action="{{ route('update.perjalanan', $perjalanan->id) }}"  action="" enctype="multipart/form-data">
            {{ csrf_field() }}
              {{ method_field('POST') }}

          <div class="card mb-3">
            <div class="card-body">

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tujuan Perjalanan<span class="required">*</span></h6></span>
                </div>
                <div class="col-sm-9 text-secondary">
                </div>
              </div>          
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nama<span class="required">*</span></h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" id="nama" name="nama" required="required" class="form-control" value="{{$perjalanan->nama}}">
                </div>
              </div>
              <hr>


              <div class="row">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ url('/perjalanan') }}" class="btn btn-danger">Kembali</a>
                </div>
              </div>
            </div>
          </div>
            </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection