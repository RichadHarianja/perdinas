 
@section('content')
<form>
        <div class="form-group">
          <label for="username" class="col-form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" disabled placeholder="{{ $user->username }}">
        </div>
        <div class="form-group">
          <label for="name" class="col-form-label">Name</label>
          <input type="text" class="form-control" name="name" id="name" disabled placeholder="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="posisi" class="col-form-label">Posisi</label>
          <input type="text" class="form-control" name="posisi" id="posisi" disabled placeholder="{{ $user->posisi }}">
        </div>
        <div class="form-group">
          <label for="bank" class="col-form-label">Nama Bank</label>
          <input type="text" class="form-control" name="bank" id="bank" disabled placeholder="{{ $user->bank }}">
        </div>
        <div class="form-group">
          <label for="rekening" class="col-form-label">Nomor Rekening</label>
          <input type="text" class="form-control" name="rekening" id="rekening" disabled placeholder="{{ $user->rekening }}">
        </div>
        <div class="form-group">
          <label for="role" class="col-form-label">Role</label>
          <input type="text" class="form-control" name="role" id="role" disabled placeholder="{{ $user->role->nama }}">
        </div>
      </form>
@endsection