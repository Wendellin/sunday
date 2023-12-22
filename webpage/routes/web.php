<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\AppointmentTimeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Assistant\AssistantAppointmentController;
use App\Http\Controllers\Assistant\AssistantDashboard;
use App\Http\Controllers\Assistant\AssistantPatientController;
use App\Http\Controllers\Doctor\DoctorAppointmentController;
use App\Http\Controllers\Doctor\DoctorDashboard;
use App\Http\Controllers\Doctor\DoctorSettingController;
use App\Http\Controllers\Patient\PatientAppointmentController;
use App\Http\Controllers\Patient\PatientDashboard;
use App\Http\Controllers\Patient\PatientSettingController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Website Routes.
Route::controller(WebsiteController::class)->group(function(){
    Route::get('/', 'index')->name('welcome');
});


// Authentication routes.
Auth::routes(['verify'=> true]);


// Admin Routes
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'verified', 'admin']], function () {
    Route::controller(AdminDashboard::class)->group(function(){
        Route::get('dashboard', 'index')->name('dashboard');
    });

    // Roles
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    // Appointment Times
    Route::controller(AppointmentTimeController::class)->group(function(){
        Route::get('appointment-sessions', 'index')->name('appointment-sessions');
        Route::post('appointment-sessions-store', 'store')->name('appointment-sessions-store');
        Route::put('appointment-sessions-update/{id}', 'update')->name('appointment-sessions-update');
    });

    // Department Routes
    Route::controller(DepartmentController::class)->group(function(){
        Route::get('departments', 'index')->name('departments');
        Route::post('department-store','store')->name('department-store');
        Route::put('department-update/{id}', 'update')->name('department-update');
    });

    // Province Controller
    Route::controller(ProvinceController::class)->group(function(){
        Route::get('province', 'index')->name('province');
        Route::post('province-store', 'store')->name('province-store');
        Route::put('province-update/{id}', 'update')->name('province-update');
    });

    // District Controller
    Route::controller(DistrictController::class)->group(function(){
        Route::get('district', 'index')->name('district');
        Route::post('district-store', 'store')->name('district-store');
        Route::put('district-update/{id}', 'update')->name('district-update');
    });

    // Patient Route Resource
    Route::resource('patients', PatientController::class);
    Route::resource('doctors', DoctorController::class);
    Route::patch('change-doctor-role/{id}', [DoctorController::class, 'changeRole'])->name('change.doctor.role');
    Route::resource('appointments', AppointmentController::class);
    Route::patch('close/{id}', [AppointmentController::class, 'close'])->name('appointments.close');

    // Settings and Profile
    Route::controller(AdminSettingController::class)->group(function(){
        Route::get('profile', 'profile')->name('profile');
        Route::put('update-profile', 'updateProfile')->name('update-profile');
        Route::patch('update-password', 'updatePassword')->name('update-password');
    });

});


// Doctor Routes
Route::group(['as' => 'doctor.', 'prefix' => 'doctor', 'namespace' => 'App\Http\Controllers\Doctor', 'middleware' => ['auth', 'verified', 'doctor']], function () {
    Route::controller(DoctorDashboard::class)->group(function(){
        Route::get('dashboard', 'index')->name('dashboard');
    });

    // Appointment Doctor can only view(index) and close.
    Route::controller(DoctorAppointmentController::class)->group(function(){
        Route::get('appointments', 'index')->name('appointments');
        Route::patch('close/{id}', 'close')->name('appointments.close');

        // View Patient Profile
        Route::get('patient-profile/{slug}', 'patientProfile')->name('patient.profile');

        // HOD Routes: Assign, get and store.
        Route::get('all-appointments', 'allAppointments')->name('appointments.all');
        Route::get('assign/{slug}', 'assign')->name('appointment.assign');
        Route::patch('store-appointment/{id}', 'store')->name('appointment.store');
    });

    // Settings and Profile
    Route::controller(DoctorSettingController::class)->group(function(){
        Route::get('profile', 'profile')->name('profile');
        Route::put('update-profile', 'updateProfile')->name('update-profile');
        Route::patch('update-password', 'updatePassword')->name('update-password');
    });
});


// Assistant Routes
Route::group(['as' => 'assistant.', 'prefix' => 'assistant', 'namespace' => 'App\Http\Controllers\Assistant', 'middleware' => ['auth', 'verified', 'assistant']], function () {
    Route::controller(AssistantDashboard::class)->group(function(){
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::put('update-profile', 'updateProfile')->name('update-profile');
        Route::patch('update-password', 'updatePassword')->name('update-password');
    });

    // Appointment
    Route::resource('appointments', AssistantAppointmentController::class);
    Route::patch('close/{id}', [AssistantAppointmentController::class, 'close'])->name('appointments.close');

    // PatientRoutes
    Route::controller(AssistantPatientController::class)->group(function(){
        Route::get('patient', 'index')->name('patient.index');
        Route::get('create-patient', 'create')->name('patient.create');
        Route::post('store-patient', 'store')->name('patient.store');
        Route::get('edit-patient/{slug}', 'edit')->name('patient.edit');
        Route::put('update-patient/{id}', 'update')->name('patient.update');

    });
});


// Patient Routes
Route::group(['as' => 'patient.', 'prefix' => 'patient', 'namespace' => 'App\Http\Controllers\Patient', 'middleware' => ['auth', 'verified', 'patient']], function () {
    Route::controller(PatientDashboard::class)->group(function(){
        Route::get('dashboard', 'index')->name('dashboard');
    });

    // Appointments Patient can only index, create and edit an appointment
    Route::resource('appointments', PatientAppointmentController::class);

        // Settings and Profile
        Route::controller(PatientSettingController::class)->group(function(){
            Route::get('profile', 'profile')->name('profile');
            Route::put('update-profile', 'updateProfile')->name('update-profile');
            Route::patch('update-password', 'updatePassword')->name('update-password');
        });
});
