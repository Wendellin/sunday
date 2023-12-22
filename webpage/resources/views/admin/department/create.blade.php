<div class="modal fade" id="createNewDepartment" tabindex="-1" aria-labelledby="createNewDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createNewDepartmentLabel">Create New Session</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.department-store') }}" method="post">
            @csrf
            <div class="modal-body text-start">

                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="name" class="form-control" id="name" name="name" required>
                 </div>

                 <div class="form-group">
                    <label for="name">Department Slogan <span class="fst-italic">-- Optional--</span></label>
                    <textarea name="desc" id="desc" class="form-control" rows="5"></textarea>
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
