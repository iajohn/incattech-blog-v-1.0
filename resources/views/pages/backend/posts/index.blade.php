@extends('layouts.backend')

@section('title','Posts')

@section('styles')

    <style type="text/css">
        .btn-primary {
            color: #fff !important;
        }

        .btn-success {
            color: #fff !important;
        }

        .btn-danger {
            color: #fff !important;
        }

        .btn-info {
            color: #fff !important;
        }

        .btn-warning {
            color: #fff !important;
        }
    </style>
@endsection

@section('content')

    @include('pages.backend.incl.errors')

    <div class="card">
        <div class="mt-3 mb-0 ml-3">
            <div class="form-group row">
                <div class="col-sm-8">
                    <h4>Published Posts</h4>
                </div>

                <div class="col-sm-4">
                    <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">{{ __('Add Post') }}</a>
                    <!-- <a onclick="addNewPost()" class="btn btn-sm btn-primary">{{ __('Add Post') }}</a> -->
                    <a href="{{ route('posts.trashed') }}" class="btn btn-sm btn-danger">Trashed</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="post" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">IMAGE</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">CREATED AT</th>
                        @if(Auth::user()->admin) 
                            <th scope="col">EDITOR'S PICK</th> 
                        @endif
                        <th scope="col">EDIT</th>
                        <th scope="col">TRASH</th>
                        
                    </tr>
                </thead>

                <tbody>
                    @if($posts->count() > 0)
                    
                        @foreach ($posts as $p)
                            <tr>
                                <!-- <td> {{ ( $p->id ) }} </td> -->
                                <td>
                                    <img src="{{ $p->featured }}" alt="{{ $p->title }}" style="width: 90px; height: 50px; border-radius: 5px;">
                                </td>

                                <td>
                                    {{ $p->title }}
                                </td>

                                <td>
                                    {{ $p->created_at}}
                                </td>

                                @if(Auth::user()->admin)
                                    <td>
                                        @if($p->editors_pick)
                                            <a href="{{ route('post.not.editors', ['id' => $p->id ]) }}" class="btn btn-xs btn-danger">
                                                Remove post
                                            </a>
                                        @else

                                            <a href="{{ route('post.editors', ['id' => $p->id ]) }}" class="btn btn-xs btn-success">
                                                Pick post
                                            </a>

                                        @endif
                                    </td>
                                @endif

                                <td>
                                    <!-- <a href="{{ route('post.edit', ['id' => $p->id ]) }}" class="btn btn-xs btn-info"> Edit </a> -->
                                    <a href="{{ route('post.edit', ['id' => $p->id ]) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                </td>

                                <td>
                                    <a href="{{ route('post.delete', ['id' => $p->id ]) }}" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> </a>
                                    <!-- <a onclick="deleteData('.$post->id.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <th colspan="5" class="alert alert-info text-center">
                            There are no published post at the moment!
                            </th>                   
                        </tr>

                    @endif
                </tbody>
            </table>
        </div>

        @include('pages.backend.posts.add')
    </div>

@endsection

@section('scripts')
    // <script>
    //     $(document).ready(function() {
    //         $('#write').summernote();
    //     });
    // </script>

    <script>
      $(function () {
        $('#example1').DataTable()
        $('#post').DataTable({
            searchable   : true,
            orderable   : true,
            order: [ 2, 'desc' ],
        })
      })


      // Create new post in a modal with ajax 
            function addNewPost(){
                save_method= 'add';
                $('input[name_method]').val('POST');
                $('#PostModal').modal('show');
                $('#PostModal form')[0].reset();
                $('.modal-title').text('CREATE POST');
                $('#createPost').text('Create');
            }


        //Insert data by Ajax
            $(function(){
                $('#PostModal form').validator().on('submit', function (e) {
                    if(!e.isDefaultPrevented()){
                        var id = $('#id').val();
                        if(save_method == 'add') url = "{{ route('post.store') }}";
                        else url = "{{ route('post.store') . '/' }}" + id;
                        $.ajax({
                            url : url,
                            type: "POST",
                            data: new FormData($("#PostModal form")[0]),
                            contentType: false,
                            processData: false,
                            success : function(data) {
                                $('#PostModal').modal('hide');
                                table1.ajax.reload();
                                swal({
                                  title: "Good job!",
                                  text: "You clicked the button!",
                                  icon: "success",
                                  button: "Great!",
                                });
                            },
                            error : function(data){
                                swal({
                                    title: 'Oops...',
                                    text: data.message,
                                    icon: 'error',
                                    timer: '1500'
                                })
                            }
                        });
                        return false;
                    }

                });

            });

        //delete ajax request are here
          function deleteData(id){
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
              var url = "{{ url('/post/delete') . '/' }}" + id;
              swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete){
                  $.ajax({
                      url : url,
                      type : "GET",
                      data : {'_method' : 'DELETE', '_token' : csrf_token},
                      success : function(data) {
                          table1.ajax.reload();
                          swal({
                            title: "Delete Done!",
                            text: "You clicked the button!",
                            icon: "success",
                            button: "Done",
                          });
                      },
                      error : function () {
                          swal({
                              title: 'Oops...',
                              text: data.message,
                              type: 'error',
                              timer: '1500'
                          })
                      }
                  });
                } else {
                  swal("Your imaginary file is safe!");
                }
              });
            }


            </script>

    </script>

@endsection