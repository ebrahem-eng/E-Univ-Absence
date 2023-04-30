<?php

namespace App\Http\Controllers\Doctor\Subject\Student;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function subject_lec_student($subject_id)
    {
        $subject = Subject::find($subject_id);
        $students = $subject->student_lec;
        return view('Doctor/Subject/Lec/Student/index' , compact('students','subject_id'));
    }

    public function subject_lab_student($subject_id)
    {
        $subject = Subject::find($subject_id);
        $students = $subject->student_lab;
        return view('Doctor/Subject/Lab/Student/index' , compact('students' , 'subject_id')); 
    }

   
}
