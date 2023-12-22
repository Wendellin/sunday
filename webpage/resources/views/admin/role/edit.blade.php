<div class="modal fade" id="editRole-{{ $role->id }}" tabindex="-1" aria-labelledby="editRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editRoleLabel">Edit Role</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.roles.update', $role->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">

                <div class="form-group mb-3">
                    <label for="name">Role Name</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
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
