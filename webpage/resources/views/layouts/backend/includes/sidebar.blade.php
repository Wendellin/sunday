<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="index.html">
       <img src="images/logo1.png" class="img-fluid" alt="">
       <span>{{ config('app.name') }}</span>
       </a>
       <div class="iq-menu-bt-sidebar">
             <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                   <div class="main-circle"><i class="fa-solid fa-ellipsis"></i></div>
                   <div class="hover-circle"><i class="fa-solid fa-ellipsis fa-rotate-90"></i></div>
                </div>
             </div>
          </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">

            {{-- Only for admins --}}
            @if (Request::is('admin*'))
            {{-- Main Items --}}
             <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li>
             <li class="{{ Route::is('admin.dashboard') ? 'active': '' }}">
                <a href="{{ route('admin.dashboard') }}" class="iq-waves-effect"><i class="fa-solid fa-house"></i><span> Home</span></a>
             </li>
             <li>
                <a href="{{ route('admin.appointment-sessions') }}" class="iq-waves-effect"><i class="fa-regular fa-clock"></i><span> Sessions </span></a>
             </li>
             <li>
                <a href="{{ route('admin.departments') }}" class="iq-waves-effect"><i class="fa-regular fa-building"></i><span> Departments </span></a>
             </li>
             <li>
                <a href="{{ route('admin.province') }}" class="iq-waves-effect"><i class="fa-solid fa-earth-africa"></i><span> Provinces </span></a>
             </li>
             <li>
                <a href="{{ route('admin.district') }}" class="iq-waves-effect"><i class="fa-solid fa-hippo"></i><span> Districts </span></a>
             </li>
             <li>
                <a href="{{ route('admin.doctors.index') }}" class="iq-waves-effect"><i class="fa-solid fa-user-doctor"></i><span> Doctor</span></a>
             </li>
             <li>
                <a href="{{ route('admin.patients.index') }}" class="iq-waves-effect"><i class="fa-solid fa-bed-pulse"></i><span> Patients</span></a>
             </li>
             <li>
                <a href="{{ route('admin.appointments.index') }}" class="iq-waves-effect"><i class="fa-solid fa-stopwatch"></i><span> Appointments</span></a>
             </li>
             <li>
                <a href="{{ route('admin.roles.index') }}" class="iq-waves-effect"><i class="fa-solid fa-hat-cowboy-side"></i><span> Roles</span></a>
             </li>
             <li>
                <a href="{{ route('admin.users.index') }}" class="iq-waves-effect"><i class="fa-solid fa-user"></i><span> Users</span></a>
             </li>
             @endif
            {{-- End  of Admin sidebar --}}


            {{-- Doctor sidebar starts --}}
            @if (Request::is('doctor*'))
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li>
             <li class="{{ Route::is('doctor.dashboard') ? 'active': '' }}">
                <a href="{{ route('doctor.dashboard') }}" class="iq-waves-effect"><i class="fa-solid fa-house"></i><span> Home</span></a>
             </li>
            <li>
                <a href="{{ route('doctor.appointments') }}" class="iq-waves-effect"><i class="fa-solid fa-stopwatch"></i><span>My Appointments</span></a>
             </li>
             @if (Auth::user()->role_id == 5)
                <li>
                    <a href="{{ route('doctor.appointments.all') }}" class="iq-waves-effect"><i class="fa-solid fa-stopwatch"></i><span> All Appointment</span></a>
                </li>
             @endif
            @endif



            {{-- Doctor sidebar starts --}}
            @if (Request::is('assistant*'))
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li>
            <li class="{{ Route::is('assistant.dashboard') ? 'active': '' }}">
               <a href="{{ route('assistant.dashboard') }}" class="iq-waves-effect"><i class="fa-solid fa-house"></i><span> Home</span></a>
            </li>
           <li>
               <a href="{{ route('assistant.appointments.index') }}" class="iq-waves-effect"><i class="fa-solid fa-stopwatch"></i><span> Appointments</span></a>
            </li>
            <li>
                <a href="{{ route('assistant.patient.index') }}" class="iq-waves-effect"><i class="fa-solid fa-stopwatch"></i><span> Patients</span></a>
             </li>
            @endif


            {{-- Doctor sidebar starts --}}
            @if (Request::is('patient*'))
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li>
            <li class="{{ Route::is('patient.dashboard') ? 'active': '' }}">
               <a href="{{ route('assistant.dashboard') }}" class="iq-waves-effect"><i class="fa-solid fa-house"></i><span> Home</span></a>
            </li>
           <li>
               <a href="{{ route('patient.appointments.index') }}" class="iq-waves-effect"><i class="fa-solid fa-stopwatch"></i><span> Appointments</span></a>
            </li>
            @endif


             {{-- Communication --}}
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Communication</span></li>
            <li><a href="#" class="iq-waves-effect"><i class="fa-solid fa-comments"></i><span>Chat</span></a></li>

           <li>
             <a href="#mailbox" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="fa-solid fa-envelope"></i><span>Email</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
             <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li><a href="#"><i class="ri-inbox-fill"></i>Inbox</a></li>
                <li><a href="#"><i class="ri-edit-2-fill"></i>Email Compose</a></li>
             </ul>
          </li>

          {{-- Settings --}}
            <li class="iq-menu-title"><i class="fa-solid fa-gears"></i><span>Settings</span></li>
            <li>
                <a href="
                    @if (Auth::user()->role_id == 1)
                        {{ route('admin.profile') }}
                    @elseif(Auth::user()->role_id == 2 || Auth::user()->role_id == 5)
                        {{ route('doctor.profile') }}
                    @elseif(Auth::user()->role_id == 3)
                        {{ route('assistant.profile') }}
                    @else
                        {{ route('patient.profile') }}
                    @endif
                " class="iq-waves-effect">
                    <i class="fa-solid fa-user-nurse"></i>
                    <span>My Profile</span>
                </a>
            </li>

            <li>
                <a href="{{ route('logout') }}"
                   class="iq-waves-effect"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"
                   role="button">
                    <i class="fa-solid fa-right-from-bracket"></i><span>{{ __('Sign Out') }}</span>
                </a>
            </li>
          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>
