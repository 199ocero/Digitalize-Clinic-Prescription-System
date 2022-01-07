<?php

use App\Models\User;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Clinician;
use App\Http\Controllers\Staff;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $clinician = count(User::whereRoleIs('clinician')->get()->toArray());
    $staff = count(User::whereRoleIs('staff')->get()->toArray());
    $patient = count(Patient::all()->toArray());
    return view('pages.master.index',compact('clinician','staff','patient'));
})->name('dashboard');

Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::prefix('admin')->group(function(){

        //View-Clinician
        Route::get('/clinician/view',[Admin::class,'viewClinician'])->name('view.admin.clinician');
        Route::get('/clinician/add',[Admin::class,'viewAddClinician'])->name('view.admin.clinician.add');

        //CRUD Clinician
        Route::post('/clinician/add',[Admin::class,'addClinician'])->name('clinician.add');
        Route::get('/clinician/edit/{id}',[Admin::class,'editClinician'])->name('clinician.edit');
        Route::post('/clinician/update/{id}',[Admin::class,'updateClinician'])->name('clinician.update');
        Route::get('/clinician/delete/{id}',[Admin::class,'deleteClinician'])->name('clinician.delete');

        //View-Staff
        Route::get('/staff/view',[Admin::class,'viewStaff'])->name('view.admin.staff');
        Route::get('/staff/add',[Admin::class,'viewAddStaff'])->name('view.admin.staff.add');

        //CRUD Staff
        Route::post('/staff/add',[Admin::class,'addStaff'])->name('staff.add');
        Route::get('/staff/edit/{id}',[Admin::class,'editStaff'])->name('staff.edit');
        Route::post('/staff/update/{id}',[Admin::class,'updateStaff'])->name('staff.update');
        Route::get('/staff/delete/{id}',[Admin::class,'deleteStaff'])->name('staff.delete');
    });
});

Route::group(['middleware' => ['auth', 'role:staff']], function() { 
    Route::prefix('staff')->group(function(){

        //View-Staff
        Route::get('/patient/view',[Staff::class,'viewPatient'])->name('view.staff.patient');
        Route::get('/patient/add',[Staff::class,'viewAddPatient'])->name('view.staff.patient.add');

        //CRUD Patient
        Route::post('/patient/add',[Staff::class,'addPatient'])->name('patient.add');
        Route::get('/patient/edit/{id}',[Staff::class,'editPatient'])->name('patient.edit');
        Route::post('/patient/update/{id}',[Staff::class,'updatePatient'])->name('patient.update');
        Route::get('/patient/delete/{id}',[Staff::class,'deletePatient'])->name('patient.delete');
    });
});

Route::group(['middleware' => ['auth', 'role:clinician']], function() { 
    Route::prefix('clinician')->group(function(){

        //View-Staff
        Route::get('/profile/view',[Clinician::class,'viewProfile'])->name('view.profile.clinician');
        Route::get('/password/view',[Clinician::class,'viewPassword'])->name('view.password.clinician');

        //CRUD Profile
        Route::get('/profile/edit',[Clinician::class,'editProfile'])->name('profile.edit');
        Route::post('/profile/update',[Clinician::class,'updateProfile'])->name('profile.update');

        //CRUD Change Password
        Route::post('/password/update',[Clinician::class,'updatePassword'])->name('password.update');

        //Patient View
        Route::get('/patient/view',[Clinician::class,'viewPatient'])->name('view.clinician.patient');

        //Patient Record
        Route::get('/patient/record/details/{id}',[Clinician::class,'viewRecord'])->name('clinician.patient.records');

        //CRUD Patient Record
        Route::get('/patient/record/add/view/{id}',[Clinician::class,'addViewRecord'])->name('patient.record.add');
        Route::post('/patient/record/add/{id}',[Clinician::class,'addRecord'])->name('patient.record.add');

    });
});