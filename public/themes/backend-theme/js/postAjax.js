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
                if(save_method == 'add') url = "{{ url('post') }}";
                else url = "{{ url('post') . '/' }}" + id;
                $.ajax({
                    url : url,
                    type: "POST",
                    data: new FormData($("#PostModal form")[0]),
                    contentType: false,
                    processData: false,
                    success : function(data) {
                        $('#modal-form').modal('hide');
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
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
                return false;
            }

        });

    });
 
  
//show single data ajax part here
   function showData(id) {
      $.ajax({
          url: "{{ url('contact') }}" + '/' + id,
          type: "GET",
          dataType: "JSON",
        success: function(data) {
          $('#single-data').modal('show');
          $('.modal-title').text(data.name +' '+'Informations');
          $('#contactid').text(data.id); 
            $('#fullname').text(data.name);
          $('#contactemail').text(data.email);
          $('#contactnumber').text(data.phone);
          $('#creligion').text(data.religion);
        },
        error : function() {
            alert("Ghorar DIm");
        }
      });
    }


//  edit ajax request are here
    function editPost(id) {
        save_method= 'edit';
        $('input[name_method]').val('PATCH');
        $('#PostModal form')[0].reset();
        $.ajax({
            url : "{{ url('post.update') }}" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#PostModal').modal('show');
                $('.modal-title').text('UPDATE POST');
                $('#createPost').text('Update');
                $('#id').val(data.id);
                $('#title').val(data.title);
                $('#featured').val(data.featured);
                $('#category').val(data.category_id);
                $('#tags').val(data.tags);
                $('#write').val(data.content);

            }, 
            error: function(){
                arlert("not working")
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
        if (willDelete) {
          $.ajax({
              url : "{{ url('contact') }}" + '/' + id,
              type : "POST",
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

