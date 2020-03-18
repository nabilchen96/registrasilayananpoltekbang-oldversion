@extends('layouts.userapp')
@section('content')
    <section class="map_area" id="contact">
        <div class="contact_info">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact_form_left">
                            <div class="row">
                                <h1>Registrasi</h1>
                                <br>
                                <div class="">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1" data-toggle="tab">Daftar Perorangan</a></li>
                                        <li><a href="#tab_2" data-toggle="tab">Daftar Kemitraan</a></li>
                                    </ul>
                                    <br>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">
                                            <form class="comment_form_inner" action="{{ url('/register') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="role" value="perorangan">
                                                <input type="hidden" name="alamat" value="">
                                                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Full Name">
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Email">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="subject"  placeholder="No Hp">
                                                </div>
                                                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                {{-- <div class="form-group">
                                                    <textarea class="form-control"  id="message" rows="1" name="alamat" placeholder="Alamat"></textarea>
                                                </div> --}}
                                                
                                                <div class="form-group">
                                                    <button class="btn btn-default submit_btn" type="submit">Daftar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab_2">
                                            <form class="comment_form_inner" action="{{ url('/register') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="role" value="perusahaan">
                                                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Nama Perusahaan">
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Email Perusahaan">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="subject"  placeholder="No Telpon">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control"  id="message" rows="1" name="alamat" placeholder="Alamat Perusahaan"></textarea>
                                                </div>
                                                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-default submit_btn" type="submit">Daftar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact_details">
                            <div class="signup-image">
                                <figure><img width="100%" src="imgs/signup-image.jpg" alt="sing up image"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
