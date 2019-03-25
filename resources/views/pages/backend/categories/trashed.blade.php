@extends('layouts.backend')

@section('title','Trashed Categories')

@section('content')
    <div class="card">
        <div class="mt-3 mb-0 ml-3">
            <div class="form-group row">
                <div class="col-sm-8">
                    <h4>Trashed Categories</h4>
                </div>

                <div class="col-sm-4">
                    <a href="{{ route('categories') }}" class="btn btn-primary">Categories</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EDIT</th>
                        <th>RESTORE</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if($categories->count() > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->name }}
                                </td>

                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-xs btn-info">
                                        Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('category.restore', ['id' => $category->id ]) }}" class="btn btn-xs btn-success">
                                        Restore
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('category.destroy', ['id' => $category->id ]) }}" class="btn btn-xs btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <th colspan="5" class="alert alert-info text-center">
                                You do not have any trashed category at the moment!
                            </th>                   
                        </tr>

                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection