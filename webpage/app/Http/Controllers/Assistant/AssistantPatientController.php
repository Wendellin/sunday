<?php

namespace App\Http\Controllers\Assistant;

use App\Http\Controllers\Controller;
use App\Models\AppointmentTime;
use App\Models\Department;
use App\Models\District;
use App\Models\Patient;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AssistantPatientController extends Controller
{
    public function index()
    {
        $patients= Patient::latest()->get();
        // $patientRegistered = User::where('role_id', '4')->latest()->get();
        // $patients = $patientsTable->merge($patientRegistered);
        $aTimes = AppointmentTime::all();
        $depts = Department::all();
        return view('assistant.patient.index', compact('patients', 'aTimes', 'depts'));
    }

    public function create()
    {
        $districts = District::all();
        return view('assistant.patient.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'f_name'=>'required',
            'l_name'=>'required',
            'address'=>'required',
            'email'=>'required|email|unique:users,email',
            'dob'=>'required|before:'.date('Y-m-d'),
            'gender'=>'required',
            'district_id'=>'required',
            'phone_number'=>'required',
            'alt_phone_number'=>'required',
            'password'=>'required|confirmed',
        ]);

        $user = new User();
        $user->name = $request->f_name . ' '. $request->l_name;
        $user->email = $request->email;
        $user->role_id = 4;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->save();

        $patient = new Patient();
        $patient->user_id = $user->id;
        $patient->slug = Str::slug($user->name).uniqid();
        $patient->dob = $request->dob;
        $patient->street_address = $request->address;
        $patient->gender = $request->gender;
        $patient->district_id = $request->district_id;
        $patient->created_by = Auth::id();
        $patient->last_updated_by = Auth::id();
        $patient->phone_no = $request->phone_number;
        $patient->alt_phone_no = $request->alt_phone_number;
        $patient->save();

        Toastr::success('Patient Successfully registred', 'successful');
        return redirect()->route('assistant.patient.index');
    }

    public function edit(string $slug)
    {
        $patient = Patient::where('slug',$slug)->first();
        $districts = District::all();
        return view('assistant.patient.edit', compact('patient', 'districts'));
    }


    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'f_name'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'dob'=>'required|before:'.date('Y-m-d'),
            'gender'=>'required',
            'district_id'=>'required',
            'phone_number'=>'required',
            'alt_phone_number'=>'required',
        ]);

        $patient = Patient::find($id);
        $user_id = $patient->user_id;

        $user = User::where('id', $user_id)->first();
        $user->name = $request->f_name;
        $user->email = $request->email;
        $user->save();


        $patient->user_id = $user->id;
        $patient->slug = Str::slug($user->name).uniqid();
        $patient->dob = $request->dob;
        $patient->street_address = $request->address;
        $patient->gender = $request->gender;
        $patient->district_id = $request->district_id;
        $patient->last_updated_by = Auth::id();
        $patient->phone_no = $request->phone_number;
        $patient->alt_phone_no = $request->alt_phone_number;
        $patient->save();

        Toastr::success('Patient Successfully updated', 'Successful');
        return redirect()->route('assistant.patient.index');
    }
}
