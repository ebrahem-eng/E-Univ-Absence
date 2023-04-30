<?php

namespace App\Http\Controllers\Admin\Subject;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Subject;
use App\Models\Subject_Doctor_lab;
use App\Models\Subject_Doctor_lec;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('Admin/Subject/index', compact('subjects'));
    }

    public function create()
    {
        return view('Admin/Subject/create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'hour' => 'required| min:1 | max:5',

        ]);

        $name = $request->input('name');


        $existingSubject = Subject::where('name', $name)->first();

        if ($existingSubject) {
            return redirect()->back()->with('store_error_message', 'Subject already exists.');
        }

        if (Subject::create([
            'name' => $name,
            'code' => $request->input('code'),
            'hour' => $request->input('hour'),
        ])) {
            return redirect()->route('admin.subject.index')->with('store_success_message', 'Subject Added Successfully');
        } else {
            return redirect()->back()->with('store_error_message', 'Subject failed add check data ');
        }
    }

    public function choose_doctor(Request $request)
    {
        $subject_id = $request->input('subject_id');
        return view('Admin/Subject/Choose_Doctor', compact('subject_id'));
    }

    public function lec_doctor(Request $request)
    {
        $subject_id = $request->input('subject_id');
        $lec_doctors_id = Subject_Doctor_lec::where('subject_id', $subject_id)->pluck('doctor_id');
        $lec_doctors_details = Doctor::get()->whereIn('id', $lec_doctors_id);
        return view('Admin/Subject/Lec_Subject_Doctor', compact('subject_id', 'lec_doctors_details'));
    }

    public function create_lec_doctor(Request $request)
    {
        $subject_id = $request->input('subject_id');
        $subject_name = Subject::where('id', $subject_id)->value('name');
        $doctors = Doctor::all();

        return view('Admin/Subject/create_lec_subject_doctor', compact('subject_id', 'subject_name', 'doctors'));
    }

    public function store_lec_doctor(Request $request)
    {

        $subject = Subject::find($request->input('subject_id'));

        if (!$subject) {
        }
        $doctorId = $request->input('doctorId');
        if ($subject->doctor_lec()->where('doctor_id', $doctorId)->exists()) {
            return redirect()->back()->with('store_error_message', 'Doctor already exists in Subject');
        }

        $subject->doctor_lec()->attach($doctorId);
        return redirect()->back()->with('store_success_message', 'Doctor added successfully to Subject');
    }

    public function lab_doctor(Request $request)
    {
        $subject_id = $request->input('subject_id');
        $lab_doctors_id = Subject_Doctor_lab::where('subject_id', $subject_id)->pluck('doctor_id');
        $lab_doctors_details = Doctor::get()->whereIn('id', $lab_doctors_id);
        return view('Admin/Subject/Lab_Subject_Doctor', compact('subject_id', 'lab_doctors_details'));
    }

    public function create_lab_doctor(Request $request)
    {
        $subject_id = $request->input('subject_id');
        $subject_name = Subject::where('id', $subject_id)->value('name');
        $doctors = Doctor::all();

        return view('Admin/Subject/create_lab_subject_doctor', compact('subject_id', 'subject_name', 'doctors'));
    }

    public function store_lab_doctor(Request $request)
    {

        $subject = Subject::find($request->input('subject_id'));

        if (!$subject) {
        }
        $doctorId = $request->input('doctorId');
        if ($subject->doctor_lab()->where('doctor_id', $doctorId)->exists()) {
            return redirect()->back()->with('store_error_message', 'Doctor already exists in Subject');
        }

        $subject->doctor_lab()->attach($doctorId);
        return redirect()->back()->with('store_success_message', 'Doctor added successfully to Subject');
    }
}
