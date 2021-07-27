@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

@section('content')

  <!-- Start Table -->
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                    <a href="{{ url('pengajuan/create') }}"><button type="button" class="btn btn-dark" style="float: right;"> <span class="glyphicon glyphicon-plus"></span>Tambah</button></a>
                    <h2>Daftar Pengajuan</h2>


                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Tanggal Pengajuan </th>
                            <th class="column-title">Judul Pengajuan </th>
                            <th class="column-title">Total Biaya </th>
                            <th class="column-title">Detail Pengajuan </th>
                            <th class="column-title">Status </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                          </thead>


                        <tbody>

                        @forelse($pengajuan as $item)
                        @if($loop->even)
                        <tr class="even pointer">
                        @else
                        <tr class="odd pointer">
                        @endif
                          <td class=" ">{{ date_format($item->created_at,"d-M-Y") }}</td>
                          <td class=" ">{{ $item->judul_perjalanan }}</td>
                          <td class=" ">Rp. {{ number_format($item->jumlah_pengajuan,0,",",".") }}</td>
                          <td class=" ">{{ $item->keterangan }}</td>
                          <td class="a-right a-right "><a href="#" data-toggle="modal" class="modal-trigger" data-id="{{ $item->id }}" data-target=".modal-pengajuan">{{ $item->status->nama }}</button></td>
                          <td>   
                            <a href="{{ url('pengajuan/view') }}">
                                <span class="input-group-btn">
                                <button class="btn btn-info" type="button">
                                <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip"style="cursor:pointer;font-size:15px; "title="View"></span>
                                </button>
                              </span>
                              <a href="{{ url('pengajuan/edit') }}">
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                <span class="glyphicon glyphicon-edit" data-toggle="tooltip" style="cursor:pointer;font-size:15px; "title="Edit"></span>
                                </button>
                              </span>
                              <span class="input-group-btn">
                                <button type="submit" class="btn btn-danger" type="button"  value="Delete">
                                  <span class="glyphicon glyphicon-trash" data-toggle="tooltip"style="cursor:pointer;font-size:15px; "title="Delete" ></span>
                                </button>
                                </span>
                          </td>
                        </tr>
                        @empty
                          <td colspan="6" class=" "><center>Data tidak Ditemukan</center></td>
                        @endforelse
                        </tbody>
                      </table>
                    </div>

                    <div class="modal fade modal-pengajuan" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Status Proses Pengajuan</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Tanggal</th>
                              <th>Jam</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody id="riwayat-pengajuan">
                            
                          </tbody>
                        </table>  
                        </div>

                      </div>
                    </div>
                  </div>
                  </div>
            
                  </div>
                </div>
              </div>
              <!-- End Table-->

@endsection

@section('extra-scripts')

<script>
  $(document).ready(function(){

    $('.modal-trigger').click(function(){
      
      var pengajuan_id = $(this).data('id');
      $.ajax({
      url: '/pengajuan/'+pengajuan_id+'/riwayat',
      dataType: 'json',
      type: 'get',
      success: function(data){ 
        table=""
        $.each(data, function(i, item) {
            time = new Date(item.created_at)
            table += "<tr><th>"+(i+1)+"</th><td>"+time.getDate()+"-"+(time.getMonth()+1)+"-"+(time.getFullYear())+"<td>"+time.getHours()+":"+((time.getMinutes()<10?'0':'') + time.getMinutes())+"</td><td>"+item.status.nama+"</td></tr>";
        })
        document.getElementById("riwayat-pengajuan").innerHTML = table;
      }
      });
    });
  });
</script>

@endsection