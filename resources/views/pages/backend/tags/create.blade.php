@extends('layouts.backend')

@section('title','Create Tag')

@section('content')

    @include('pages.backend.incl.errors')

    <div class="card">
        <div class="card-header">
            Create a new tag
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('tag.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="tag">Tags</label>
                    <input type="text" name="tag" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">create tag</button>
                        or <a href="{{ route('tags') }}" class="">cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection