<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="imgs/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>SuSan - App Landing Page</title>

        <!-- Icon css link -->
        <link href="{{ asset('vendores/themify-icon/themify-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('csss/font-awesome.min.css" rel="stylesheet') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('csss/solid.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('csss/light.css') }}">
        <link href="{{asset('vendores/linears-icon/style.css')}}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{ asset('csss/bootstrap.min.css') }}" rel="stylesheet">
        
        <!-- RS5.0 Layers and Navigation Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendores/revolution/css/layers.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendores/revolution/css/navigation.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendores/revolution/css/settings.css') }}">
        
        <!-- Extra plugin css -->
        <link href="{{ asset('vendores/animate-css/animate.css" rel="stylesheet') }}">
        <link href="{{ asset('vendores/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        
        <link href="{{ asset('csss/style.css') }}" rel="stylesheet">
        <link href="{{ asset('csss/responsive.css') }}" rel="stylesheet">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
        .main_menu_area .navbar-default {
            background: blue;
        }
        .slider_area .rev_slider ul li .register_angkar_btn {
            /* color: black; */
            border: 2px solid black;
            color: black;
        }
        </style>
    </head>
    <body>
        <header class="main_menu_area">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('')}}">
                            {{-- <img src="{{ asset('imgs/logo.png') }}" alt=""> --}}
                            {{-- <a href="{{ route('login') }}"><h1 style="
                                margin: 30px;
                                color: white;
                                font-size: 40px;
                            ">LPP</h1></a> --}}
                            <img src="http://trbu.rafahcuttindo.com/wp-content/uploads/2020/03/logo_poltekbang-removebg-retina.png" style="
                                width: 135px;
                                margin-top : 5px;
                                margin-bottom : 5px;
                            ">
                        </a>
                    </div>
        
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            {{-- <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="#layanan">Layanan</a></li> --}}
                            @if (Auth::check())
                                <li><a href="{{url('home')}}">Layanan</a></li>
                                <li><a href="{{url('peserta')}}">Data Peserta</a></li>
                                <li><a href="{{url('tagihan')}}">Tagihan</a></li>
                                <li><a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a></li>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                </form>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        @yield('content')
        <footer class="footer_area">
            <div class="container">
                <div class="pull-left">
                    <h4><p>Copyright {{date('Y')}} All rights reserved</p> </h4>
                </div>
                <div class="pull-right">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Policy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="{{ asset('jss/jquery-2.1.4.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('jss/bootstrap.min.js') }}"></script>
        
        <script src="{{ asset('vendores/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('vendores/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <!--RS5.0 Extensions-->
        <script src="{{ asset('vendores/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
        <script src="{{ asset('vendores/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendores/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendores/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendores/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
        <script src="{{ asset('vendores/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
        <script src="{{ asset('vendores/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
        <script src="{{ asset('vendores/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <script src="{{ asset('vendores/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
        <!-- Extra plugin js -->
        <script src="{{ asset('vendores/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendores/flipster/jquery.flipster.min.js') }}"></script>
        <!-- contact js -->
        <script src="{{ asset('jss/jquery.form.js') }}"></script>
        <script src="{{ asset('jss/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('jss/contact.js') }}"></script>
        
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="{{ asset('jss/gmaps.min.js') }}"></script>
        
        <script src="{{ asset('jss/video_player.js') }}"></script>
        <script src="{{ asset('jss/theme.js') }}"></script>
        @stack('scripts')
        
    </body>
</html>