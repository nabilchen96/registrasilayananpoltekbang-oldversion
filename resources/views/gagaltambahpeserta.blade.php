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
                    <div class="alert alert-success" role="alert">
                        <p>anda telah mendaftarkan semua peserta pada layanan yang dipilih. Silahkan menuju ke menu Tagihan untuk melihat
                            tagihan anda. Untuk menambah data, hapus data peserta lain atau edit data peserta jika terjadi kesalahan pada data yang diinput</p>
                        <br>
                        <a href="{{url('peserta')}}" class="btn btn-success">Daftar Peserta</a>
                        <a href="{{url('peserta')}}" class="btn btn-info">Tagihan</a>
                    </div>
                    <br><br><br><br>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection