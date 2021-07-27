@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

@section('content')

<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ubah Password</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-3 col-sm-1  profile_left">
                    </div>
                <div class="col-md-8">

                        <form class="form-horizontal" method="POST" action="{{ route('changeProfilePasswords') }}">
                            {{ csrf_field() }}

                        <div class="card mb-3">
                            <div class="card-body">
                            <div class="panel-body">
                                @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                                @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-3 form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <h6 class="mb-0">Password Lama<span class="required">*</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="current-password" type="password" class="form-control" name="current-password" required>
                                    
                                    @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3 form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <h6 class="mb-0">Password Baru<span class="required">*</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="new-password" type="password" class="form-control" name="new-password" required>
                                    
                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3 form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <h6 class="mb-0">Ulangi Password Baru<span class="required">*</span></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ url('/profile') }}" class="btn btn-danger">Kembali</a>
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
</div>

@endsection