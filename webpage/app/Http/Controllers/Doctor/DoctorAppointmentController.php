<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorAppointment;
use App\Models\Patient;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorAppointmentController extends Controller
{
    public function index()
    {
        $doctor_dept = Doctor::select('department_id')->where('user_id', Auth::id())->get(); //getting doctors department only

        $allAppointments = Appointment::whereIn('department_id', $doctor_dept)->orderBy('status', 'desc')->get();
        $doctor_dept = Doctor::select('department_id')->where('user_id', Auth::id())->get();
        $doctors = Doctor::whereIn('department_id', $doctor_dept)->get();

        $doctor_id = Doctor::select('id')->where('user_id', Auth::id())->first();
        $appointments = Appointment::whereIn('doctor_id', $doctor_id)->get();
        return view('doctor.appointment.index', compact('appointments', 'doctor_dept', 'doctors', 'allAppointments'));
    }


    /**
     * All Appointments
     *
     */
    public function allAppointments()
    {
        $doctor_dept = Doctor::select('department_id')->where('user_id', Auth::id())->get(); //getting doctors department only

        $appointments = Appointment::whereIn('department_id', $doctor_dept)->orderBy('status', 'desc')->get();
        $doctor_dept = Doctor::select('department_id')->where('user_id', Auth::id())->get();
        $doctors = Doctor::whereIn('department_id', $doctor_dept)->get();

        return view('doctor.appointment.index', compact('appointments', 'doctor_dept', 'doctors'));
    }

    /**
     * Close an Appointment
    */
    public function close(Request $request, $id)
    {
        $this->validate($request, [
            'confirm'=>'required'
        ]);

        if($request->confirm  == 'confirm' || $request->confirm == 'Confirm')
        {
            $appointment = Appointment::find($id);
            $appointment->status = FALSE;
            $appointment->last_updated_by = Auth::id();
            $appointment->save();

            Toastr::success('Appointment Successfully closed', 'successful');
            return redirect()->back();
        }
        else
        {
            Toastr::error('Sorry, an error occurred', 'Error');
            return redirect()->back();
        }

    }


    /**
     * Assign Appointment to a doctor
     *
     */
    public function assign($slug)
    {
        $appointment = Appointment::where('slug', $slug)->first();
        $doctor_dept = Doctor::select('department_id')->where('user_id', Auth::id())->get();
        $doctors = Doctor::whereIn('department_id', $doctor_dept)->get();
        return view('doctor.appointment.assign', compact('appointment', 'doctors'));
    }

    /**
     * Store Appointment Assignment
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'doctor_id'=>'required'
        ]);

        $assign = Appointment::find($id);
        $assign->assigned_by = Auth::id();
        $assign->doctor_id = $request->doctor_id;
        $assign->status = 2;
        $assign->save();

        Toastr::success('Assignment Successfully', 'Successful');
        return redirect()->route('doctor.appointments');
    }

    /**
     * Getting the patient profile
     *
     */

     public function patientProfile($slug)
     {
        $patient = Patient::where('slug', $slug)->first();
        return view('doctor.patient.profile', compact('patient'));
     }
}
