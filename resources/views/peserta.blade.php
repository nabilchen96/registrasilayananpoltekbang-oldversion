@extends('layouts.userapp')
@section('content')
<br>
<section class="map_area" id="contact">
    <div class="contact_info">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                        <h1>Daftar Peserta</h1>
                    </div>
                </div>

                <div class="col-sm-12">
                    
                    <a href="{{url('tambahpeserta')}}" class="btn btn-success">Tambah Data Peserta</a>
                    <br><br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Peserta</th>
                            <th scope="col">Tempat/Tgl Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $k => $v)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$v->nama}}</td>
                                <td>{{$v->tempatlahir}}, {{$v->tanggallahir}}</td>
                                <td>{{$v->jeniskelamin}}</td>
                                <td>{{$v->nohp}}</td>
                                <td><a class="btn btn-success">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
