<?php

namespace App\Http\Controllers\Doctor\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Subject_Doctor_lab;
use App\Models\Subject_Doctor_lec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function choose_section()
    {
        return view('Doctor/Subject/choose_section');
    }


    public function subject_lec_table()
    {
        $id = Auth::guard('doctor')->user()->id;

        $subjects_id = Subject_Doctor_lec::where('doctor_id', $id)->pluck('subject_id');

        $subjects = Subject::whereIn('id', $subjects_id)->get();
         
        return view('Doctor/Subject/Lec/lec_subject',compact('subjects'));
    }


    public function subject_lab_table()
    {
        $id = Auth::guard('doctor')->user()->id;

        $subjects_id = Subject_Doctor_lab::where('doctor_id', $id)->pluck('subject_id');

        $subjects = Subject::whereIn('id', $subjects_id)->get();
         
        return view('Doctor/Subject/Lab/lab_subject',compact('subjects'));
    }
    
}
