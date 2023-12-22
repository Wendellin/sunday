<div class="modal fade" id="patientCreateAppointment-{{ $patient->id }}" tabindex="-1" aria-labelledby="patientCreateAppointmentLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content text-start">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="patientCreateAppointmentLabel">Book Appointment for {{ $patient->users->name }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('patient.appointments.store') }}" method="post">
            @csrf
            <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient->id }}">
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="form-label mb-2">Appointment Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="row my-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name" class="form-label mb-2">Session</label>
                            <select name="session" id="session" class="form-select">
                                <option selected @disabled(true)>-- Select Session --</option>
                                @forelse ($aTimes as $aTime)
                                    <option value="{{ $aTime->id }}">{{ $aTime->start_time }} - {{ $aTime->end_time }}</option>
                                @empty
                                    <option disabled>No Session Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name" class="form-label mb-2">Department</label>
                            <select name="department" id="department" class="form-select">
                                <option selected @disabled(true)>-- Select Department --</option>
                                @forelse ($depts as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @empty
                                    <option disabled>No Department Available</option>
                                @endforelse
                            </select>
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
