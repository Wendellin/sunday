<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientDashboard extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return;
    }
}
