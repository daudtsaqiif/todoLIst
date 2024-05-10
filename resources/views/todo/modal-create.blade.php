<div class="modal fade" id="createModalTodo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New To Do List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="col-12">
                        <label for="todoTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="todoTitle" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Now</button>
                </div>
            </form>
        </div>
    </div>
</div>


