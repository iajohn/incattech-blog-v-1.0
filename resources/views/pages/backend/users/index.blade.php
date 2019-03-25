@extends('layouts.backend')

@section('title','Users')

@section('content')

    @include('pages.backend.incl.errors')

    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>

                <li class="breadcrumb-item">
                    {{ __('Users') }}
                </li>
            </ul>
        </div>
    </div>

    <section class="dashboard-counts section-padding">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="mt-3 mb-0 ml-3">
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <h2>List of Users</h2>
                                </div>

                                <div class="col-sm-4">
                                    <a href="{{ route('user.create') }}" class="btn btn-primary">New user</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>IMAGE</th>
                                        <th>NAME</th>
                                        <th>PERMISSIONS</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @if($users->count() > 0)
                                        @foreach ($users as $u)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($u->profile->avatar) }}" alt="{{ $u->name }}" style="width: 50px; height: 50px; border-radius: 50px;">
                                                </td>

                                                <td>
                                                    {{ $u->name }}
                                                </td>

                                                <td>
                                                    @if($u->admin)
                                                        <a href="{{ route('user.not.admin', ['id' => $u->id ]) }}" class="btn btn-sm btn-danger">
                                                            Remove admin
                                                        </a>
                                                    @else

                                                        <a href="{{ route('user.admin', ['id' => $u->id ]) }}" class="btn btn-sm btn-success">
                                                            Make admin
                                                        </a>

                                                    @endif
                                                </td>

                                                <td>
                                                    @if(Auth::id() !== $u->id)
                                                        <a href="{{ route('user.delete', ['id' => $u->id ]) }}" class="btn btn-sm btn-danger">
                                                            Delete
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                    @else
                                        <tr>
                                            <th colspan="5" class="alert alert-info text-center">
                                                There are no users at the moment!
                                            </th>                   
                                        </tr>

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection