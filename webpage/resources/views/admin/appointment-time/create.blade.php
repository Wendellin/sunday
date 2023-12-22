<div class="modal fade" id="createNewSession" tabindex="-1" aria-labelledby="createNewSessionLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createNewSessionLabel">Create New Session</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.appointment-sessions-store') }}" method="post">
            @csrf
            <div class="modal-body text-start">

                <div class="form-group">
                    <label for="name">Session Name</label>
                    <input type="name" class="form-control" id="name" name="name" required>
                 </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Session Start Time</label>
                            <input type="time" class="form-control" id="starttime" name="starttime" required>
                        </div>
                    </div>

                    <div class="col-6">
                     <div class="form-group">
                        <label for="email">Session End Time</label>
                        <input type="time" class="form-control" id="endtime" name="endtime" required>
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
