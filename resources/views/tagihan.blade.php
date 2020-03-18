@extends('layouts.userapp')
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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
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
                                                <a class="btn btn-success"><i class="fa fa-download"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <br><br><br><br><br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection