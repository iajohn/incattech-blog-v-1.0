@extends('layouts.backend')

@section('title','Create Category')

@section('content')

    @include('pages.backend.incl.errors')

    <div class="card">
        <div class="card-header">
            Create a new category
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('category.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">create category</button>
                        or <a href="{{ route('categories') }}" class="">cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection