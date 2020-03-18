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
                <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert">
                        <p>Tambah data peserta tidak dapat diproses, anda telah mendaftarkan semua peserta pada pendidikan yang dipilih. 
                            Untuk menambah data, hapus data peserta lain atau edit data peserta jika terjadi kesalahan pada data yang diinput</p>
                        <br>
                        <a href="{{url('peserta')}}" class="btn btn-success">Daftar Peserta</a>
                    </div>
                    <br><br><br><br>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection