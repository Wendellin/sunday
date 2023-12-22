@extends('layouts.backend.index')
@section('title', 'HOME')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-lg-4">
          <div class="iq-card">
             <div class="iq-card-body pl-0 pr-0 pt-0">
                <div class="doctor-details-block">
                   <div class="doc-profile-bg bg-primary" style="height:150px;">
                   </div>
                   <div class="doctor-profile text-center">
                      <img src="{{ asset('backend/asset/images/user/11.png') }}" alt="profile-img" class="avatar-130 img-fluid">
                   </div>
                   <div class="text-center mt-3 pl-3 pr-3">
                      <h4><b>{{ Str::title($doctor->users->name) }}</b></h4>
                      <p>{{ $doctor->users->roles->name }}</p>
                      <p class="mb-0">{{ $doctor->users->about }}</p>
                   </div>
                   <hr>
                   <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 m-0">
                      <li class="text-center">
                         <h3 class="counter">4500</h3>
                         <span>Operations</span>
                       </li>
                       <li class="text-center">
                         <h3 class="counter">100</h3>
                         <span>Hospital</span>
                       </li>
                       <li class="text-center">
                         <h3 class="counter">10000</h3>
                         <span>Patients</span>
                       </li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Personal Information</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div class="about-info m-0 p-0">
                   <div class="row">
                      <div class="col-4">Name:</div>
                      <div class="col-8">{{ Str::title($doctor->users->name) }}</div>
                      <div class="col-4">Age:</div>
                      <div class="col-8">{{ date('Y') - (date('Y', strtotime($doctor->dob))) }} Years</div>
                      <div class="col-4">Role:</div>
                      <div class="col-8">{{ $doctor->users->roles->name }}</div>
                      <div class="col-4">Email:</div>
                      <div class="col-8"><a href="mailto:{{ $doctor->users->email }}"> {{ $doctor->users->email }} </a></div>
                      <div class="col-4">Phone:</div>
                      <div class="col-8"><a href="tel:{{ $doctor->phone_no }}">{{ $doctor->phone_no }}</a></div>
                      <div class="col-4">Department:</div>
                      <div class="col-8">{{ $doctor->departments->name }}</div>
                   </div>
                </div>
             </div>
          </div>

       </div>
       <div class="col-lg-8">
          <div class="row">







            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"><span class="fw-bold">{{ Str::title($doctor->users->name) }}</span> Appointments</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-responsive">
                      <table class="table mb-0 table-borderless table-striped">
                         <thead>
                            <tr>
                               <th scope="col">ID</th>
                               <th scope="col">Patient Name </th>
                               <th scope="col">Patient Phone</th>
                               <th scope="col">Date</th>
                               <th scope="col">Status</th>
                               <th scope="col">Closed By</th>
                            </tr>
                         </thead>
                         <tbody>
                            @forelse ($appointments as $key=>$appointment)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $appointment->patients->users->name }}</td>
                                    <td>{{ $appointment->patients->phone_no }}</td>
                                    <td>{{ date('D d M, Y', strtotime($appointment->date)) }}</td>
                                    <td>
                                        @if ($appointment->status == 0)
                                            <span class="badge text-bg-primary">Closed </span>
                                        @elseif($appointment->status == 2)
                                            <span class="badge text-bg-success">Assigned </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $appointment->lastUpdatedBys->name }}
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                         </tbody>
                         <tfoot>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Patient Name </th>
                                <th scope="col">Patient Phone</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Closed By</th>
                             </tr>
                         </tfoot>
                      </table>
                   </div>

                </div>
                <div class="text-end">
                    {!! $appointments->links() !!}
                </div>
              </div>
            </div>
       </div>
    </div>
</div>

@endsection
