@extends('layouts.backend.index')
@section('title') {{ $user->name }} @endsection

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-lg-3">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">{{ $user->name }} <br> {{ $user->roles->name }} </h4>
                </div>
             </div>
             <div class="iq-card-body">
                <form>
                   <div class="form-group mb-4">
                      <div class="add-img-user profile-img-edit">
                         <img class="profile-pic img-fluid" src="{{ asset('backend/asset/images/user/11.png') }}" alt="profile-pic">
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
                   <h4 class="card-title">{{ $user->name }} [{{ $user->roles->name }}] Information</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div class="new-user-info">
                   <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                      <div class="row">
                         <div class="col-md-5">
                            <div class="form-group mb-4 col-md-12">
                                <label for="fname">First Name:</label>
                                <input type="text" class="form-control" id="fname" placeholder="First Name" name="f_name" required value="{{ $user->name }}">
                             </div>
                             <div class="form-group mb-4 col-md-12">
                                <label for="uname">Email:</label>
                                <input type="email" class="form-control" id="uname" placeholder="Email Address" name="email" value="{{ $user->email }}">
                             </div>
                         </div>

                         <div class="col-md-7">
                            <div class="form-group mb-4 col-md-12">
                                <label for="add1">About Assistant </label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px" name="about">
                                        {{ $user->about }}
                                    </textarea>
                                    <label for="floatingTextarea2">About Assistant</label>
                                  </div>
                             </div>
                         </div>
                      </div>
                      <a href="{{ route('admin.patients.index') }}" class="btn btn-danger">Cancel &amp;&amp; Close</a>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
