@extends('layouts.master')

@section('title', 'Sistem Perjalan Dinas')

@section('content')

<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			

			@if(Session::has('success'))
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Sukses!</strong> {{ Session::get('success') }}
                  </div>
              @endif

              @if(Session::has('error'))
                <div class="alert alert-error alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ Session::get('error') }}
                  </div>
              @endif
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Diri {{$profile->name}}</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-3 col-sm-1  profile_left">
						<div class="profile_img">
							<div id="crop-avatar">
								<img class="img-responsive avatar-view "src="{{ asset('/images/img.png') }}" style="width:250px;height:250px;" alt="Avatar" title="Change the avatar">
							</div>
						</div>
						<h3>{{$profile->name}}</h3>
						<h4>{{$profile->posisi}}</h4>
					</div>
					<div class="col-md-8">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0">Username</h6>
									</div>
									<div class="col-sm-9 text-secondary">{{$profile->username}}</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0">Nama Lengkap</h6>
									</div>
									<div class="col-sm-9 text-secondary">{{$profile->name}}</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0">Posisi</h6>
									</div>
									<div class="col-sm-9 text-secondary">{{$profile->posisi}}</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0">Nama Bank</h6>
									</div>
									<div class="col-sm-9 text-secondary">{{$profile->bank}}</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0">Nomor Rekening</h6>
									</div>
									<div class="col-sm-9 text-secondary">{{$profile->rekening}}</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-12">
										<a class="btn btn-primary " href="{{ route('profile.edit', $profile->id) }}">Ubah Profil</a>
									</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection