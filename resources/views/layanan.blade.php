@extends( (Auth::user()->role == 'perusahaan' or Auth::user()->role == 'perorangan' ) ? 'layouts.userapp' : 'layouts.app')
@if (Auth::user()->role == 'perusahaan' or Auth::user()->role == 'perorangan')
  @section('content')
    <br>
    <section class="map_area" id="contact">
        <div class="contact_info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                        <h1>Registrasi Layanan</h1>
                    </div>
                    </div>
                    <form class="col-sm-12" action="{{url('prosesdaftarlayanan')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Layanan</label>
                            <div class="col-sm-10">
                                <select name="idlayanan" onchange="isi_otomatis()" id="idlayanan" class="form-control">
                                    <option value=>-Pilih Layanan Pendidikan-</option>
                                    @foreach ($data as $item)
                                        <option value="{{$item->idlayanan}}">{{$item->layanan}}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" onkeyup="isi_otomatis()" id="idlayanan"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsi" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tarif</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tarif" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <label>Rincian Tarif</label>
                                <textarea id="rinciantarif" disabled class="form-control" rows=5></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jadwal</label>
                            <div class="col-sm-10">
                                <select name="idjadwal" class="form-control" id="jadwal">
                                    <option>-Pilih Jadwal-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Peserta</label>
                            <div class="col-sm-10">
                                <select name="jumlah" id="jumlah" onchange="totalHarga()" class="form-control">
                                    <option>-Pilih Jumlah Peserta-</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Total Biaya</label>
                            <div class="col-sm-10">
                                <input type="number" disabled id="totalharga" class="form-control">
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
    </section>
  @endsection
@else
  @section('content')
    
  @endsection
@endif
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    function isi_otomatis(){
        var idlayanan = $("#idlayanan").val();
        $.ajax({
            url: 'datalayanan',
            data:"idlayanan="+idlayanan ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            if(obj.kategoriseleksi == 'tidak'){
                $('#tarif').val(parseInt(obj.tarifpendaftaran) + parseInt(obj.tarifseleksi) + parseInt(obj.tarifdaftarulang));
                $('#rinciantarif').val(
                    "Biaya Pendaftaran : " + obj.tarifpendaftaran + "\n"
                    +"Biaya Seleksi : " + obj.tarifseleksi + "\n"
                    +"Biaya Daftar Ulang : " + obj.tarifdaftarulang + "\n"
                );
            }else{
                $('#tarif').val("");
                $('#rinciantarif').val("");
            }
            $('#deskripsi').val(obj.deskripsi);
            var jadwal = $('#jadwal').html("<option>-Pilih Jadwal-</option>")

            for(var i = 0; i < obj.kapasitas.length; i++){
                jadwal = $('#jadwal').append("<option value="+obj.kapasitas[i]['idkapasitas']+">"+obj.kapasitas[i]['jadwal']+"</option>")
            }
        });
    }

    function totalHarga(){
        var jumlah = $('#jumlah').val();
        $('#totalharga').val($('#tarif').val() * jumlah);
    }
</script>
@endpush