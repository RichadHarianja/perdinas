@extends('layouts.master')

@section('title', 'Sistem Perjalanan Dinas')

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
                    <h2>Daftar Pengajuan</h2>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Tanggal Pengajuan </th>
                            <th class="column-title">Judul Pengajuan </th>
                            <th class="column-title">Total Biaya </th>
                            <th class="column-title">Detail Pengajuan </th>
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
                          <td>   
                          <a href="{{ route('pencairan.view', ['id' => $item->id]) }}">
                              <span class="input-group-btn">
                              <button class="btn btn-primary" type="button" style="padding: 0px 5px;">
                              <span class="glyphicon glyphicon-edit" data-toggle="tooltip"style="cursor:pointer;font-size:15px; "title="View"></span>
                              </button>
                            </span></a>
                          </td>
                        </tr>
                        @empty
                          <td colspan="6" class=" "><center>Data tidak Ditemukan</center></td>
                        @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
            
                  </div>
                </div>
              </div>
              <!-- End Table-->

@endsection