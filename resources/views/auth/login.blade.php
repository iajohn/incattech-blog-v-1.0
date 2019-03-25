@extends('layouts.bacKend')

@section('meta')
    @include('meta::manager', [
        'robots'        => 'all,follow',
        'title'         => 'Login',
        'description'   => 'Welcome to Incattech.com, the media arm of Incattech. Incattech is a Fashion Tech & Fashion Media Company based in Lagos Nigeria.',
        'image'         => 'https://incattech.com',
        'author'        => 'Incattech.com',
        'keywords'      => 'Login incattech, media, fashion, technology, tech, clothing, AR, VR, AI, retail, sustainability',
        'geo_region'    => 'Lagos Nigeria',
        'geo_position'  => '4.870467,6.993388',
    ])
@stop 

@section('styles')
    <style type="text/css">
        .custom-select.is-valid:focus, .form-control.is-valid:focus, .was-validated .custom-select:valid:focus, .was-validated .form-control:valid:focus {
            border-color: #38c172;
            box-shadow: transparent!important;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #a1cbef;
            outline: 0;
            box-shadow: none;
        }

        .page .login-page {
            position: absolute;
            top: 0;
            right: 0;
            -webkit-transition: width 0.3s linear;
            transition: width 0.3s linear;
            width: calc(100% - -200px) !important;
            background-color: #F4F7FA;
            background-color: #e9e9e9;
            min-height: 100vh;
            padding-bottom: 50px;
        }
    </style>
@stop

@section('title','Login')

@section('content')
    <div id="page" class="login-page">
        <div class="container">
            <div class="form-outer text-center d-flex align-items-center" style="width: 280px;">
                <div class="form-inner">
                    <div class="logo text-uppercase">
                        <strong class="text-primary">{{ config('app.name', 'Laravel') }}</strong>
                    </div>
                    <p>
                        Administrator Login Page.
                    </p>
                    
                    <form method="POST" action="{{ route('login') }}" class="text-left form-validate">
                        @csrf

                        <div class="form-group form-group-material">
                            <input id="email" type="email"
                                   class="input-material form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            <label for="email" class="label-material">{{ __('Email Address') }}</label>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group  form-group-material">
                            <input type="password" class="input-material{{ $errors->has('password') ? ' is-invalid' : '' }}"  name="password"
                                   required>
                            <label for="password" class="label-material">{{ __('Password') }}</label>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group  form-group-material row">
                            <div class="col-md-8 ">
                                <div class="">
                                    <input class="form-control-custom" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-pass">{{ __('Forgot Your Password?') }}</a>
                        <small>Do not have an account? </small>
                        <a href="{{ route('register') }}" class="signup">{{ __('Register') }}</a>
                    @endif
                </div>
                <div class="copyrights text-center">
                    <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
                    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection -->

