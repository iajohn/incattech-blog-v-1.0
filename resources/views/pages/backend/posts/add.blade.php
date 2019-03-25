<!-- Post Modal -->
<div class="modal fade" id="PostModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel"></h5>
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
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="custom-file">
                                <input type="file" name="featured" id="featured" class="custom-file-input" >
                                <label class="custom-file-label" for="featured">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <select name="category_id" id="category" class="mr-3 form-control">
                                <option value="">select a category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <h4><label for="tags">Select tag</label></h4>
                        <hr>
                        @foreach($tags as $t)
                            <div class="checkbox">
                                <label><input type="checkbox" id="tags" name="tags[]" value="{{ $t->id }}" class="mr-2">{{ $t->tag }}</label>
                            </div>
                        @endforeach
                    </div>
                    <hr>

                    <div class="form-group">
                        <h4><label for="content">Content</label></h4>
                        <textarea name="content" id="write" cols="5" rows="5" class="form-control"></textarea>
                    </div>

                    <!-- <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">create post</button>
                            or <a href="{{ route('posts') }}" class="">cancel</a>
                        </div>
                    </div> -->
                
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
