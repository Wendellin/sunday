@extends('layouts.backend.index')
@section('title')
    {{ $appointment->patients->users->name }} Appointment
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-lg-3">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">{{ $appointment->users->name }} Appointment</h4>
                </div>
             </div>
          </div>
       </div>
       <div class="col-lg-9 mx-auto">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Appointment Information</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div class="new-user-info">
                   <form action="{{ route('assistant.appointments.update', $appointment->id) }}" method="post">
                    @csrf
                    @method('PUT')
                      <div class="row">
                        <div class="form-group mb-4 col-md-12">
                            <label for="patient_id">Patient Name</label>
                            <select name="patient_id" id="patient" class="form-select">
                                <option selected value="{{ $appointment->patient_id }}">{{ $appointment->patients->users->name }}</option>
                                {{-- <option disabled>___________________</option>
                                @forelse ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->users->name }}</option>
                                @empty
                                    <option disabled>No Patient Available</option>
                                @endforelse --}}
                            </select>
                        </div>
                         <div class="form-group mb-4 col-md-6">
                            <label for="lname">Session Time</label>
                            <select name="session" id="session" class="form-select">
                                <option selected value="{{ $appointment->appointment_time_id }}">{{ $appointment->apointmentTimes->name }}</option>
                                <option @disabled(true)>___________________</option>
                                @forelse ($aTimes as $aTime)
                                    <option value="{{ $aTime->id }}">{{ $aTime->name }}</option>
                                @empty
                                    <option disabled>No Session Available</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group mb-4 col-md-6">
                            <label for="lname">Department</label>
                            <select name="department" id="department" class="form-select">
                                <option selected value="{{ $appointment->department_id }}">{{ $appointment->departments->name }}</option>
                                <option @disabled(true)>___________________</option>
                                @forelse ($depts as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @empty
                                    <option disabled>No Department Available</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group mb-4 col-md-12">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ $appointment->date }}">
                         </div>
                     </div>
                      <a href="{{ route('assistant.appointments.index') }}" class="btn btn-danger me-3">Close</a>
                      <button type="submit" class="btn btn-primary">Submit Details</button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
