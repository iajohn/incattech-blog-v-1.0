@extends('layouts.backend')

@section('title','Categories')

@section('content')
    <div class="card">
        <div class="mt-3 mb-0 ml-3">
            <div class="form-group row">
                <div class="col-sm-8">
                    <h4>Categories</h4>
                </div>

                <div class="col-sm-4">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">New category</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EDIT</th>
                        <th>TRASH</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if($categories->count() > 0)
                        @foreach ($categories as $c)
                            <tr>
                                <td>
                                    {{ $c->name }}
                                </td>

                                <td>
                                    <a href="{{ route('category.edit', ['id' => $c->id ]) }}" class="btn btn-sm btn-info">
                                        Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('category.delete', ['id' => $c->id ]) }}" class="btn btn-sm btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <th colspan="5" class="alert alert-info text-center">
                                There are no categories at the moment!
                            </th>                   
                        </tr>

                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection