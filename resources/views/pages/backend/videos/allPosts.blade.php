@extends('layouts.backend')

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">

    <!-- <link href="{{ asset('backend-theme/vendor/sweetalert/dist/sweetalert2.min.css') }}"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" type="text/css"> -->
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

@section('title','Posts')

@section('content')

    @include('pages.backend.incl.errors')

    <div class="card">
        <div class="mt-3 mb-0 ml-3">
            <div class="form-group row">
                <div class="col-sm-8">
                    <h4>Published Posts</h4>
                </div>

                <div class="col-sm-4">
                    <!-- <a href="{{ route('post.create') }}" class="btn btn-primary">New post</a> -->
                    <a href="{{ route('posts.trashed') }}" class="btn btn-sm btn-danger">Trashed</a>

                    <a onclick="addNewPost()" class="btn btn-sm btn-primary">{{ __('Add Post') }}</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="post-table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">IMAGE</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">CREATED AT</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                
                <tbody>

                </tbody>
            </table>
        </div>

        @include('backend.posts.add')
    </div>

@endsection

@section('scripts')

    <!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> -->
    <!-- // <script src="{{ asset('backend-theme/vendor/sweetalert/dist/sweetalert2.min.js') }}"> </script> -->

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#write').summernote();
        });
    </script>

    <!-- // <script src="{{ asset('backend-theme/js/postAjax.js') }}"></script>    -->

    <script type="text/javascript">
        
        // fetch data from database into datatables by ajax 
            var table1 = $('#post-table').DataTable({
                processing:true,
                serverSide:true,
                order: [ 2, 'desc' ],
                ajax: "{{ route('all-posts') }}",
                columns: [
                  // {data:'id', name:'id'},
                  {
                      "data": 'featured',
                      "render": function(data, type, row) {
                          return '<img src="'+data+'" style="width: 90px; height: 60px; border-radius: 5px;" />';
                      }   
                  },
                  {data:'title', name:'title'},
                  {data:'created_at', name:'created_at'},
                  {data:'action', name:'action', orderable:false, searchable:false}
                ],

            });


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


        //  edit ajax request are here
            function editPost(id) {
                save_method= 'edit';
                $('input[name_method]').val('PATCH');
                $('#PostModal form')[0].reset();
                $.ajax({
                    url : "{{ url('backend/post/edit') .'/' }}" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        $('#PostModal').modal('show');
                        $('#id').val(data.id);
                        $('#title').val(data.title);
                        $('#featured').val(data.featured);
                        $('#category_id').val(data.category_id);
                        $('#tags').val(data.tags);
                        $('#write').val(data.content);
                        $('.modal-title').text('UPDATE POST');
                        $('#createPost').text('Update');

                    }, 
                    error: function(){
                        alert("not working")
                    }
                });
            }
          

        //delete ajax request are here
          function deleteData(id){
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
                      url : "{{ url('/post/delete') . '/' }}"  + id,
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

@endsection