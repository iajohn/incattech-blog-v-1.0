@extends('layouts.backend')

@section('title','Add User')

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
                <li class="breadcrumb-item active">Create User</li>
            </ul>
        </div>
    </div>

    <section class="dashboard-counts section-padding">
        <div class="container-fluid">
            <div class="row justify-content-center clear-fix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h2> Create New User</h2>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success" type="submit">Add User</button>
                                        or <a href="{{ route('users') }}" class="">cancel</a>
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