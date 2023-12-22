@extends('layouts.backend.index')
@section('title', 'Patients')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header justify-content-between">
                <div class="row pt-3">
                    <div class="col-sm-6">
                        <div class="iq-header-title">
                            <h4 class="card-title">Patients</h4>
                         </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('admin.patients.create') }}" class="btn btn-primary float-end">
                            <i class="fa-solid fa-plus"></i> New Patient
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
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE NUMBER</th>
                            <th>ALT PHONE NO.</th>
                            <th>HOME ADDRESS</th>
                            <th>GENDER</th>
                            <th>ACTION</th>
                         </tr>
                      </thead>
                      <tbody>
                            @forelse ($patients as $key=>$patient)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::title($patient->users->name) }}</td>
                                    <td><a href="mailto:{{ $patient->users->email }}">{{ $patient->users->email }}</a></td>
                                    <td>{{ $patient->phone_no }}</td>
                                    <td>{{ $patient->alt_phone_no }}</td>
                                    <td>{{ $patient->street_address }}</td>
                                    <td>{{ $patient->gender? 'Female' : 'Male' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                              Actions
                                            </button>
                                            <ul class="dropdown-menu" style="">
                                              <li><a class="dropdown-item" href="{{ route('admin.patients.edit', $patient->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a></li>
                                              <li><a class="dropdown-item" href="{{ route('admin.patients.show', $patient->id) }}"><i class="fa-regular fa-eye"></i> View</a></li>
                                              <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#bookPatientAppointment-{{ $patient->id }}"><i class="fa-solid fa-calendar-check"></i> Appointment</a></li>
                                            </ul>
                                          </div>
                                          @include('admin.appointment.create')
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
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE NUMBER</th>
                            <th>ALT PHONE NO.</th>
                            <th>HOME ADDRESS</th>
                            <th>GENDER</th>
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
