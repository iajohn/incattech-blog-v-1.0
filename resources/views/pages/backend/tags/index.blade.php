@extends('layouts.backend')

@section('title','Tags')

@section('styles')
   <!--  <link rel="stylesheet" href="{{ asset('themes/backend-theme/css/sweetalert.css') }}">
    <script src="{{ asset('themes/backend-theme/js/sweetalert.min.js') }}"></script>
 -->
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
    <div class="card">
        <div class="mt-3 mb-0 ml-3">
            <div class="form-group row">
                <div class="col-sm-8">
                    <h4>Tags</h4>
                </div>

                <div class="col-sm-4">
                    <!-- <a href="{{ route('tag.create') }}" class="btn btn-primary">New tag</a> -->
                    <a onclick="addNewTag()" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> {{ __('Add Tag') }}</a>
                </div>
            </div>
        </div>

         <div class="card-body">
            <table id="tags-table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">NAME</th>
                        <!-- <th scope="col">EDIT</th> -->
                        <th> ACTION </th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    
                </tbody>
            </table>
        </div>
        @include('pages.backend.tags.add')
    </div>

@endsection


@section('scripts')

    <script>
        $(function () {
            var table1 = $('#tags-table').DataTable({
                processing:true,
                serverSide:true,
                order: [ 0, 'asc' ],
                ajax: "{{ route('all-tags') }}",
                columns: [
                    // {data:'id', name:'id'},
                    {data:'tag', name:'tag'},
                    {data:'action', name:'action', orderable:false, searchable:false}
                    // {data:'created_at', name:'created_at'},
                ],
            })
        });


        // Create new post in a modal with ajax 
            function addNewTag(){
                save_method= 'add';
                $('input[name_method]').val('POST');
                $('#tagModal').modal('show');
                $('#tagModal form')[0].reset();
                $('.modal-title').text('CREATE POST');
                $('#createPost').text('Create');
            }

        //Insert data by Ajax
            $(function(){
                $('#tagModal form').validator().on('submit', function (e) {
                    if(!e.isDefaultPrevented()){
                        var id = $('#id').val();
                        if(save_method == 'add') url = "{{ url('backend/tag/store') }}";
                        else url = "{{ url('backend/tag/store') . '/' }}" + id;
                        $.ajax({
                            url : url,
                            type: "POST",
                            data: new FormData($("#tagModal form")[0]),
                            contentType: false,
                            processData: false,
                            success : function(data) {
                                $('#tagModal').modal('hide');
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
            function editTag(id) {
                save_method= 'edit';
                $('input[name_method]').val('PATCH');
                $('#tagModal form')[0].reset();
                $.ajax({
                    url : "{{ url('backend/tag/update') .'/' }}" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        $('#tagModal').modal('show');
                        $('.modal-title').text('UPDATE TAG');
                        $('#createPost').text('Update');
                        $('#id').val(data.id);
                        $('#tags').val(data.tag);

                    }, 
                    error: function(){
                        alert("not working")
                    }
                });
            }

        //delete ajax request are here
            function deleteData(id){
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                var url = "{{ url('backend/tag/delete') . '/' }}" + id;
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
                                  icon: 'error',
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