 
@section('content')
<form>
        <div class="form-group">
          <label for="username" class="col-form-label">Jenis Transportasi</label>
          <input type="text" class="form-control" name="jenis_transportasi" id="jenis_transportasi" disabled placeholder="{{ $transportasi->tipe_perjalanan->nama }}">
        </div>
        <div class="form-group">
          <label for="name" class="col-form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" disabled placeholder="{{ $transportasi->nama }}">
        </div>
      </form>
@endsection