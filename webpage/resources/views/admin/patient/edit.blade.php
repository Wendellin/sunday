@extends('layouts.backend.index')
@section('title')
    {{ $patient->users->name }}
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-lg-3">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Edit {{ $patient->users->name }} Details</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <form>
                   <div class="form-group mb-4">
                      <div class="add-img-user profile-img-edit">
                         <img class="profile-pic img-fluid" src="images/user/11.png" alt="profile-pic">
                         <div class="p-image">
                            <a href="javascript:void();" class="upload-button btn iq-bg-primary">File Upload</a>
                            <input class="file-upload" type="file" accept="image/*">
                         </div>
                      </div>
                      <div class="img-extension mt-3">
                         <div class="d-inline-block align-items-center">
                            <span>Only</span>
                            <a href="javascript:void();">.jpg</a>
                            <a href="javascript:void();">.png</a>
                            <a href="javascript:void();">.jpeg</a>
                            <span>allowed</span>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
       <div class="col-lg-9">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Patient Information</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div class="new-user-info">
                   <form action="{{ route('admin.patients.update', $patient->id) }}" method="post">
                    @csrf
                    @method('PUT')
                      <div class="row">
                         <div class="form-group mb-4 col-md-12">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control" id="fname" placeholder="First Name" name="f_name" value="{{ $patient->users->name }}">
                         </div>
                        <div class="row">
                            <div class="form-group mb-4 col-md-5">
                                <label for="add1">Local Address</label>
                                <input type="text" class="form-control" id="add1" placeholder="Street Address 1" name="address" value="{{ $patient->street_address }}">
                             </div>

                             <div class="form-group mb-4 col-md-3">
                                <label for="add1">Date of Birth</label>
                                <input type="date" class="form-control" id="add1" placeholder="{{ date('d m, Y') }}" name="dob" value="{{ $patient->dob }}">
                             </div>

                             <div class="form-group mb-4 col-md-4">
                                <label for="add1">Gender</label>
                                <select name="gender" id="gender" name="gender" class="form-control">
                                    <option value="{{ $patient->gender }}" selected>{{ $patient->gender?'Female':'Male' }}</option>
                                    <option disabled>__________________________</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                             </div>
                        </div>
                         <div class="form-group mb-4 col-sm-12">
                            <label>District:</label>
                            <select class="form-control" id="selectdistrict" name="district_id">
                               <option value="{{ $patient->district_id }}" selected>{{ $patient->districts->name }}</option>
                               <option disabled>__________________________</option>
                               @forelse ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                               @empty
                                    <option disabled>No District Available </option>
                               @endforelse
                            </select>
                         </div>

                         <hr>
                         <h5 class="mb-3">Contact Details</h5>
                         <div class="form-group mb-4 col-md-6">
                            <label for="mobno">Mobile Number:</label>
                            <input type="text" class="form-control" id="mobno" placeholder="Mobile Number" name="phone_number" value="{{ $patient->phone_no }}">
                         </div>
                         <div class="form-group mb-4 col-md-6">
                            <label for="altconno">Alternate Contact:</label>
                            <input type="text" class="form-control" id="altconno" placeholder="Alternate Contact" name="alt_phone_number" value="{{ $patient->alt_phone_no }}">
                         </div>
                      </div>

                      <hr>
                      <h5 class="mb-3">Security</h5>
                      <div class="row">
                         <div class="form-group mb-4 col-md-12">
                            <label for="uname">Email:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Email Address" name="email" value="{{ $patient->users->email }}">
                         </div>
                         {{-- <div class="form-group mb-4 col-md-6">
                            <label for="pass">Password:</label>
                            <input type="password" class="form-control" id="pass" placeholder="..........." name="password">
                         </div>
                         <div class="form-group mb-4 col-md-6">
                            <label for="rpass">Confirm Password:</label>
                            <input type="password" class="form-control" id="rpass" placeholder="..........." name="password_confirmation">
                         </div> --}}
                      </div>
                      <a href="{{ route('admin.patients.index') }}" class="btn btn-danger">Cancel</a>
                      <button type="submit" class="btn btn-primary">Submit Details</button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
