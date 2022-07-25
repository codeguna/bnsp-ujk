<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                </div>
                <div class="modal-body">

                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <textarea class="form-control" name="content" cols="30" rows="3" maxlength="250"></textarea>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>File</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="col-sm-6">
                                <label>Gambar</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Tags</label>
                          <select class="form-control" name="name">
                            <option value="General">General</option>
                            <option value="Explicit">Explicit</option>
                            <option value="For Child">For Child</option>
                          </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
