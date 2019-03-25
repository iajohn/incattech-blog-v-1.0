@extends('layouts.backend')

@section('title','Update Category')

@section('content')

    @include('pages.backend.incl.errors')

    <div class="card">
        <div class="card-header">
            Edit category: {{ $category->name }}
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('category.update', ['id' => $category->id ]) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">update category</button>
                        or <a href="{{ route('categories') }}" class="">cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection