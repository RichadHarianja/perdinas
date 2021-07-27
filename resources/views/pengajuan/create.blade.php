@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

@section('content')

  <!-- Start Table -->


      <form class="form-horizontal" action="{{ route('pengajuan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
          <span class="section">Buat Pengajuan</span>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Username/NIK<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input readonly class="form-control" name="username" required="required" value="{{ Auth::user()->username }}" />
                  <input type="hidden" name="pengaju_id" value="{{ Auth::user()->id }}" required="true">
              </div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" class='email' type="text" readonly value="{{ Auth::user()->name }}" required="required"/></div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Posisi<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" value="{{ Auth::user()->posisi }}" readonly required="required" /></div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Bank <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" data-validate-minmax="10,100" value="{{ Auth::user()->bank }}" readonly required="required"></div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Rekening<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" value="{{ Auth::user()->rekening }}" required="required" readonly></div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Judul Perjalanan<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" class='time' type="text" name="judul_perjalanan" required></div>
          </div>
          <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align " class="required">Tipe Perjalanan</label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="jenis_transportasi_id" class="form-control  @error('jenis_transportasi_id') is-invalid @enderror" id="tipe-perjalanan" name="jenis_transportasi_id" class="required">
                          <option value="">---Choose option---</option>
                          @foreach($tipe_perjalanan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
          </div>
          <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align ">Tujuan Perjalanan</label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" name="tujuan_perjalanan_id">
                            <option>---Choose option---</option>
                          @foreach($tujuan_perjalanan as $item )
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                        </select>
                      </div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Waktu Keberangkatan<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <div class="input-group date" id="datetime_keberangkatan" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetime_keberangkatan" name="datetime_keberangkatan" required="required"/>
                    <div class="input-group-append" data-target="#datetime_keberangkatan" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
              </div>
          </div>
           <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Waktu Kembali<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <div class="input-group date" id="datetime_kembali" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetime_kembali" name="datetime_kembali" required="required" />
                    <div class="input-group-append" data-target="#datetime_kembali" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
          </div>
           <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align ">Jenis Transportasi</label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" name="jenis_transportasi_id" id="jenis_transportasi_id">
                            <option value="">---Choose option---</option>
                        @foreach($jenis_transportasi as $item )
                            <option class=" jenis-transportasi tipe-perjalanan-{{ $item->tipe_perjalanan_id }}" value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                        </select>
                      </div>
          </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Tujuan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" type="text" name="alamat_tujuan" required='required' /></div>
    </div>
     <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Asal<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" type="text" name="alamat_asal" required='required' /></div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" required="required" name='keterangan'></textarea></div>
    </div>
     <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Total Biaya Pengajuan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" id="jumlah_pengajuan" type="text" name="jumlah_pengajuan" required='required' /></div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">PUK<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <select name="PUK_id" class="form-control">
                <option>---Choose option---</option>
                @foreach($PUK as $item )
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Surat Dinas<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" id="upload" type="file" name="attachment" required='required' onchange="return validate()"/><span class="error text-danger"><p>The attachment field is required.</p></span></div>
    </div>
    <div class="ln_solid">
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                <button type='submit' class="btn btn-primary">Submit</button>
                <button type='reset' class="btn btn-success">Reset</button>
            </div>
        </div>
    </div>
</form>
  <!-- End Table-->
@endsection

@section('extra-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.1.0/autoNumeric.min.js" integrity="sha512-U0/lvRgEOjWpS5e0JqXK6psnAToLecl7pR+c7EEnndsVkWq3qGdqIGQGN2qxSjrRnCyBJhoaktKXTVceVG2fTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $(function () {
            $('#datetime_keberangkatan').datetimepicker({
                minDate:new Date(),
                format : 'YYYY-MM-DD HH:mm'
            });
            $('#datetime_kembali').datetimepicker({
                useCurrent: false,
                format : 'YYYY-MM-DD HH:mm'
            });
            $("#datetime_keberangkatan").on("change.datetimepicker", function (e) {
                $('#datetime_kembali').datetimepicker('minDate', e.date);
            });
            $("#datetime_kembali").on("change.datetimepicker", function (e) {
                $('#datetime_keberangkatan').datetimepicker('maxDate', e.date);
            });
        });

        $("#tipe-perjalanan").change(function(){
            $("#jenis_transportasi_id").val('');
            tipe_perjalanan_id = $(this).val();
            $(".jenis-transportasi").hide();
            $(".tipe-perjalanan-"+tipe_perjalanan_id).show();
        });

        new AutoNumeric('#jumlah_pengajuan', { 
            currencySymbol : 'Rp. ',
            digitGroupSeparator : '.',
            decimalCharacter : ',',
            decimalPlaces: 0
         });
    });

</script>
@endsection
