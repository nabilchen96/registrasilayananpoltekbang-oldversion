@extends( (Auth::user()->role == 'perusahaan' or Auth::user()->role == 'perorangan' ) ? 'layouts.userapp' : 'layouts.adminapp')
@if (Auth::user()->role == 'perusahaan' or Auth::user()->role == 'perorangan')
  @section('content')
    <br><br>
    <section class="latest_blog_area" id="layanan">
      <div class="container">
      <div class="main_title">
          <h2>Pilih Layanan</h2>
      </div>
          <div class="row">
              <div class="col-md-4">
                  <div class="latest_blog_item">
                      <center><h1>Pendidikan</h1></center>
                      <br>
                      <div class="l_blog_img">
                          <img width="100%" src="http://trbu.rafahcuttindo.com/wp-content/uploads/2020/03/ross-parmly-rf6ywHVkrlY-unsplash-scaled.jpg" alt="">
                          <div class="l_blog_hover">
                              <a href="{{ route('register') }}"><i class="lnr lnr-link"></i></a>
                          </div>
                      </div>
                      <br>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis velit in tristique. Curabitur ac urna urna sed accumsan... 
                        <a data-toggle="modal" data-target="#pendidikan">Pilih Layanan</a>
                    </p>
                  </div>
              </div>
              <div class="modal fade" id="pendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pilih Jenis Pendidikan</h5>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success" role="alert">
                            <a href="">Pendidikan Reguler</a>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <a href="">Pendidikan Non Reguler</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="latest_blog_item">
                      <center><h1>Pelatihan</h1></center>
                      <br>
                      <div class="l_blog_img">
                          <img width="100%" src="http://trbu.rafahcuttindo.com/wp-content/uploads/2020/03/ross-parmly-rf6ywHVkrlY-unsplash-scaled.jpg" alt="">
                          <div class="l_blog_hover">
                              <a href="{{ route('register') }}"><i class="lnr lnr-link"></i></a>
                          </div>
                      </div>
                      <br>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis velit in tristique. Curabitur ac urna urna sed accumsan... <a href="{{url('layanan')}}">Read More</a></p>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="latest_blog_item">
                      <center><h1>Penyewaan</h1></center>
                      <br>
                      <div class="l_blog_img">
                          <img width="100%" src="http://trbu.rafahcuttindo.com/wp-content/uploads/2020/03/ross-parmly-rf6ywHVkrlY-unsplash-scaled.jpg" alt="">
                          <div class="l_blog_hover">
                              <a href="{{ route('register') }}"><i class="lnr lnr-link"></i></a>
                          </div>
                      </div>
                      <br>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis velit in tristique. Curabitur ac urna urna sed accumsan... 
                        <a href="{{url('penyewaan')}}">Read More</a></p>
                  </div>
              </div>
          </div>
      </div>
    </section>
  @endsection
@else
  @section('content')
  @endsection
@endif