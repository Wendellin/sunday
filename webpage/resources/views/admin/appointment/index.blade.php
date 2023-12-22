@extends('layouts.backend.index')
@section('title') {{ Auth::user()->name }} @endsection

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header justify-content-between">
                <div class="row pt-3">
                    <div class="col-sm-6">
                        <div class="iq-header-title">
                            {{-- Return only forthcoming appointments --}}
                            <h4 class="card-title">{{ Auth::user()->name }} Appointments [{{ $appointments->count() }}]</h4>
                         </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('admin.appointments.create') }}" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> New Appointnment
                        </a>
                    </div>
                </div>
             </div>
             <div class="iq-card-body">

                <div class="table-responsive">
                   <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                         <tr>
                            <th>ID</th>
                            <th>DATE</th>
                            <th>SESSION</th>
                            <th>PATIENT NAME</th>
                            <th>DEPARTMENT</th>
                            <th>ASSIGNED TO</th>
                            {{-- <th>STATUS</th> --}}
                            <th>BOOKED BY</th>
                            <th>ACTION</th>
                         </tr>
                      </thead>
                      <tbody>
                            @forelse ($appointments as $key=>$appointment)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ date('D M d, Y', strtotime($appointment->date)) }}</td>
                                    <td>{{ $appointment->apointmentTimes->name }}</td>
                                    <td>
                                        <a href="{{ route('doctor.patient.profile', $appointment->patients->slug) }}">
                                            {{ $appointment->patients->users->name }}
                                        </a>
                                    </td>
                                    <td>{{ $appointment->departments->name }}</td>
                                    <td>
                                        @if ($appointment->status == 0)
                                            <span class="badge text-bg-success">Completed: <small>{{ $appointment->lastUpdatedBys->name }}</small></span>
                                        @elseif($appointment->status == 1)
                                            <span class="badge text-bg-primary">New, Upcoming</span>
                                        @else
                                            <span class="badge text-bg-danger">Assigned:
                                                <small>
                                                   @if (!(is_null($appointment->doctor_id)))
                                                        {{ $appointment->doctors->users->name }}
                                                   @endif
                                                </small>
                                            </span>
                                        @endif
                                    </td>
                                    {{-- <th>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="appointmentstatus" {{ $appointment->status?'':'checked' }} @disabled(true)>
                                            <label class="form-check-label" for="appointmentstatus">{{ $appointment->status?'Upcoming' : 'Closed' }}</label>
                                          </div>
                                    </th> --}}
                                    <td>{{ $appointment->users->name }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                              ACTIONS
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="{{ route('admin.appointments.edit', $appointment->id) }}" title="Edit Appointment">Edit</a></li>
                                              <li><a role="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#closeAppointment-{{ $appointment->id }}">Close</a></li>
                                            </ul>
                                          </div>
                                          @include('admin.appointment.close')
                                    </td>
                                </tr>
                            @empty
                                    {{-- <tr>
                                        <td colspan="4">No Session added</td>
                                    </tr> --}}
                            @endforelse
                      </tbody>
                      <tfoot>
                         <tr>
                            <th>ID</th>
                            <th>DATE</th>
                            <th>SESSION</th>
                            <th>PATIENT NAME</th>
                            <th>DEPARTMENT</th>
                            <th>ASSIGNED TO</th>
                            {{-- <th>STATUS</th> --}}
                            <th>BOOKED BY</th>
                            <th>ACTION</th>
                         </tr>
                      </tfoot>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
