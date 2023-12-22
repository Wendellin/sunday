<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppointmentTime;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('role_id', 'asc')->latest()->get();
        $roles = Role::where('id', 2)->orWhere('id', 5)->get();
        $aTimes = AppointmentTime::all();
        $depts = Department::all();
        return view('admin.user.index', compact('users', 'roles', 'aTimes', 'depts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed',
        ]);

        $user = new User();
        $user->name = $request->f_name . ' '. $request->l_name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->role_id = 3;
        $user->save();

        Toastr::success($user->name. ' Successfully created', 'Successful');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'f_name'=>'required',
            'email'=>'required|email',
        ]);

        $user = User::find($id);
        $user->name = $request->f_name;
        $user->email = $request->email;
        $user->role_id = $user->role_id;
        $user->save();

        Toastr::success($user->name. ' Successfully updated', 'Successful');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
