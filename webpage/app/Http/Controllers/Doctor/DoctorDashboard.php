<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorDashboard extends Controller
{
    public function index()
    {
        $doctor_dept = Doctor::select('department_id')->where('user_id', Auth::id())->get(); //getting doctors department only
        // $appointments = Appointment::whereIn('department_id', $doctor_dept)->where()->orderBy('status', 'desc')->skip(0)->take(4)->get();
        $doctor_id = Doctor::select('id')->where('user_id', Auth::id())->first();
        $appointments = Appointment::whereIn('doctor_id', $doctor_id)->get();
        return view('doctor.profile', compact('appointments'));
    }

    public function profile()
    {
        return view('doctor.profile');
    }
}
