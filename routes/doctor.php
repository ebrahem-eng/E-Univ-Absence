<?php

use App\Http\Controllers\Doctor\Auth\DoctorController as AuthDoctorController;
use App\Http\Controllers\Doctor\Subject\Student\Absence\AbsenceController;
use App\Http\Controllers\Doctor\Subject\Student\StudentController;
use App\Http\Controllers\Doctor\Subject\SubjectController as SubjectDoctorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register doctor routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "doctor" middleware group. Make something great!
|
*/

//======================= Auth Route ====================
Route::get('doctor/login' , [AuthDoctorController::class , 'Login_page'])->name('doctor.login.page');
Route::post('doctor/login/check' , [AuthDoctorController::class , 'Login_check'])->name('doctor.login.check');
//======================= End Auth route

Route::middleware(['doctors'])->name('doctor.')->prefix('doctor')->group(function () {
    Route::get('/dashboard', [AuthDoctorController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout',[AuthDoctorController::class , 'logout'])->name('logout');

    //========================= Subjct route ============================

    Route::get('/subject/choose/section',[SubjectDoctorController::class ,'choose_section'])->name('subject.choose.section');
    Route::get('/subject/lec/table',[SubjectDoctorController::class ,'subject_lec_table'])->name('subject.lec.table');
    Route::get('/subject/lab/table',[SubjectDoctorController::class ,'subject_lab_table'])->name('subject.lab.table');

    //======================== Student Subject Route =====================
    Route::get('/subject/lec/student/{subject_id}' , [StudentController::class , 'subject_lec_student'])->name('subject.lec.student');
    Route::get('/subject/lab/student/{subject_id}' , [StudentController::class , 'subject_lab_student'])->name('subject.lab.student');

    //====================== student subject absence route 
    Route::post('/subject/store/lec/student/absence', [AbsenceController::class , 'subject_store_lec_student_absence'])->name('subject.store.lec.student.absence');
    Route::post('/subject/store/lab/student/absence', [AbsenceController::class , 'subject_store_lab_student_absence'])->name('subject.store.lab.student.absence');

});