@extends('layouts.userapp')
@section('content')
<br>
<section class="map_area" id="contact">
    <div class="contact_info">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                        <h1>Registrasi Peserta</h1>
                    </div>
                </div>
                    <form class="col-sm-12" action="{{url('prosestambahpeserta')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pelatihan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="iddaftar">
                                    @foreach ($peserta as $item)
                                        <option value="{{$item->iddaftar}}">{{$item->layanan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Peserta</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" minlength="3" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tempat/Tgl Lahir</label>
                            <div class="col-sm-5">
                                <input type="text" name="tempatlahir" class="form-control" required>
                            </div>
                            <div class="col-sm-5">
                                <input type="date" name="tanggallahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jeniskelamin" required>
                                    <option value="">-Jenis Kelamin-</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="number" name="nik" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="text" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="number" name="nohp" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Ijazah Terakhir</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="ijazah" required>
                                    <option value="">-Jenjang-</option>
                                    <option>SMP</option>
                                    <option>SMA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default submit_btn pull-right" type="submit">Next</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection