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
                                <h1>Daftar Peserta</h1>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <a href="{{url('tambahpeserta')}}" class="btn btn-success">Tambah Data Peserta</a>
                            <br><br>
                            <div class="table-responsive">
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
                                            <td>{{$v->tempatlahir}}, {{date('d-m-Y', strtotime($v->tanggallahir ))}}</td>
                                            <td>{{$v->jeniskelamin}}</td>
                                            <td>{{$v->nohp}}</td>
                                            <td><a class="btn btn-success">Detail</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br><br><br><br><br>
                        </div>
                    </div>
                    <br><br><br><br><br>
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
                        <h1 class="m-0 text-dark">Data Peserta</h1>
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
                                    <?php $data = DB::table('pesertas')->get(); ?>
                                    @foreach ($data as $k => $v)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{$v->nama}}</td>
                                            <td>{{$v->tempatlahir}}, {{$v->tanggallahir}}</td>
                                            <td>{{$v->jeniskelamin}}</td>
                                            <td>{{$v->nohp}}</td>
                                            <td><a href="#" class="btn btn-success">Detail</a></td>
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
@push('script')
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            });
        });
    </script>
@endpush