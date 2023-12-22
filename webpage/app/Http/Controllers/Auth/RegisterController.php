<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\WelcomeEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(Auth::check() && Auth::user()->role_id == 1)
        {
            $this->redirectTo = route('admin.dashboard');
        }
        elseif(Auth::check() && Auth::user()->roles->id == 2 || Auth::check() && Auth::user()->roles->id == 5)
        {
            $this->redirectTo = route('doctor.dashboard');
        }
        elseif(Auth::check() && Auth::user()->roles->id == 3)
        {
            $this->redirectTo = route('assistant.dashboard');
        }
        else
        {
            $this->redirectTo = route('patient.dashboard');
        }

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Create the registered person in the patient table
        $patient = new Patient();
        $patient->user_id = $user->id;
        $patient->slug = Str::slug($user->name).uniqid();
        $patient->created_by = $user->id;
        $patient->last_updated_by = $user->id;

        $patient->phone_no = 0;  // 0 will reflect as not set.
        $patient->alt_phone_no = 0; // 0 will reflect as not set.

        $patient->dob = date('Y-m-d'); // DOB will reflect as today.
        $patient->street_address = "Not Set";
        $patient->gender = FALSE;
        $patient->district_id = 1;

        $patient->save();


        $user->notify(new WelcomeEmail($user));

        return $user;
    }
}
