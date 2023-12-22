@extends('layouts.backend.index')
@section('title', 'Users')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header justify-content-between">
                <div class="row pt-3">
                    <div class="col-sm-6">
                        <div class="iq-header-title">
                            <h4 class="card-title">Users</h4>
                         </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-plus"></i> New </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.doctors.create') }}">Doctor</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.patients.create') }}">Patient</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.create') }}">Assistant</a></li>
                            </ul>
                        </div>
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
                            <th>CREATED AT</th>
                            <th>ACTIONS</th>
                         </tr>
                      </thead>
                      <tbody>
                            @forelse ($users as $key=>$user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::title($user->name) }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role_id == 1)
                                            <span class="badge rounded-pill text-bg-danger">{{ $user->roles->name }}</span>
                                        @elseif ($user->role_id == 2 || $user->role_id == 5)
                                            <span class="badge rounded-pill text-bg-success">{{ $user->roles->name }}</span>
                                        @elseif ($user->role_id == 3)
                                            <span class="badge rounded-pill text-bg-info">{{ $user->roles->name }}</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-primary">{{ $user->roles->name }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->toFormattedDayDateString() }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-spinner fa-spin"></i> Actions </button>
                                            <ul class="dropdown-menu">
                                                    @if ($user->role_id == 2 || $user->role_id == 5)
                                                        <li><a class="dropdown-item" href="{{ route('admin.doctors.edit', $user->doctors->id) }}">Edit</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.doctors.show', $user->doctors->id) }}">View</a></li>
                                                        <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changeRoleFromUser-{{ $user->id }}">Change Role</a></li>
                                                    @elseif($user->role_id == 3)
                                                        <li><a class="dropdown-item" href="{{ route('admin.users.edit', $user->id) }}">Edit</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.users.show', $user->id) }}">View</a></li>
                                                    @elseif($user->role_id == 4)
                                                        <li><a class="dropdown-item" href="{{ route('admin.patients.edit', $user->patients->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.patients.show', $user->patients->id) }}"><i class="fa-regular fa-eye"></i> View</a></li>
                                                        {{-- <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#bookPatientAppointmentFromUser-{{ $user->patients->id }}"><i class="fa-solid fa-calendar-check"></i> Appointment</a></li> --}}
                                                        <li><a class="dropdown-item" href="{{ route('admin.appointments.create') }}"><i class="fa-solid fa-calendar-check"></i> Appointment</a></li>
                                                    @else
                                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house-user fa-beat-fade"></i> Home</a></li>
                                                    @endif
                                            </ul>
                                        </div>
                                    </td>
                                    {{-- Include book appointment modal and change role --}}
                                    @include('admin.user.modal.change-doctor-role')
                                    {{-- @include('admin.user.modal.book-appointment') --}}
                                </tr>
                            @empty
                            @endforelse
                      </tbody>
                      <tfoot>
                         <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>CREATED AT</th>
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
