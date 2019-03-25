@extends('layouts.backend')

@section('title','Register')

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


@section('content')
    <div class="page login-page">
        <div class="container">
            <div class="form-outer text-center d-flex align-items-center" style="width: 260px;">
                <div class="form-inner">
                    <div class="logo text-uppercase">
                        <strong class="text-primary">{{ config('app.name', 'Laravel') }}</strong>
                    </div>
                    <p>Register below.</p>

                    <form method="POST" action="{{ route('register') }}" class="text-left form-validate">
                        @csrf
                        
                        <div class="form-group form-group-material">
                            <input id="name" type="text" class="input-material form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            <label for="name" class="label-material">{{ __('Full-Name') }}</label>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif                                
                        </div>
                      
                        <div class="form-group form-group-material">
                            <input id="email" type="email" class="input-material form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label for="email" class="label-material">{{ __('Email Address') }}</label>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group form-group-material">
                            <input id="password" type="password" class="input-material form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <label for="password" class="label-material">{{ __('Password') }}</label>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group form-group-material">
                            <input id="password-confirm" type="password" class="input-material form-control" name="password_confirmation" required>
                            <label for="password-confirm" class="label-material">{{ __('Confirm Password') }}</label>
                        </div>

                        <!-- <div class="form-group terms-conditions text-center">
                            <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="form-control-custom">
                            <label for="register-agree">I agree with the terms and policy</label>
                        </div> -->
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>

                    </form>
                    <small>Already have an account? </small><a href="{{ route('login') }}" class="signup">Login</a>
                </div>
                
                <div class="copyrights text-center">
                    <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
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
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection -->

