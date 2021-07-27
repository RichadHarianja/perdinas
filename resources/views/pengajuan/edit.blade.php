@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

@section('content')

  <!-- Start Table -->


      <form class="" action="{{ route('pengajuan.update', ['id' => $pengajuan->id]) }}" method="post" novalidate enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="patch">
          <span class="section">Buat Pengajuan</span>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Username/NIK<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input readonly class="form-control" name="username" required="required" value="{{ Auth::user()->username }}" />
                  <input type="hidden" name="pengaju_id" value="{{ Auth::user()->id }}">
              </div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" class='email' type="text" readonly value="{{ Auth::user()->name }}" /></div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Posisi<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" value="{{ Auth::user()->posisi }}" readonly /></div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Bank <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" type="text" data-validate-minmax="10,100" value="{{ Auth::user()->bank }}" readonly></div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Rekening<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" value="{{ Auth::user()->rekening }}" readonly></div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Judul Perjalanan<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                  <input class="form-control" value="{{ $pengajuan->judul_perjalanan }}" class='time' type="text" name="judul_perjalanan" required='required'></div>
          </div>
          <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align ">Tipe Perjalanan</label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="tipe-perjalanan">
                          <option value="">---Choose option---</option>
                          @foreach($tipe_perjalanan as $item)
                            <option value="{{ $item->id }}" @if($pengajuan->jenis_transportasi->tipe_perjalanan_id == $item->id) selected @endif >{{ $item->nama }}</option>
                          @endforeach
                        </select>
                      </div>
          </div>
          <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align ">Tujuan Perjalanan</label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" name="tujuan_perjalanan_id">
                            <option>---Choose option---</option>
                          @foreach($tujuan_perjalanan as $item )
                            <option value="{{ $item->id }}" @if($pengajuan->tujuan_perjalanan_id == $item->id) selected @endif>{{ $item->nama }}</option>
                          @endforeach
                        </select>
                      </div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Waktu Keberangkatan<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6">
                <div class="input-group date" id="datetime_keberangkatan" data-target-input="nearest">
                    <input value="{{ $pengajuan->datetime_keberangkatan }}" type="text" class="form-control datetimepicker-input" data-target="#datetime_keberangkatan" name="datetime_keberangkatan" />
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
                    <input value="{{ $pengajuan->datetime_kembali }}" type="text" class="form-control datetimepicker-input" data-target="#datetime_kembali" name="datetime_kembali" />
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
                            <option class=" jenis-transportasi tipe-perjalanan-{{ $item->tipe_perjalanan_id }}" value="{{ $item->id }}" @if($pengajuan->jenis_transportasi_id == $item->id) selected @endif>{{ $item->nama }}</option>
                        @endforeach
                        </select>
                      </div>
          </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Tujuan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input value="{{ $pengajuan->alamat_tujuan }}" class="form-control" type="text" name="alamat_tujuan" required='required' /></div>
    </div>
     <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Asal<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input value="{{ $pengajuan->alamat_asal }}" class="form-control" type="text" name="alamat_asal" required='required' /></div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" required="required" name='keterangan'>{{ $pengajuan->keterangan }}</textarea></div>
    </div>
     <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Total Biaya Pengajuan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input value="{{ $pengajuan->jumlah_pengajuan }}" class="form-control" type="text" id="jumlah_pengajuan" name="jumlah_pengajuan" required='required' /></div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">PUK<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <select name="PUK_id" class="form-control">
                <option>---Choose option---</option>
                @foreach($PUK as $item )
                <option value="{{ $item->id }}" @if($pengajuan->PUK_id == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3  label-align">Surat Dinas</label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control" type="file" name="attachment" /></div>
    </div>
    <div class="ln_solid">
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                <button type='submit' class="btn btn-primary">Submit</button>
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
