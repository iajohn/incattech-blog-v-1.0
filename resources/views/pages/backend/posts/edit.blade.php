@extends('layouts.backend')

@section('title','Update Post')

@section('content')

    @include('pages.backend.incl.errors')

    @include('pages.backend.incl.tinyeditor')

    <div class="card">
        <div class="card-header">
            Edit Post: {{ $post->title }}
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('post.update', ['id' => $post->id ]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="featured">Featured image</label>
                        <input type="file" name="featured" class="form-control">
                    </div>

                    <div class="form-group col-md-4 pull-right">
                        <label for="featured">Image Credit</label>
                        <input type="text" name="imgCredit" id="imgCredit" class="form-control" value="{{ $post->imgCredit }}" placeholder="Enter Credit For Image Copyright">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="category">Select a category</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}"
                                @if($post->category->id == $cat->id) selected @endif>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4 pull-right">
                        <label for="tags">Select tag</label>
                        @foreach($tags as $t)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="tags[]" value="{{ $t->id }}" class="mr-2"
                                    @foreach($post->tags as $tg) @if($t->id == $tg->id) checked @endif @endforeach>
                                    {{ $t->tag }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class=" form-control">{{ $post->content }}</textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">update post</button>
                        or <a href="{{ route('posts') }}" class="">cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection


@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
        $(document).ready(function() {
            // $('#content').summernote();
        });
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

@endsection