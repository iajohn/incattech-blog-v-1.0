<!-- Post Modal -->
<div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tagModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" data-toogle="validator" enctype="multipart/form-data">
                    @csrf   {{ method_field('POST') }}

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="id" id="id">
                            <input type="text" name="tag" id="tags" class="form-control" placeholder="Enter Title">
                        </div>
                    </div>
                    <hr>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="createPost" class="btn btn-primary"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
