@extends('layouts.backend')

@section('title','Update Profile')

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
                    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
                </ul>
            </div>
        </div>

        <section class="forms">
            <div class="container-fluid">
                <header></header>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                {{ __('Update') }}  {{ $user->name }}  {{ __('Profile') }}
                            </div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf {{ csrf_field() }}

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Username</label>
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="job"> Job Title </label>
                                            <input type="text" name="job" value="{{ $user->profile->job }}" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="avatar">Display picture</label>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="facebook"> Facebook Address </label>
                                            <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="instagram"> Instagram Address </label>
                                            <input type="text" name="instagram" value="{{ $user->profile->instagram }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email"> Twitter Address </label>
                                            <input type="text" name="twitter" value="{{ $user->profile->twitter }}" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email"> YouTube Address </label>
                                            <input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
                                        </div>
                                    </div>  

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email"> WhatsApp Address </label>
                                            <input type="text" name="whatsapp" value="{{ $user->profile->whatsapp }}" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email"> New Password </label>
                                            <input type="passward" name="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="about">About You</label>
                                        <textarea name="about" id="about" cols="5" rows="5" class="redactor form-control">{{ $user->profile->about }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <div class="text-center">
                                            <button class="btn btn-sm btn-success" type="submit">Update Profile</button>
                                            or <a href="{{ route('user.profile') }}" class="btn btn-sm btn-secondary">cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection