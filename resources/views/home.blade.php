@extends( (Auth::user()->role == 'perusahaan' or Auth::user()->role == 'perorangan' ) ? 'layouts.userapp' : 'layouts.app')
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
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis velit in tristique. Curabitur ac urna urna sed accumsan... <a href="{{url('layanan')}}">Read More</a></p>
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
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sagittis iaculis velit in tristique. Curabitur ac urna urna sed accumsan... <a href="{{url('layanan')}}">Read More</a></p>
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