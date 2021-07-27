@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

@section('content')

  <!-- Start Table -->


<form name="form" action="{{ route('store.perjalanan') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
{{ csrf_field() }}


  <span class="section">Tambah Tujuan Perjalanan</span>
  <div class="field item form-group">
      <div class="col-md-6 col-sm-6 ">
      </div>
  </div>
  <div class="field item form-group">
      <label class="col-form-label col-md-3 col-sm-3  label-align">Nama  <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6">
          <input class="form-control" name="nama" class='nama' required="required" type="text" /></div>
  </div>
  
  
  
  <div class="ln_solid">
      <div class="form-group">
          <div class="col-md-6 offset-md-3">
              <input class="btn btn-primary" type="submit" value="Simpan" class="btn btn-default">
              <button type='reset' class="btn btn-success">Reset</button>
          </div>
      </div>
  </div>

</form>

@endsection
