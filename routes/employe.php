<?php

use App\Http\Controllers\Employe\Auth\EmployeController as AuthEmployeController;
use App\Http\Controllers\Employe\Subject\SubjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| employe Routes
|--------------------------------------------------------------------------
|
| Here is where you can register employe routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "employe" middleware group. Make something great!
|
*/

//======================= Auth Route ====================
Route::get('employe/login' , [AuthEmployeController::class , 'Login_page'])->name('employe.login.page');
Route::post('employe/login/check' , [AuthEmployeController::class , 'Login_check'])->name('employe.login.check');
//======================= End Auth route

Route::middleware(['employes'])->name('employe.')->prefix('employe')->group(function () {
    Route::get('/dashboard', [AuthEmployeController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout',[AuthEmployeController::class , 'logout'])->name('logout');

    //==================== subject employe route =============

    Route::get('/subject' , [SubjectController::class , 'index'])->name('subject.index');
    Route::get('/subject/choose/section/{subject_id}' , [SubjectController::class , 'choose_subject_section'])->name('subject.choose.section');
    Route::get('/subject/lec/section/student',[SubjectController::class , 'lec_section_student'])->name('subject.lec.section.student');
    Route::get('/subject/lab/section/student',[SubjectController::class , 'lab_section_student'])->name('subject.lab.section.student');

    Route::get('/subject/create/lec/section/student' , [SubjectController::class , 'lec_section_student_create'])->name('subject.lec.section.student.create');
    Route::post('/subject/store/lec/section/student' , [SubjectController::class , 'lec_section_student_store'])->name('subject.lec.section.student.store');

    Route::get('/subject/create/lab/section/student' , [SubjectController::class , 'lab_section_student_create'])->name('subject.lab.section.student.create');
    Route::post('/subject/store/lab/section/student' , [SubjectController::class , 'lab_section_student_store'])->name('subject.lab.section.student.store');

    //=================== subject employe absence ======== 
    Route::get('/subject/absence/{subject_id}', [SubjectController::class , 'subject_absence'])->name('subject.absence');

    Route::get('/subject/deprivations/{subject_id}', [SubjectController::class , 'subject_deprivations'])->name('subject.deprivations');
});


