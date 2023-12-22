
<div class="modal fade" id="changeRole-{{ $doctor->users->id }}" tabindex="-1" aria-labelledby="changeRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="changeRoleLabel">Change Doctor's Role</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="bg-primary"><strong>Current Role: </strong> {{ $doctor->users->roles->name }}</p>
            <form action="{{ route('admin.change.doctor.role', $doctor->users->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="role" class="form-label">Email address</label>
                    <select name="role_id" id="role_id" class="form-select">
                        <option selected disabled>-- Select Role--</option>
                       @forelse ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                       @empty
                        <option disabled>-- No Role Selected --</option>
                       @endforelse
                    </select>
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
