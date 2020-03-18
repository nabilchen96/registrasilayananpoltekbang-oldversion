@extends('layouts.userapp')

@section('content')
<section class="map_area" id="contact">
    <div class="contact_info">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact_details">
                        <div class="signup-image">
                            <figure><img width="100%" src="imgs/signup-image.jpg" alt="sing up image"></figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact_form_left">
                        <div class="row">
                            <h1>Login</h1>
                            <br>
                            <form class="comment_form_inner" action="{{ url('/login') }}" method="post">
                                @csrf
                                
                                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="checkbox icheck">
                                    <label class="">
                                        <input type="checkbox"> Remember Me
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('password/reset')}}">Lupa Password ?</a>
                                    </label>
                                  </div> 
                                
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-default submit_btn" type="submit">Masuk</button>
                                    <a href="{{url('register')}}" class="btn btn-info submit_btn" type="submit">Registrasi</a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
        