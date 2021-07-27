@extends('layouts.master')

@section('title', 'Sistem Informasi Perjalanan Dinas')

@section('content')

  <!-- Start Table -->
<div class="row">  
<div class="col-md-12 col-sm-12">
  <div class="x_panel">

    <h2>Welcome {{Auth::user()->name}}</h2>
  </div>
</div>
</div>

@if(Auth::check() && Auth::user()->role_id  == 1)
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar User</h2>
        <ul class="nav navbar-right panel_toolbox">
        
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Posisi</th>
                    <th>Role</th>
                   </tr>
                </thead>
                
                <tbody>
                @forelse($users as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $item->username }}</td>
                    <td class=" ">{{ $item->name }}</td>
                    <td class=" ">{{$item->posisi}}</td>
                    <td class=" ">{{ $item->role->nama}}</td>
                  </tr>
                @empty
                <p>There is no data.</p>
                @endforelse
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>

      <div class="table-responsive">
      </div>
    </div>
  </div>
</div>
</div>
@endif

@if(Auth::check() && Auth::user()->role_id  == 2)
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Riwayat Pengajuan Terbaru</h2>
        <ul class="nav navbar-right panel_toolbox">
        
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Judul Pengajuan</th>
                    <th>Total Biaya</th>
                    <th>Detail Pengajuan</th>
                    <th>Status</th>
                   </tr>
                </thead>
                
                <tbody>
                @forelse($pengajuan as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ date_format($item->created_at,"d-M-Y") }}</td>
                    <td class=" ">{{ $item->judul_perjalanan }}</td>
                    <td class=" ">Rp. {{ number_format($item->jumlah_pengajuan,0,",",".") }}</td>
                    <td class=" ">{{ $item->keterangan }}</td>
                    <td class="a-right a-right ">{{ $item->status->nama }}</td>
                  </tr>
                @empty
                <p>There is no data.</p>
                @endforelse
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>

      <div class="table-responsive">
      </div>
    </div>
  </div>
</div>
</div>
@endif

@if(Auth::check() && Auth::user()->role_id  == 3)
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Riwayat Pengajuan Terbaru</h2>
        <ul class="nav navbar-right panel_toolbox">
        
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
              <table id="puk" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Tanggal Pengajuan</th>
                    <th>Judul Pengajuan</th>
                    <th>Total Biaya</th>
                    <th>Detail Pengajuan</th>
                    <th>Status</th>
                    <th>Action</th>
                   </tr>
                </thead>

                <tbody>
                @forelse($pengajuan_puk as $item)
                  <tr>
                    <td>{{ date_format($item->created_at,"d-M-Y") }}</td>
                    <td class=" ">{{ $item->judul_perjalanan }}</td>
                    <td class=" ">Rp. {{ number_format($item->jumlah_pengajuan,0,",",".") }}</td>
                    <td class=" ">{{ $item->keterangan }}</td>
                    <td class="a-right a-right "><a href="#" data-toggle="modal" class="modal-trigger value @if($item->status_id > 20) text-danger @elseif($item->status_id == 8) text-success @else text-warning  @endif" data-id="{{ $item->id }}" data-parent-id="{{ $item->parent_id }}" data-target=".modal-pengajuan"><strong>{{ $item->status->nama }}</strong></td>
                    <td>
                    <a href="{{ route('pengajuan.view', ['id' => $item->id]) }}">
                        <span class="input-group-btn">
                        <button class="btn btn-info" type="button" style="padding: 0px 5px;">
                        <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip"style="cursor:pointer;font-size:15px; "title="View"></span>
                        </button>
                      </span>
                    </a>
                    </td>
                  </tr>
                @empty
                <p>There is no data.</p>
                @endforelse
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>

      <div class="table-responsive">
      </div>
    </div>
  </div>
</div>
</div>
@endif

@if(Auth::check() && Auth::user()->role_id  == 4) 
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Riwayat Pengajuan Terbaru</h2>
        <ul class="nav navbar-right panel_toolbox">
        
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
              <table id="bcpc" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Judul Pengajuan</th>
                    <th>Total Biaya</th>
                    <th>Detail Pengajuan</th>
                    <th>Status</th>
                    <th>Action</th>
                   </tr>
                </thead>

                <tbody>
                @forelse($pengajuan_custodian as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ date_format($item->created_at,"d-M-Y") }}</td>
                    <td class=" ">{{ $item->judul_perjalanan }}</td>
                    <td class=" ">Rp. {{ number_format($item->jumlah_pengajuan,0,",",".") }}</td>
                    <td class=" ">{{ $item->keterangan }}</td>
                    <td class="a-right a-right "><a href="#" data-toggle="modal" class="modal-trigger value @if($item->status_id > 20) text-danger @elseif($item->status_id == 8) text-success @else text-warning  @endif" data-id="{{ $item->id }}" data-parent-id="{{ $item->parent_id }}" data-target=".modal-pengajuan"><strong>{{ $item->status->nama }}</strong></td>
                    <td>
                    <a href="{{ route('pengajuan.view', ['id' => $item->id]) }}">
                        <span class="input-group-btn">
                        <button class="btn btn-info" type="button" style="padding: 0px 5px;">
                        <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip"style="cursor:pointer;font-size:15px; "title="View"></span>
                        </button>
                      </span>
                    </a>
                    </td>
                  </tr>
                @empty
                <p>There is no data.</p>
                @endforelse
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>

      <div class="table-responsive">
      </div>
    </div>
  </div>
</div>
</div>
@endif

@if(Auth::check() && Auth::user()->role_id  == 5) 
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Riwayat Pengajuan Terbaru</h2>
        <ul class="nav navbar-right panel_toolbox">
        
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
              <table id="bcpc" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Judul Pengajuan</th>
                    <th>Total Biaya</th>
                    <th>Detail Pengajuan</th>
                    <th>Status</th>
                    <th>Action</th>
                   </tr>
                </thead>

                <tbody>
                @forelse($pengajuan_payment as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ date_format($item->created_at,"d-M-Y") }}</td>
                    <td class=" ">{{ $item->judul_perjalanan }}</td>
                    <td class=" ">Rp. {{ number_format($item->jumlah_pengajuan,0,",",".") }}</td>
                    <td class=" ">{{ $item->keterangan }}</td>
                    <td class="a-right a-right "><a href="#" data-toggle="modal" class="modal-trigger value @if($item->status_id > 20) text-danger @elseif($item->status_id == 8) text-success @else text-warning  @endif" data-id="{{ $item->id }}" data-parent-id="{{ $item->parent_id }}" data-target=".modal-pengajuan"><strong>{{ $item->status->nama }}</strong></td>
                    <td>
                    <a href="{{ route('pengajuan.view', ['id' => $item->id]) }}">
                        <span class="input-group-btn">
                        <button class="btn btn-info" type="button" style="padding: 0px 5px;">
                        <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip"style="cursor:pointer;font-size:15px; "title="View"></span>
                        </button>
                      </span>
                    </a>
                    </td>
                  </tr>
                @empty
                <p>There is no data.</p>
                @endforelse
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>

      <div class="table-responsive">
      </div>
    </div>
  </div>
</div>
</div>
@endif

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

@section('extra-scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#puk').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf'
        ]
    } );
} );
$(document).ready(function() {
    $('#bcpc').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf'
        ]
    } );
} );

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

@endsection