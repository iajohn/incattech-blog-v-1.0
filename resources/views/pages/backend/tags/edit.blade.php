@extends('layouts.backend')

@section('title','Update Tag')

@section('content')

    @include('pages.backend.incl.errors')

    <div class="card">
        <div class="card-header">
            Edit Tag: {{ $tag->tag }}
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('tag.update', ['id' => $tag->id ]) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" value="{{ $tag->tag }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">update tag</button>
                        or <a href="{{ route('tags') }}" class="">cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection