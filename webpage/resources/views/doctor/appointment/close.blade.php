<div class="modal fade" id="closeAppointment-{{ $appointment->id }}" tabindex="-1" aria-labelledby="closeAppointmentLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="closeAppointmentLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('doctor.appointments.close', $appointment->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="form-label mb-2">Type <span class="fst-italic">Confirm</span> to close Appointment</label>
                    <input type="text" class="form-control" id="confirm" placeholder="Confirm" name="confirm" required>
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
