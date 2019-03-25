@extends('layouts.backend')

@section('title','Create Video')

@section('styles')
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection

@section('content')
    @include('pages.backend.incl.errors')

    <div class="card">
        <div class="card-header">
            Create Video
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleInputVideo">Upload Video</label>
                    <input type="file" name="video" id="exampleInputVideo" />
                </div>

                <div class="form-group">
                    <label for="content">Discription</label>
                    <textarea name="content" id="desc" cols="5" rows="5" class="redactor form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('js/toastr.min.js') }}"> </script>

    <script>
        @if(Session::has('success'))
            
            toastr.success("{{ Session::get('success') }}")
        
        @endif
    </script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#desc').summernote();
        });
    </script>
@stop