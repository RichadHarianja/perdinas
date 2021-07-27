@section('content')
<form>
        <div class="form-group">
          <label for="name" class="col-form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" disabled placeholder="{{ $perjalanan->nama }}">
        </div>
      </form>
@endsection