<?php

namespace App\Http\Controllers\Doctor\Subject\Student\Absence;

use App\Http\Controllers\Controller;
use App\Models\Absence_lab;
use App\Models\Absence_lec;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function subject_store_lec_student_absence(Request $request)
    {
        $student = Student::find($request->input('student_id'));
        $student_id = $request->input('student_id');

        $subjectId = $request->input('subject_id');
        $week = $request->input('week');

        $record = Absence_lec::where('week', $week)->where('student_id',$student_id)->where('subject_id',$subjectId)->get();
  
            if(count($record) > 0)
            {
                return redirect()->back()->with('store_error_message', 'This week already added Absence');
            }

            else{
                $student->subjects_absence_lec()->attach($subjectId, [
                    'date' => $request->input('date'),
                    'week' => $request->input('week'),
                    'type' => $request->input('type_absence')
                ]);
        
                return redirect()->back()->with('store_success_message', 'Absence added successfully to Student');
            }

            

    }

    public function subject_store_lab_student_absence(Request $request)
    {
        $student = Student::find($request->input('student_id'));
        $student_id = $request->input('student_id');

        $subjectId = $request->input('subject_id');
        $week = $request->input('week');

        $record = Absence_lab::where('week', $week)->where('student_id',$student_id)->where('subject_id',$subjectId)->get();
  
            if(count($record) > 0)
            {
                return redirect()->back()->with('store_error_message', 'This week already added Absence');
            }

            else{
                $student->subjects_absence_lab()->attach($subjectId, [
                    'date' => $request->input('date'),
                    'week' => $request->input('week'),
                    'type' => $request->input('type_absence')
                ]);
        
                return redirect()->back()->with('store_success_message', 'Absence added successfully to Student');
            }
}
}
