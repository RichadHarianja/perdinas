@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

@section('content')

<div class="col-md-12 col-sm-12  ">
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
      <div class="x_content">
        <a href="{{ route('register.perjalanan') }}"><button type="button" class="btn btn-dark" style="float: right;"> <span class="glyphicon glyphicon-plus"></span>Tambah</button></a>
        <h2>Daftar Tujuan Perjalanan</h2>


        <div class="table-responsive">
          <table class="table table-striped jambo_table bulk_action">
            <thead>
              <tr class="headings">
                <th class="column-title">No </th>
                <th class="column-title">Nama</th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="bulk-actions" colspan="7">
                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
              </tr>
              </thead>

            <tbody>
              @forelse ($perjalanan as $jalan)
              <tr class="even pointer">
                <td class=" ">{{ $loop->iteration }}</td>
                <td class=" ">{{ $jalan->nama }}</td>
                <td> 
                  <form method="POST"  action="{{ route('destroy.perjalanan', $jalan->id) }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <span class="input-group-btn">
                      <button class="btn btn-info" type="button" style="padding: 0px 5px;">
                          <span class="glyphicon glyphicon-eye-open" 
                            id="modalViewPerjalanan" 
                            data-toggle="tooltip" 
                            data-attr="{{ route('show.perjalanan', $jalan->id) }}"
                            data-target="#viewPerjalananModal"
                            style="cursor:pointer;font-size:15px; "title="View">                              
                          </span>
                      </button>
                    </span>
                    <span class="input-group-btn">
                      <a href="{{ route ('perjalanan.edit', $jalan->id) }}">
                      <button class="btn btn-primary" type="button" style="padding: 0px 5px;">
                          <span class="glyphicon glyphicon-edit" data-toggle="tooltip" style="cursor:pointer;font-size:15px; "title="Edit"></span>
                      </button>
                      </a>
                    </span>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-danger" style="padding: 0px 5px;" onclick="return confirm('Anda yakin akan menghapus data tujuan perjalanan :: {{$jalan->nama}} ?');" value="Delete">
                          <span class="glyphicon glyphicon-trash" data-toggle="tooltip"style="cursor:pointer;font-size:15px; "title="Delete" ></span>
                      </button>
                    </span>

                  </form>
                </td>
              </tr>
              @empty
              <tr>
                  <td colspan="8">There is no data.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>            
      </div>
    </div>
  </div>


  <div class="modal fade" id="viewPerjalananModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="ubah_password">Detail Data Tujuan Perjalanan</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="modalBodyPerjalanan">
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    </div>
    </div>
  </div>
  </div>

  @section('extra-scripts')
  <script type="text/javascript">
        $(document).on('click', '#modalViewPerjalanan', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(result) {
                    $('#viewPerjalananModal').modal("show");
                    $('#modalBodyPerjalanan').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
  </script>
  @endsection
@endsection
