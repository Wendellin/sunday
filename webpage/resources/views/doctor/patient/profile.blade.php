@extends('layouts.backend.index')
@section('title') {{ $patient->users->name }} @endsection

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
                      <img src="{{ asset('backend/asset/images/user/11.png') }}" alt="{{ $patient->users->name }}" class="avatar-130 img-fluid">
                   </div>
                   <div class="text-center mt-3 pl-3 pr-3">
                      <h4><b>{{ $patient->users->name }}</b></h4>

                      <p class="mb-0">{{ $patient->users->about }}</p>
                   </div>
                   <hr>
                   <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 m-0">
                      <li class="text-center">
                         <h3 class="counter">4500</h3>
                         <span>Visits</span>
                       </li>
                       <li class="text-center">
                         <h3 class="counter">100</h3>
                         <span>Hospital</span>
                       </li>
                       <li class="text-center">
                         <h3 class="counter">10</h3>
                         <span>Appointments</span>
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
                      <div class="col-8">{{ $patient->users->name }}</div>
                      <div class="col-4">DoB:</div>
                      <div class="col-8">{{ date('D, M d, Y', strtotime($patient->dob)) }}</div>
                      <div class="col-4">Registration Date:</div>
                      <div class="col-8">{{ $patient->created_at->toFormattedDayDateString() }}</div>
                      <div class="col-4">Email:</div>
                      <div class="col-8"><a href="mailto:{{ $patient->users->email }}"> {{ $patient->users->email }} </a></div>
                      <div class="col-4">Phone:</div>
                      <div class="col-8"><a href="tel:{{ $patient->phone_no }}">{{ $patient->phone_no }}</a></div>
                      <div class="col-4">Alt Phone:</div>
                      <div class="col-8"><a href="tel:{{ $patient->alt_phone_no }}">{{ $patient->alt_phone_no }}</a></div>
                      <div class="col-4">Location/Address:</div>
                      <div class="col-8">{{ $patient->street_address }}, {{ $patient->districts->name }}</div>
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
                         <h4 class="card-title">Patients Notes</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                       <ul class="list-inline m-0 p-0">
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>Treatment was good!</h6>
                               <p class="mb-0">Eye Test </p>
                            </div>
                            <div><a href="#" class="btn iq-bg-primary">Open</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>My Helth in better Now</h6>
                               <p class="mb-0">Fever Test</p>
                            </div>
                            <div><a href="#" class="btn iq-bg-primary">Open</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>No Effacted</h6>
                               <p class="mb-0">Thyroid Test</p>
                            </div>
                            <div><a href="#" class="btn iq-bg-danger">Close</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>Operation Successfull</h6>
                               <p class="mb-0">Orthopaedic</p>
                            </div>
                            <div><a href="#" class="btn iq-bg-primary">Open</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>Mediacal Care is just a click away</h6>
                               <p class="mb-0">Join Pain </p>
                            </div>
                            <div><a href="#" class="btn iq-bg-danger">Close</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between">
                            <div>
                               <h6>Treatment is good</h6>
                               <p class="mb-0">Skin Treatment </p>
                            </div>
                            <div><a href="#" class="btn iq-bg-primary">Open</a></div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-md-6">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Schedule</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <ul class="list-inline m-0 p-0">
                         <li>
                            <h6 class="float-left mb-1">Ruby saul (Blood Check)</h6>
                            <small class="float-right mt-1">Today</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-primary">09:00 AM </p>
                            </div>
                         </li>
                         <li>
                            <h6 class="float-left mb-1">  Anna Mull (Fever)</h6>
                            <small class="float-right mt-1">Today</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-danger">09:15 AM </p>
                            </div>
                         </li>
                         <li>
                            <h6 class="float-left mb-1">Petey Cruiser (X-ray)</h6>
                            <small class="float-right mt-1">Today</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-warning">10:00 AM </p>
                            </div>
                         </li>
                         <li>
                            <h6 class="float-left mb-1">Anna Sthesia (Full body Check up)</h6>
                            <small class="float-right mt-1">Today</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-info">01:00 PM </p>
                            </div>
                         </li>
                         <li>
                            <h6 class="float-left mb-1">Paul Molive (Operation)</h6>
                            <small class="float-right mt-1">Tomorrow</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-success">09:00 AM </p>
                            </div>
                         </li>

                      </ul>
                   </div>
                </div>
             </div>


              <div class="col-md-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Medical History</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <table class="datatable table table-stripped ">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Position</th>
                                          <th>Office</th>
                                          <th>Age</th>
                                          <th>Start date</th>
                                          <th>Salary</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>Tiger Nixon</td>
                                          <td>System Architect</td>
                                          <td>Edinburgh</td>
                                          <td>61</td>
                                          <td>2011/04/25</td>
                                          <td>$320,800</td>
                                      </tr>
                                      <tr>
                                          <td>Garrett Winters</td>
                                          <td>Accountant</td>
                                          <td>Tokyo</td>
                                          <td>63</td>
                                          <td>2011/07/25</td>
                                          <td>$170,750</td>
                                      </tr>
                                      <tr>
                                          <td>Ashton Cox</td>
                                          <td>Junior Technical Author</td>
                                          <td>San Francisco</td>
                                          <td>66</td>
                                          <td>2009/01/12</td>
                                          <td>$86,000</td>
                                      </tr>
                                      <tr>
                                          <td>Cedric Kelly</td>
                                          <td>Senior Javascript Developer</td>
                                          <td>Edinburgh</td>
                                          <td>22</td>
                                          <td>2012/03/29</td>
                                          <td>$433,060</td>
                                      </tr>

                                  </tbody>
                              </table>
                      </div>

                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>

@endsection
