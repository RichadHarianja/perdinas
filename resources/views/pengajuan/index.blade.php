@extends('layouts.master')

@section('title', 'Sistem Informasi Perjalanan Dinas')

@section('content')

  <!-- Start Table -->
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
                          <td><a href="#" data-toggle="modal" class="modal-trigger value @if($item->status_id > 20) text-danger @elseif($item->status_id == 8) text-success @else text-warning  @endif" data-id="{{ $item->id }}" data-parent-id="{{ $item->parent_id }}" data-target=".modal-pengajuan"><strong>{{ $item->status->nama }}</strong></td>
                          <td>   
                            <a href="{{ route('pengajuan.view', ['id' => $item->id]) }}">
                                <span class="input-group-btn">
                                <button class="btn btn-info" type="button" style="padding: 0px 5px;">
                                <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip"style="cursor:pointer;font-size:15px; "title="View"></span>
                                </button>
                              </span>
                              @if(($item->status_id == 23 || $item->status_id == 24 || $item->status_id == 25) && $item->edited == false)
                              <a href="{{ route('pengajuan.edit', ['id' => $item->id]) }}">
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" style="padding: 0px 5px;">
                                <span class="glyphicon glyphicon-edit" data-toggle="tooltip" style="cursor:pointer;font-size:15px; "title="Edit"></span>
                                </button>
                              </span>
                              @endif
                              @if($item->status_id == 8)
                              <a href="{{ route('pengajuan.download', ['id' => $item->id]) }}">
                              <span class="input-group-btn">
                                <button class="btn btn-success" type="button" style="padding: 0px 5px;">
                                <span class="glyphicon glyphicon-download" data-toggle="tooltip" style="cursor:pointer;font-size:15px; "title="Download"></span>
                                </button>
                              </span>
                              @endif
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
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Jam</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody id="riwayat-pengajuan">
                            
                          </tbody>
                        </table>  
                        <div id="keterangan-penolakan"></div>
                        <div id="pengajuan-sebelumnya"></div>
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
      var parent_id = $(this).data('parent-id');
      $.ajax({
      url: '/pengajuan/'+pengajuan_id+'/riwayat',
      dataType: 'json',
      type: 'get',
      success: function(data){ 
        table=""
        parent_pengajuan = ""
        $.each(data, function(i, item) {
            time = new Date(item.created_at)
            approver = "";
            document.getElementById("keterangan-penolakan").innerHTML = ""
            document.getElementById("pengajuan-sebelumnya").innerHTML = ""
            if(item.status_id == 14 || item.status_id == 15){
                approver += " by "+item.approver.name;
            }

            if(item.status_id == 2){
              parent_pengajuan += " <a class='text-primary' href='/pengajuan/"+parent_id+"'>Lihat pengajuan sebelumnya</a>";
            }
            table += "<tr><th>"+(i+1)+"</th><td>"+time.getDate()+"-"+(time.getMonth()+1)+"-"+(time.getFullYear())+"<td>"+time.getHours()+":"+((time.getMinutes()<10?'0':'') + time.getMinutes())+"</td><td>"+item.status.nama.concat(approver)+"</td></tr>";
        })
        document.getElementById("riwayat-pengajuan").innerHTML = table;

        latestStatus = data[data.length-1].status_id
        if(latestStatus == 23 || latestStatus == 24 || latestStatus == 25){
          document.getElementById("keterangan-penolakan").innerHTML = "<p><strong>Keterangan: </strong>: "+data[data.length-1].keterangan;
        }
        document.getElementById("pengajuan-sebelumnya").innerHTML = parent_pengajuan;
        console.log(parent_pengajuan);
      }
      });
    });
  });
</script>

@endsection
