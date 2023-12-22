@extends('layouts.backend.index')
@section('title') {{ $doctor->users->name }} @endsection

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-lg-3">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Edit {{ $doctor->users->name }} Details</h4>
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
                   <h4 class="card-title">Doctor's Information</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div class="new-user-info">
                   <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="post">
                    @csrf
                    @method('PUT')
                      <div class="row">
                         <div class="form-group mb-4 col-md-6">
                            <label for="fname"> Name:</label>
                            <input type="text" class="form-control" id="fname" placeholder="First Name" name="f_name" value="{{ $doctor->users->name }}">
                         </div>
                        <div class="row">
                            <div class="form-group mb-4 col-md-5">
                                <label for="add1">Local Address</label>
                                <input type="text" class="form-control" id="add1" placeholder="Street Address 1" name="address" value="{{ $doctor->street_address }}">
                             </div>

                             <div class="form-group mb-4 col-md-3">
                                <label for="add1">Date of Birth</label>
                                <input type="date" class="form-control" id="add1" placeholder="{{ date('d m, Y') }}" name="dob" value="{{ $doctor->dob }}">
                             </div>

                             <div class="form-group mb-4 col-md-4">
                                <label for="add1">Gender</label>
                                <select name="gender" id="gender" name="gender" class="form-control">
                                    <option selected value="{{ $doctor->gender }}">{{ $doctor->gender?'Female':'Male' }}</option>
                                    <option @disabled(true)>____________________</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                             </div>
                        </div>

                        <div class="row">
                            <div class="form-group mb-4 col-sm-12 col-lg-6">
                                <label>District:</label>
                                <select class="form-control" id="selectdistrict" name="district_id">
                                   <option selected value="{{ $doctor->district_id }}">{{ $doctor->districts->name }}</option>
                                   <option @disabled(true)>____________________</option>
                                   @forelse ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                   @empty
                                        <option disabled>No District Available </option>
                                   @endforelse
                                </select>
                             </div>
                             <div class="form-group mb-4 col-sm-12 col-lg-6">
                                <label>Department:</label>
                                <select class="form-control" id="selectDepartment" name="department_id">
                                   <option selected value="{{ $doctor->department_id }}">{{ $doctor->departments->name }}</option>
                                   <option @disabled(true)>____________________</option>
                                   @forelse ($depts as $dept)
                                        <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                   @empty
                                        <option disabled>No Department Available </option>
                                   @endforelse
                                </select>
                             </div>
                        </div>

                         <hr>
                         <h5 class="mb-3">Contact Details</h5>
                         <div class="form-group mb-4 col-md-6">
                            <label for="mobno">Mobile Number:</label>
                            <input type="text" class="form-control" id="mobno" placeholder="Mobile Number" name="phone_number" value="{{ $doctor->phone_no }}">
                         </div>
                         <div class="form-group mb-4 col-md-6">
                            <label for="altconno">Alternate Contact:</label>
                            <input type="text" class="form-control" id="altconno" placeholder="Alternate Contact" name="alt_phone_number" value="{{ $doctor->alt_phone_no }}">
                         </div>
                      </div>
                      <hr>
                      <h5 class="mb-3">Security</h5>
                      <div class="row">
                         <div class="form-group mb-4 col-md-12">
                            <label for="uname">Email:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Email Address" name="email" value="{{ $doctor->users->email }}">
                         </div>
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
