@extends('layouts.backend.index')
@section('title', 'Doctors')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header justify-content-between">
                <div class="row pt-3">
                    <div class="col-sm-6">
                        <div class="iq-header-title">
                            <h4 class="card-title">Doctors</h4>
                         </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary float-end">
                            <i class="fa-solid fa-plus"></i> New Doctor
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
                            <th>ROLE</th>
			    <th>DEPARTMENT</th>
                            <th>PHONE NUMBER</th>
                            <th>ALT PHONE NUMBER</th>
                            <th>HOME ADDRESS</th>
                            <th>GENDER</th>
                            <th>ACTIONS</th>
                         </tr>
                      </thead>
                      <tbody>
                            @forelse ($doctors as $key=>$doctor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::title($doctor->users->name) }}</td>
                                    <td><a href="mailto:{{ $doctor->users->email }}">{{ $doctor->users->email }}</a></td>
                                    <td>{{ $doctor->users->roles->name }} </td>
				    <td>{{ $doctor->departments->name }} </td>
                                    <td>{{ $doctor->phone_no }}</td>
                                    <td>{{ $doctor->alt_phone_no }}</td>
                                    <td>{{ $doctor->street_address }}</td>
                                    <td>{{ $doctor->gender? 'Female' : 'Male' }}</td>
                                    <td>
                                        <!-- Example single danger button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('admin.doctors.edit', $doctor->id) }}">Edit</a></li>
                                                <li><a class="dropdown-item" href="{{ route('admin.doctors.show', $doctor->id) }}">View</a></li>
                                                <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changeRole-{{ $doctor->users->id }}">Change Role</a></li>
                                            </ul>
                                        </div>
                                        @include('admin.doctor.change-role')
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
                            <th>ROLE</th>
			    <th>DEPARTMENT</th>
                            <th>PHONE NUMBER</th>
                            <th>ALT PHONE NUMBER</th>
                            <th>HOME ADDRESS</th>
                            <th>GENDER</th>
                            <th>ACTIONS</th>
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
