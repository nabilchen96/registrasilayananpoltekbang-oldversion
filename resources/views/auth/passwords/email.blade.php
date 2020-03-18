@extends('layouts.userapp')

@section('content')
<section class="map_area" id="contact">
    <div class="contact_info">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact_details">
                        <div class="signup-image">
                            <figure><img width="100%" src="{{ asset('imgs/signup-image.jpg') }}" alt="sing up image"></figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact_form_left">
                        <div class="row">
                            <h1>{{ __('Reset Password') }}</h1>
                            <br>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" class="comment_form_inner" action="{{ route('password.email') }}">
                                @csrf
        
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
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

