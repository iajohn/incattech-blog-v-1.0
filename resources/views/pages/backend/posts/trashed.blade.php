@extends('layouts.backend')

@section('title','Trashed Posts')

@section('content')

    @include('pages.backend.incl.errors')

    <div class="card">
        <div class="mt-3 mb-0 ml-3">
            <div class="form-group row">
                <div class="col-sm-8">
                    <h4>Trashed Posts</h4>
                </div>

                <div class="col-sm-4">
                    <a href="{{ route('posts') }}" class="btn btn-primary">Posts</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>IMAGE</th>
                        <th>TITLE</th>
                        <th>EDIT</th>
                        <th>RESTORE</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if($posts->count() > 0)
                        @foreach ($posts as $p)
                            <tr>
                                <td>
                                    <img src="{{ $p->featured }}" alt="{{ $p->title }}" style="width: 90px; height: 50px; border-radius: 5px;">
                                </td>

                                <td>
                                    {{ $p->title }}
                                </td>

                                <td>
                                    <a href="{{ route('post.edit', ['id' => $p->id ]) }}" class="btn btn-xs btn-info">
                                        Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('post.restore', ['id' => $p->id ]) }}" class="btn btn-xs btn-success">
                                        Restore
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('post.destroy', ['id' => $p->id ]) }}" class="btn btn-xs btn-danger">
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