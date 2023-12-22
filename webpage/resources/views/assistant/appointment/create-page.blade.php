@extends('layouts.backend.index')
@section('title', 'Create Appointment')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-lg-3">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Add New Appointment</h4>
                </div>
             </div>
          </div>
       </div>
       <div class="col-lg-9 mx-auto">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Patient Information</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div class="new-user-info">
                   <form action="{{ route('assistant.appointments.store') }}" method="post">
                    @csrf
                      <div class="row">
                        <div class="form-group mb-4 col-md-12">
                            <label for="lname">Patient Name</label>
                            <select name="patient_id" id="patient" class="form-select">
                                <option selected @disabled(true)>-- Select Patient --</option>
                                @forelse ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->users->name }}</option>
                                @empty
                                    <option disabled>No Patient Available</option>
                                @endforelse
                            </select>
                        </div>
                         <div class="form-group mb-4 col-md-6">
                            <label for="lname">Session Time</label>
                            <select name="session" id="session" class="form-select">
                                <option selected @disabled(true)>-- Select Session --</option>
                                @forelse ($aTimes as $aTime)
                                    <option value="{{ $aTime->id }}">{{ $aTime->name }}
                                        <small>({{ date('h:i A', strtotime($aTime->start_time)) }} - {{ date('h:i A', strtotime($aTime->end_time)) }})</small>
                                    </option>
                                @empty
                                    <option disabled>No Session Available</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group mb-4 col-md-6">
                            <label for="lname">Department</label>
                            <select name="department" id="department" class="form-select">
                                <option selected @disabled(true)>-- Select Department --</option>
                                @forelse ($depts as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @empty
                                    <option disabled>No Department Available</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group mb-4 col-md-12">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                         </div>
                     </div>
                      <a href="{{ route('assistant.appointments.index') }}" class="btn btn-danger me-3">Cancel &amp;&amp; Close</a>
                      <button type="submit" class="btn btn-primary">Submit Details</button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
