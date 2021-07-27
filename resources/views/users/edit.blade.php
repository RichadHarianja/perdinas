@extends('layouts.master')

@section('title', 'Sistem Perjalan Dinas')

@section('content')

<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Edit User</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-3 col-sm-1  profile_left">
					</div>
			   	<div class="col-md-8">
				   	<form method="POST" action="{{ route('update.users', $users->id) }}"  action="" enctype="multipart/form-data">
			   		{{ csrf_field() }}
        			{{ method_field('POST') }}

					<div class="card mb-3">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="username" name="username" required="required" class="form-control" value="{{$users->username}}" disabled>
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Nama Lengkap<span class="required">*</span></h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="name" name="name" required="required" class="form-control" value="{{$users->name}}">
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Posisi<span class="required">*</span></h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="posisi" name="posisi" required="required" class="form-control" value="{{$users->posisi}}">
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Password</h6>
								</div>
								<div class="col-sm-6 text-secondary">
									<input type="password" id="password" name="password" class="form-control" placeholder="***************" value="" disabled="">
								</div>
								<div class="col-sm-3">
									<a href="{{ route('changeUserPassword' , $users->id)}}">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ubah Password</button></a>
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Nama Bank<span class="required">*</span></h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="bank" name="bank" required="required" class="form-control" value="{{$users->bank}}">
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">No Rekening<span class="required">*</span></h6></span>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="rekening" name="rekening" required="required" class="form-control @error('rekening') is-invalid @enderror" value="{{$users->rekening}}">
									 @error('rekening')
					                    <span class="invalid-feedback" role="alert">
					                        <strong>{{ $message }}</strong>
					                    </span>
					                 @enderror
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Role<span class="required">*</span></h6></span>
								</div>
								<div class="col-sm-9 text-secondary">
									<select name="role_id" class="form-control  @error('role_id') is-invalid @enderror" >
										@foreach ($roles as $role)
											<option value="{{ $role->id }}" @if($users->role_id == $role->id) selected @endif>{{ $role->nama }}</option>

										@endforeach
							      
								    </select>
								    @error('role')
								        <span class="invalid-feedback" role="alert">
								            <strong>{{ $message }}</strong>
								        </span>
								    @enderror
								</div>
							</div>

							
							<hr>

							<div class="row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success">Simpan</button>
            						<a href="{{ url('/users') }}" class="btn btn-danger">Kembali</a>
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