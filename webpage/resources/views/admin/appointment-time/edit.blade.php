<div class="modal fade" id="editSession-{{ $aTime->id }}" tabindex="-1" aria-labelledby="editSessionLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editSessionLabel">Create New Session</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.appointment-sessions-update', $aTime->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label for="name">Session Name</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ $aTime->name }}" required>
                 </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Session Start Time</label>
                            <input type="time" class="form-control" id="starttime" value="{{ $aTime->start_time }}" name="starttime" required>
                        </div>
                    </div>

                    <div class="col-6">
                     <div class="form-group">
                        <label for="email">Session End Time</label>
                        <input type="time" class="form-control" id="endtime" value="{{ $aTime->end_time }}" name="endtime" required>
                     </div>
                    </div>
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
