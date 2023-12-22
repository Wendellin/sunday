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
                      <h4><b>{{ Str::title(Auth::user()->name) }}</b></h4>
                      <p>{{ Auth::user()->roles->name }}</p>
                      <p class="mb-0">{{ Auth::user()->about }}</p>
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
                      <div class="col-8">{{ Str::title(Auth::user()->name) }}</div>
                      <div class="col-4">DOB:</div>
                      <div class="col-8">{{ date('D d M, Y', strtotime(Auth::user()->doctors->dob)) }}</div>
                      <div class="col-4">Role:</div>
                      <div class="col-8">{{ Auth::user()->doctors->users->roles->name }}</div>
                      <div class="col-4">Age:</div>
                      <div class="col-8">{{ date('Y') - (date('Y', strtotime(Auth::user()->doctors->dob))) }} Years old</div>
                      <div class="col-4">Email:</div>
                      <div class="col-8"><a href="mailto:{{ Auth::user()->email }}"> {{ Auth::user()->email }} </a></div>
                      <div class="col-4">Phone:</div>
                      <div class="col-8"><a href="tel:{{ Auth::user()->doctors->phone_no }}">{{ Auth::user()->doctors->phone_no }}</a></div>
                      <div class="col-4">Department:</div>
                      <div class="col-8">{{ Auth::user()->doctors->departments->name }}</div>
                   </div>
                </div>
             </div>
          </div>

       </div>
       <div class="col-lg-8">
          <div class="row">
             <div class="col-md-6">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Speciality</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <ul class="speciality-list m-0 p-0">
                         <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid"><a href="#" class="iq-bg-primary"><i class="ri-award-fill"></i></a></div>
                            <div class="media-support-info ml-3">
                               <h6>professional</h6>
                               <p class="mb-0">Certified Skin Treatment</p>
                            </div>
                         </li>
                         <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid"><a href="#" class="iq-bg-warning"><i class="ri-award-fill"></i></a></div>
                            <div class="media-support-info ml-3">
                               <h6>Certified</h6>
                               <p class="mb-0">Cold Laser Operation</p>
                            </div>
                         </li>
                         <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid"><a href="#" class="iq-bg-info"><i class="ri-award-fill"></i></a></div>
                            <div class="media-support-info ml-3">
                               <h6>Medication Laser</h6>
                               <p class="mb-0">Hair Lose Product</p>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-md-6">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Chat Notifications</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <ul class="iq-timeline">
                         <li>
                            <div class="timeline-dots border-success"></div>
                            <h6 class="">Dr. Joy Send you Photo</h6>
                            <small class="mt-1">23 November 2019</small>
                         </li>
                         <li>
                            <div class="timeline-dots border-danger"></div>
                            <h6 class="">Reminder : Opertion Time!</h6>
                            <small class="mt-1">20 November 2019</small>
                         </li>
                         <li>
                            <div class="timeline-dots border-primary"></div>
                            <h6 class="mb-1">Patient Call</h6>
                            <small class="mt-1">19 November 2019</small>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-md-6">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Today's Appointments</h4>
                      </div>
                      <div><a href="{{ route('doctor.appointments') }}" class="float-end btn btn-primary me-4">View All Appointments</a></div>
                   </div>
                   <div class="iq-card-body">
                      <ul class="list-inline m-0 p-0">

                         @forelse ($appointments as $appointment)
                           <li>
                            <div class="row">
                                <div class="col-9">
                                    <h6 class="float-left mb-1">{{ $appointment->patients->users->name }} - <small>({{ $appointment->departments->name }})</small></h6>
                                    <p class="badge badge-primary">
                                        {{ date('l', strtotime($appointment->date)) }}:
                                        {{ date('h:i A', strtotime($appointment->apointmentTimes->start_time)) }} -
                                        {{ date('h:i A', strtotime($appointment->apointmentTimes->end_time)) }}
                                    </p>
                                </div>
                                <div class="col-3">
                                    <div><a href="{{ route('doctor.appointments') }}" class="float-end mt-1 btn iq-bg-primary">View</a></div>
                                </div>
                            </div><hr>
                           </li>

                         @empty
                                <li>No Appointment found</li>

                         @endforelse



                      </ul>
                    </div>
                </div>
             </div>
            </div>
       </div>
    </div>
</div>

@endsection
