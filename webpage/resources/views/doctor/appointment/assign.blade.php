@extends('layouts.backend.index')
@section('title', 'Assign Appointment')

@section('content')


<div class="container-fluid">
    <div class="row row-eq-height">
       <div class="col-md-3">
          {{-- <div class="iq-card calender-small">
             <div class="iq-card-body">
            <input type="text" class="flatpicker d-none">
             </div>
          </div> --}}

          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title ">Appointment Details</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                   <a href=""><i class="fa fa-plus  mr-0" aria-hidden="true"></i></a>
                </div>
             </div>
             <div class="iq-card-body">
                <ul class="m-0 p-0 job-classification">
                   <li class=""><i class="ri-check-line bg-danger"></i><strong>Patient:</strong> {{ $appointment->patients->users->name }}</li>
                   <li class=""><i class="ri-check-line bg-success"></i><strong>Session:</strong> {{ $appointment->apointmentTimes->name }}</li>
                   <li class=""><i class="ri-check-line bg-warning"></i><strong>Department: </strong> {{ $appointment->departments->name }}</li>
                   {{-- <li class=""><i class="ri-check-line bg-info"></i>Team Project</li> --}}
                </ul>
             </div>
          </div>

          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Appointment Schedule</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <ul class="m-0 p-0 today-schedule">
                   <li class="d-flex">
                      <div class="schedule-icon"><i class="ri-checkbox-blank-circle-fill text-primary"></i></div>
                      <div class="schedule-text"> <span>{{ $appointment->apointmentTimes->name }}</span>
                         <span>
                            {{ date('h:i A', strtotime($appointment->apointmentTimes->start_time)) }} to
                            {{ date('h:i A', strtotime($appointment->apointmentTimes->end_time)) }}</span>
                      </div>
                   </li>
                   <li class="d-flex">
                      <div class="schedule-icon"><i class="ri-checkbox-blank-circle-fill text-success"></i></div>
                      <div class="schedule-text"> <span>Date Booked</span>
                         <span><i class="fa-solid fa-calendar-days"></i> {{ $appointment->created_at->toFormattedDayDateString() }} </span>
                         <span><i class="fa-regular fa-clock"></i> {{ date('h:i A', strtotime($appointment->created_at)) }}</span>
                      </div>
                   </li>
                </ul>
             </div>
          </div>
       </div>
       <div class="col-md-9">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Assign Appointment to a Doctor</h4>
                </div>
                {{-- <div class="iq-card-header-toolbar d-flex align-items-center">
                   <a href="#" class="btn btn-primary"><i class="ri-add-line mr-2"></i>Book Appointment</a>
                </div> --}}

             </div>

             <div class="col-md-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            @if (is_null($appointment->doctor_id))
                                <h4 class="card-title">Select Doctor to Attend to this Appointments</h4>
                            @else
                                <h4 class="card-title">Re-Assign Appointment </h4>
                                <p>
                                    Currently Assigned to:  <span class="fw-bold text-primary">{{ $appointment->doctors->users->name }} </span>
                                    By: <span class="fw-bold text-primary">{{ $appointment->assignedBys->name }}</span>
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="{{ route('doctor.appointment.store', $appointment->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" value="{{ $appointment->id }}" name="appointment_id">
                            <div class="form-group col-md-12 my-3">
                                <label for="doctor">Select Doctor</label>
                                <select name="doctor_id" class="form-select" id="doctor_id">
                                    @if (is_null($appointment->doctor_id))
                                        <option selected @disabled(true)>-- Select Doctor --</option>
                                    @else
                                        <option selected value="{{ $appointment->doctor_id }}">{{ $appointment->doctors->users->name }}</option>
                                        <option @disabled(true)>__________________</option>
                                    @endif
                                    @forelse ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->users->name }}</option>
                                    @empty
                                        <option disabled>-- No Doctor Available--</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="iq-card-body">
                                <button type="submit" class="btn btn-primary float-end mx-2">Save Changes</button>
                                <a href="{{ route('doctor.appointments.all') }}" class="btn btn-danger float-end mx-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
          </div>
       </div>
    </div>
 </div>
</div>


@endsection
