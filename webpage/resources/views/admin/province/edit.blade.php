<div class="modal fade" id="editProvince-{{ $province->id }}" tabindex="-1" aria-labelledby="editProvinceLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editProvinceLabel">Edit Province</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.province-update', $province->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">

                <div class="form-group mb-3">
                    <label for="name">Province Name</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ $province->name }}" required>
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
