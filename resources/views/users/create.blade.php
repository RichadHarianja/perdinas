@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

@section('content')

  <!-- Start Table -->


<form name="form" action="{{ route('store.users') }}" method="post" class="form-horizontal" enctype="multipart/form-data" onsubmit="return numberValidation()">
{{ csrf_field() }}


  <span class="section">Tambah User</span>
  <div class="field item form-group">
      <label class="col-form-label col-md-3 col-sm-3  label-align">Username <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6">
          <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="username" required="required" />
          @foreach($errors->get('username') as $error)
            <span class="help-block" style="color: red; font-weight: bold; font-size: 10px;">{{ $error }}</span>
          @endforeach
      </div>
  </div>
  <div class="field item form-group">
      <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6">
          <input class="form-control" name="name" class='name' required="required" type="text" /></div>
  </div>
  <div class="field item form-group">
      <label class="col-form-label col-md-3 col-sm-3  label-align">Password <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6">
          <input class="form-control" type="password" class='password' name="password"  required='required'></div>
  </div>
  <div class="field item form-group">
      <label class="col-form-label col-md-3 col-sm-3  label-align">Posisi <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6">
          <input class="form-control" type="text" class='posisi' name="posisi" required='required' /></div>
  </div>
  <div class="field item form-group">
      <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Bank <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6">
          <input class="form-control" type="text" class='text' name="bank"  required='required'></div>
  </div>
  <div class="field item form-group">
      <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Rekening  <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6">
          <input class="form-control" type="text"  name="rekening"  class="form-control" required='required'>
          <span id="numberText" style="color: red; font-weight: bold; font-size: 10px;"></span>
      </div>
  </div>
  <div class="field item form-group">
      <label class="col-form-label col-md-3 col-sm-3  label-align ">Role</label>
      <div class="col-md-6 col-sm-6 ">
        <select name="role_id" class="form-control  @error('role_id') is-invalid @enderror" >
            <option value="" selected disabled>--Pilih Role--</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->nama }}</option>
        @endforeach
        </select>
        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
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

<script type="text/javascript">
	function numberValidation() {
        var n = document.form.rekening.value;
        if (isNaN(n)) {
            document.getElementById("numberText").innerHTML ="The no rekening must be a number.";
            return false;
        } else {
            return true;
        }
    }
</script>

@endsection
