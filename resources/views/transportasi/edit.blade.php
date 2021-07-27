@extends('layouts.master')

@section('title', 'Sistem Perjalan Dinas')

@section('content')

<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Edit Transportasi</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-3 col-sm-1  profile_left">
					</div>
			   	<div class="col-md-8">
				   	<form method="POST" action="{{ route('update.transportasi', $transportasi->id) }}"  action="" enctype="multipart/form-data">
			   		{{ csrf_field() }}
        			{{ method_field('POST') }}

					<div class="card mb-3">
						<div class="card-body">

							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Tipe Perjalanan<span class="required">*</span></h6></span>
								</div>
								<div class="col-sm-9 text-secondary">
									<select name="tipe_perjalanan_id" class="form-control  @error('tipe_perjalanan_id') is-invalid @enderror" >
										@foreach ($tipe_perjalanan as $perjalanan)
											<option value="{{ $perjalanan->id }}" @if($transportasi->tipe_perjalanan_id == $perjalanan->id) selected @endif>{{ $perjalanan->nama }}</option>

										@endforeach
							      
								    </select>
								    @error('perjalanan')
								        <span class="invalid-feedback" role="alert">
								            <strong>{{ $message }}</strong>
								        </span>
								    @enderror
								</div>
							</div>					
							<hr>

							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Nama<span class="required">*</span></h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="nama" name="nama" required="required" class="form-control" value="{{$transportasi->nama}}">
								</div>
							</div>
							<hr>


							<div class="row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success">Simpan</button>
            						<a href="{{ url('/transportasi') }}" class="btn btn-danger">Kembali</a>
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