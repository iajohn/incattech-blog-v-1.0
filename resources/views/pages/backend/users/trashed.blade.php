@extends('layouts.backend')

@section('title','Trashed Users')

@section('content')

    @include('pages.backend.incl.errors')

    <div class="card">
        <div class="mt-3 mb-0 ml-3">
            <div class="form-group row">
                <div class="col-sm-8">
                    <h4>Trashed Users</h4>
                </div>

                <div class="col-sm-4">
                    <a href="{{ route('users') }}" class="btn btn-primary">Users</a>
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
                        <th>RESTORE</th>
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
                                    <a href="{{ route('user.restore', ['id' => $u->id ]) }}" class="btn btn-xs btn-success">
                                        Restore
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('user.destroy', ['id' => $u->id ]) }}" class="btn btn-xs btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <th colspan="5" class="alert alert-info text-center">
                                You do not have any trashed post at the moment!
                            </th>                   
                        </tr>

                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection