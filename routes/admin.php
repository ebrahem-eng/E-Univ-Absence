<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminController as AuthAdminController;
use App\Http\Controllers\Admin\Doctor\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\Employe\EmployeController as AdminEmployeController;
use App\Http\Controllers\Admin\Subject\SubjectController as AdminSubjectController;;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

//======================= Auth Route ====================
Route::get('admin/login' , [AuthAdminController::class , 'Login_page'])->name('admin.login.page');
Route::post('admin/login/check' , [AuthAdminController::class , 'Login_check'])->name('admin.login.check');
//======================= End Auth route


Route::middleware(['admins'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AuthAdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout',[AuthAdminController::class , 'logout'])->name('logout');


    //========================== Doctor route ====================
    Route::get('/doctor',[AdminDoctorController::class , 'index'])->name('doctor.index');
    Route::get('/doctor/create',[AdminDoctorController::class , 'create'])->name('doctor.create');
    Route::post('/doctor/store',[AdminDoctorController::class , 'store'])->name('doctor.store');
    //========================== End Doctor route ================

    //========================= Employe route ====================
    Route::get('/employe',[AdminEmployeController::class , 'index'])->name('employe.index');
    Route::get('/employe/create',[AdminEmployeController::class , 'create'])->name('employe.create');
    Route::post('/employe/store',[AdminEmployeController::class , 'store'])->name('employe.store');
    //========================= End employe route ================

    //======================== Subject route =============
    Route::get('/subject',[AdminSubjectController::class , 'index'])->name('subject.index');
    Route::get('/subject/create',[AdminSubjectController::class , 'create'])->name('subject.create');
    Route::post('/subject/store',[AdminSubjectController::class , 'store'])->name('subject.store');

    Route::get('/subject/doctor/chooes',[AdminSubjectController::class , 'choose_doctor'])->name('subject.choose.doctor');

    Route::get('subject/lec/doctor' , [AdminSubjectController::class ,'lec_doctor'])->name('subject_lec_doctor');
    Route::get('subject/create/lec/doctor' , [AdminSubjectController::class ,'create_lec_doctor'])->name('subject_create_lec_doctor');
    Route::post('subject/store/lec/doctor' , [AdminSubjectController::class , 'store_lec_doctor'])->name('subject_store_lec_doctor');


    Route::get('subject/lab/doctor' , [AdminSubjectController::class ,'lab_doctor'])->name('subject_lab_doctor');
    Route::get('subject/create/lab/doctor' , [AdminSubjectController::class ,'create_lab_doctor'])->name('subject_create_lab_doctor');
    Route::post('subject/store/lab/doctor' , [AdminSubjectController::class , 'store_lab_doctor'])->name('subject_store_lab_doctor');
   
    
});
