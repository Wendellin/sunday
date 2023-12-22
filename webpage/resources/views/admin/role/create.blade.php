<div class="modal fade" id="createNewRole" tabindex="-1" aria-labelledby="createNewRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createNewRoleLabel">Create New Role</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.roles.store') }}" method="post">
            @csrf
            <div class="modal-body text-start">

                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="name" class="form-control" id="name" name="name" required>
                 </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
