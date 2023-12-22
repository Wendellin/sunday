@extends('layouts.backend.index')
@section('title') {{ Auth::user()->name }} @endsection

@section('content')


<div class="container-fluid">
    <div class="row">
       <div class="col-lg-10 mx-auto">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">{{ Auth::user()->name }}'s Profile</h4>
                </div>
             </div>
             <div class="iq-card-body">

                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                        <button class="nav-link" id="nav-personal-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-personal-profile" type="button" role="tab" aria-controls="nav-personal-profile" aria-selected="false">Update Profile</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-security" type="button" role="tab" aria-controls="nav-security" aria-selected="false">Security</button>
                        <button class="nav-link" id="nav-picture-tab" data-bs-toggle="tab" data-bs-target="#nav-picture" type="button" role="tab" aria-controls="nav-picture" aria-selected="false">Profile Picture</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <p class="h4 lead">Personal Details</p>
                        <div class="iq-card">
                            <div class="iq-card-body text-start">
                                <div class="doc-profile">
                                    <img class="rounded-circle img-fluid avatar-80" src="{{ asset('backend/asset/images/user/11.png') }}" alt="profile">
                                </div>
                                <div class="iq-doc-info mt-3">
                                    <div class="row">
                                        <div class="col-3 fw-bold">Name: </div>
                                        <div class="col-9">{{ Auth::user()->name }}</div>

                                        <div class="col-3 fw-bold">Current Role: </div>
                                        <div class="col-9"> {{ Auth::user()->roles->name }}</div>


                                        <div class="col-3 fw-bold">Email: </div>
                                        <div class="col-9"><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></div>


                                        <div class="col-3 fw-bold">Department: </div>
                                        <div class="col-9">
                                            <p>
                                                @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 5)
                                                    <span class="fw-bold"></span> {{ Auth::user()->doctors->departments->name }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="iq-doc-description mt-2">
                                    <p class="mb-0"> <strong>About: <br></strong>
                                        @if (is_null(Auth::user()->about))
                                            <p class="fs-6 fst-italic">-- No About. </p>
                                        @else
                                            {{ Auth::user()->about }}
                                        @endif
                                    </p>
                                </div>
                                <a href="#" class="my-3 btn btn-primary">Back Home</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-personal-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <p class="h4 lead">Update Personal Details</p>
                            <form action="
                                @if (Auth::user()->role_id == 1)
                                    {{ route('admin.update-profile') }}
                                @elseif(Auth::user()->role_id == 2)
                                    {{ route('doctor.update-profile') }}
                                @elseif(Auth::user()->role_id == 3)
                                    {{ route('assistant.update-profile') }}
                                @elseif(Auth::user()->role_id == 4)
                                    {{ route('patient.update-profile') }}
                                @elseif(Auth::user()->role_id = 5)
                                    {{ route('doctor.update-profile') }}
                                @else
                                {{ __('/') }}
                                @endif
                                " method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group mb-4 col-md-7">
                                        <label for="fname">First Name: <span class="fst-italic text-primary"><small>(Min of 5 charachers)</small></span></label>
                                        <input type="text" class="form-control" id="fname" placeholder="Your Name" name="name" value="{{ Auth::user()->name }}" required minlength="5">
                                    </div>
                                    <div class="form-group mb-4 col-md-5">
                                        <label for="fname">Verified Email Address:</label>
                                        <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email" @disabled(true)>
                                    </div>
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="I am ...." id="floatingTextarea2" name="about" style="height: 200px" rows="10"> {{ Auth::user()->about }}</textarea>
                                        <label for="floatingTextarea2">About Me</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                    </div>
                    <div class="tab-pane fade" id="nav-security" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p class="h4 lead">Update Login Credentials: Password</p>
                        <form action="
                                @if (Auth::user()->role_id == 1)
                                    {{ route('admin.update-password') }}
                                @elseif(Auth::user()->role_id == 2)
                                    {{ route('doctor.update-password') }}
                                @elseif(Auth::user()->role_id == 3)
                                    {{ route('assistant.update-password') }}
                                @elseif(Auth::user()->role_id == 4)
                                    {{ route('patient.update-password') }}
                                @elseif(Auth::user()->role_id = 5)
                                    {{ route('doctor.update-password') }}
                                @else
                                {{ __('/') }}
                                @endif
                        " method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="form-group mb-4 col-md-12">
                                    <label for="fname">Old Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter old Password" name="old_password" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mb-4 col-md-6">
                                    <label for="new password">New Password <span class="fst-italic text-primary"><small>(Min of 6 charachers)</small></span></label>
                                    <input type="password" class="form-control" id="password"  name="password" placeholder="Enter your new Password" minlength="6" required>
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label for="new password">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Confirm your new Password">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save && Logout</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-picture" role="tabpanel" aria-labelledby="nav-picture-tab">
                        <p>Update Profile Picture</p>
                        <p class="lead">Coming soon</p>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>

@endsection
