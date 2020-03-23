<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">

  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <body style="
      padding: 0 20;
  ">
    <div>
    @foreach ($tagihan as $item)
      <section class="content">
        <div class="row">
            <div style="margin-left: auto;">
                <div class="span12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><h2><strong>No Tagihan</strong></h2></td>
                                <td><h2>#{{$item->nopembayaran}}</h2></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Admin Poltekbang</strong><br>
                Jl. Adi Sucipto No.3012, Sukodadi<br>
                Kec. Sukarami, Palembang,<br>
                Sumatera selatan 30961<br>
                Phone: (804) 123-5432<br>
                Email: info@almasaeedstudio.com
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong>{{$item->name}}</strong><br>
                {{$item->alamat}}<br>
                Phone: (555) 539-1037<br>
                Email: {{$item->email}}
              </address>
            </div>
           
          </div>
          <!-- /.row -->
      
          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>No Tagihan</th>
                  <th>Tgl Tagihan</th>
                  <th>Layanan</th>
                  <th>Tarif</th>
                  <th>Biaya</th>
                  <th>Diskon</th>
                  <th>Total</th>
                  {{-- <th>Biaya Pendaftaran</th>
                  <th>Biaya Seleksi</th>
                  <th>Biaya Daftar Ulang</th>
                  <th>Total</th> --}}
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{"# ".$item->nopembayaran}}</td>
                        <td>{{ date('d-m-Y', strtotime($item->tgltagihan)) }}</td>
                        <td>{{$item->layanan}}</td>
                        <td>Tarif Pendaftaran</td>
                        <td>{{ "Rp ".number_format($item->tarifpendaftaran,0,',','.')}}</td>
                        <td>-</td>
                        <td>{{ "Rp ".number_format($item->tarifpendaftaran,0,',','.')}}</td>
                        {{-- <td>{{ "Rp ".number_format($item->tarifpendaftaran,0,',','.')}}</td>
                        <td>{{ "Rp ".number_format($item->tarifseleksi,0,',','.')}}</td>
                        <td>{{ "Rp ".number_format($item->tarifdaftarulang,0,',','.')}}</td>
                        <td>{{ "Rp ".number_format($item->tarifpendaftaran + $item->tarifseleksi + $item->tarifdaftarulang,0,',','.')}}</td> --}}
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>Tarif Seleksi</td>
                        <td>{{ "Rp ".number_format($item->tarifseleksi,0,',','.')}}</td>
                        <td>-</td>
                        <td>{{ "Rp ".number_format($item->tarifseleksi,0,',','.')}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>Tarif Daftar Ulang</td>
                        <td>{{ "Rp ".number_format($item->tarifdaftarulang,0,',','.')}}</td>
                        <td>-</td>
                        <td>{{ "Rp ".number_format($item->tarifdaftarulang,0,',','.')}}</td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <br>
        <div class="row">
            <div class="span4" id="invoice-total-block" style="margin-left: auto;">
                <div class="span12">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td><strong>Peserta</strong></td>
                                <td>{{$item->jumlahpeserta}} orang</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Grand Total</strong></td>
                                <td>{{"Rp " .number_format($item->jumlahbayar,0,',','.')}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </section>
    @endforeach
    </div>
  </body>
  <script>
      window.print()
  </script>

