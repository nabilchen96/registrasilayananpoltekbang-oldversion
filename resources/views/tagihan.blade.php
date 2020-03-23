@extends( (Auth::user()->role == 'perusahaan' or Auth::user()->role == 'perorangan' ) ? 'layouts.userapp' : 'layouts.adminapp')
@if (Auth::user()->role == 'perusahaan' or Auth::user()->role == 'perorangan')
    @section('content')
        <br>
        <section class="map_area" id="contact">
            <div class="contact_info">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-success" role="alert">
                                <h1>Tagihan</h1>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">No Tagihan</th>
                                        <th scope="col">Layanan</th>
                                        <th scope="col">Tgl Tagihan</th>
                                        <th scope="col">Tgl Jatuh Tempo</th>
                                        <th scope="col">Total Bayar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">
                                            Detail Tagihan
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tagihan as $k => $v)
                                            @if ($v->daftarlayanan->iduser == Auth::id())
                                                <tr>
                                                    <td>{{$k+1}}</td>
                                                    <td>{{$v->nopembayaran}}</td>
                                                    <td>{{$v->daftarlayanan->layanan->layanan}}</td>
                                                    <td>{{date('d-m-Y', strtotime($v->tgltagihan))}}</td>
                                                    <td>{{date('d-m-Y', strtotime($v->tgljatuhtempo))}}</td>
                                                    <td>
                                                        {{"Rp " . number_format($v->jumlahbayar,2,',','.')}}
                                                    </td>
                                                    <td>
                                                        @if ($v->status == 'belum lunas')
                                                            <span class="label label-danger">{{$v->status}}</span>
                                                        @else  
                                                            <span class="label label-success">{{$v->status}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url('detailtagihan')}}/{{$v->idtagihan}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br><br><br><br><br><br><br><br>
                        </div>
                        <br><br><br><br><br><br><br><br>
                    </div>
                </div>
            </div>
        </section>
    @endsection
@else 
    @section('content')
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Tagihan</h1>
            </div>
          </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th>No Tagihan</th>
                                    <th scope="col">Layanan</th>
                                    <th scope="col">Tgl Tagihan</th>
                                    <th scope="col">Tgl Jatuh Tempo</th>
                                    <th scope="col">Total Bayar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">
                                        Detail Tagihan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tagihan as $k => $v)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$v->notagihan}}</td>
                                        <td>{{$v->daftarlayanan->layanan->layanan}}</td>
                                        <td>{{$v->tgltagihan}}</td>
                                        <td>{{$v->tgljatuhtempo}}</td>
                                        <td>{{$v->jumlahbayar}}</td>
                                        <td>
                                            @if ($v->status == 'belum lunas')
                                                <span class="label label-danger">{{$v->status}}</span>
                                            @else  
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('detailtagihan')}}/{{$v->idtagihan}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
@endif