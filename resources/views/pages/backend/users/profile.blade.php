@extends('layouts.backend')

@section('title', Auth::user()->name)

@section('styles')
    <link href="{{ asset('themes/backend-theme/css/user_card.css') }}" rel="stylesheet">
@stop

@section('content')

    @include('pages.backend.incl.errors')

    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>
                @if(Auth::user()->admin)
                    <li class="breadcrumb-item">
                        <a href="{{ route('users') }}">{{ __('Users') }}</a>
                    </li>
                @endif
                <li class="breadcrumb-item active">{{ $user->name }} - {{ __('Profile') }}</li>
            </ul>
        </div>
    </div>

    <section class="forms">
        <div class="container-fluid">
            <header></header>
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header mt-3">
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <!-- <h4>{{ $user->name }} {{ __('Profile') }}</h4> -->
                                </div>

                                <div class="col-sm-4">
                                    <a href="{{ route('user.profile.edit') }}" class="btn btn-sm btn-primary">{{ __('Edit profile') }}</a>
                                    <a href="{{ route('users') }}" class="btn btn-sm btn-secondary">{{ __('All users') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="firstinfo">
                            <img src="{{ asset($user->profile->avatar) }}"/>
                            <div class="profileinfo mt-2">
                                <h1> {{ $user->name }} </h1>
                                <p class="author-info">{{ $user->profile->job }}</p>
                                <br><br>
                                <p class="bio"> {{ $user->profile->about }} </p>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="badgescard">
                                <div class="widget social-widget sw">
                                    <span class="">
                                        <a href="{{ $user->profile->facebook }}" target="_blank" class="social fb">
                                            <i class=" fa fa-facebook "></i>
                                        </a>
                                    </span>
                                    <span class="">
                                        <a href="{{ $user->profile->instagram }}" target="_blank" class="social ig">
                                            <i class=" fa fa-instagram "></i>
                                        </a>
                                    </span>
                                    <span class="">
                                        <a href="{{ $user->profile->twitter }}" target="_blank" class="social tw">
                                            <i class="fa fa-twitter "></i>
                                        </a>
                                    </span>
                                    <span class="">
                                        <a href="{{ $user->profile->youtube }}" target="_blank" class="social yt">
                                            <i class="fa fa-youtube social "></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection