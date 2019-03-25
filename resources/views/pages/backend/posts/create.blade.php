@extends('layouts.backend')

@section('styles')
    <!-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" type="text/css"> -->
@endsection

@section('title','Create Post')

@section('content')

    @include('pages.backend.incl.errors')

    @include('pages.backend.incl.tinyeditor')

    <div class="card">
        <div class="card-header">
            Create Post
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('post.store') }}" method="post" data-toogle="validator" enctype="multipart/form-data">
                @csrf   {{ method_field('POST') }}

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <div class="custom-file">
                            <input type="file" name="featured" id="featured" class="custom-file-input" >
                            <label class="custom-file-label" for="featured">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group col-md-4 pull-right">
                        <input type="text" name="imgCredit" id="imgCredit" class="form-control" placeholder="Enter Credit For Image Copyright">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <select name="category_id" id="category" class="mr-3 form-control">
                            <option value="">select a category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4 pull-right">
                        <h4><label for="tags">Select tag</label></h4>
                        <hr>
                        @foreach($tags as $t)
                            <div class="checkbox">
                                <label><input type="checkbox" id="tags" name="tags[]" value="{{ $t->id }}" class="mr-2">{{ $t->tag }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <div class="">
                            <button class="btn btn-primary" type="submit">create post</button>
                            or <a href="{{ route('posts') }}" class="btn btn-secondary">cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('scripts')
    <!-- // <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script> -->
    <script>
        // $(document).ready(function() {
        //     $('#content').summernote();
        // });
    </script>
    <!-- dependencies (Summernote depends on Bootstrap & jQuery) -->
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    -->

    <!-- summernote config -->
    <script>
      // $(document).ready(function(){

      //   // Define function to open filemanager window
      //   var lfm = function(options, cb) {
      //     var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      //     window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      //     window.SetUrl = cb;
      //   };

      //   // Define LFM summernote button
      //   var LFMButton = function(context) {
      //     var ui = $.summernote.ui;
      //     var button = ui.button({
      //       contents: '<i class="note-icon-picture"></i> ',
      //       tooltip: 'Insert image with filemanager',
      //       click: function() {

      //         lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
      //           lfmItems.forEach(function (lfmItem) {
      //             context.invoke('insertImage', lfmItem.url);
      //           });
      //         });

      //       }
      //     });
      //     return button.render();
      //   };

      //   // Initialize summernote with LFM button in the popover button group
      //   // Please note that you can add this button to any other button group you'd like
      //   $('#summernote-editor').summernote({
      //     toolbar: [
      //       ['popovers', ['lfm']],
      //     ],
      //     buttons: {
      //       lfm: LFMButton
      //     }
      //   })
      // });
    </script>

    <!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> -->

@endsection