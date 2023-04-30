<?php

namespace App\Http\Controllers\Employe\Subject;

use App\Http\Controllers\Controller;
use App\Models\Absence_lec;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subject_Student_lab;
use App\Models\Subject_Student_lec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    //عرض صفحة المواد الموجودة في النظام

    public function index()
    {
        $subjects = Subject::all();
        return view('Employe/Subject/index', compact('subjects'));
    }


    //اظهار صفحة اختيار عرض الطلاب المسجلين في القسم النظري او العملي


    public function choose_subject_section($subject_id)
    {
        return view('Employe/Subject/choose_section', compact('subject_id'));
    }



    //اظهار الطلاب المسجلين في القسم النظري من المادة

    public function lec_section_student(Request $request)
    {
        $subject_id = $request->input('subject_id');

        $student_id = Subject_Student_lec::where('subject_id', $subject_id)->pluck('student_id');

        $students = Student::whereIn('id', $student_id)->get();


        return view('Employe/Subject/lec_student', compact('students', 'subject_id'));
    }


    //اظهار صفحة اضافة الطلاب للقسم النظري من المادة

    public function lec_section_student_create(Request $request)
    {
        $subject_id = $request->input('subject_id');
        $subject_name = Subject::where('id', $subject_id)->value('name');
        $students = Student::all();
        return view('Employe/Subject/create_lec_student', compact('subject_id', 'subject_name', 'students'));
    }



    //تخزين الطلاب في القسم النظري للمادة

    public function lec_section_student_store(Request $request)
    {
        $subject = Subject::find($request->input('subject_id'));

        if (!$subject) {
        }
        $student_id = $request->input('studentId');
        if ($subject->student_lec()->where('student_id', $student_id)->exists()) {
            return redirect()->back()->with('store_error_message', 'Student already exists in Subject');
        }

        $subject->student_lec()->attach($student_id);
        return redirect()->back()->with('store_success_message', 'Student added successfully to Subject');
    }


    //اظهار الطلاب المسجلين في القسم العملي من المادة

    public function lab_section_student(Request $request)
    {
        $subject_id = $request->input('subject_id');

        $student_id = Subject_Student_lab::where('subject_id', $subject_id)->pluck('student_id');

        $students = Student::whereIn('id', $student_id)->get();


        return view('Employe/Subject/lab_student', compact('students', 'subject_id'));
    }




    //اظهار صفحة اضافة الطلاب للقسم العملي من المادة

    public function lab_section_student_create(Request $request)
    {
        $subject_id = $request->input('subject_id');
        $subject_name = Subject::where('id', $subject_id)->value('name');
        $students = Student::all();
        return view('Employe/Subject/create_lab_student', compact('subject_id', 'subject_name', 'students'));
    }



    //تخزين الطلاب في القسم العملي للمادة

    public function lab_section_student_store(Request $request)
    {
        $subject = Subject::find($request->input('subject_id'));

        if (!$subject) {
        }
        $student_id = $request->input('studentId');
        if ($subject->student_lab()->where('student_id', $student_id)->exists()) {
            return redirect()->back()->with('store_error_message', 'Student already exists in Subject');
        }

        $subject->student_lab()->attach($student_id);
        return redirect()->back()->with('store_success_message', 'Student added successfully to Subject');
    }




    //(القسم النظري)عرض صفحة الغيابات في مادة معينة واظهار عدد الغيابات

    public function subject_absence($subject_id)
    {

        $student_lec_id = Absence_lec::where('subject_id', $subject_id)->where('type', 2)->pluck('student_id');

        $students = Student::whereIn('id', $student_lec_id)->get();

        $absences = DB::table('absence_lecs')
            ->select('student_id', DB::raw('COUNT(*) as num_absences'))
            ->where('subject_id', $subject_id)
            ->where('type', 2)
            ->groupBy('student_id')
            ->get();

            $delays = DB::table('absence_lecs')
            ->select('student_id', DB::raw('CEIL(COUNT(*) ) as num_delays'))
            ->whereIn('student_id', $student_lec_id)
            ->where('subject_id', $subject_id)
            ->where('type', 1)
            ->groupBy('student_id')
            ->get();

        return view('Employe/Subject/absence_student', compact('students', 'absences' , 'delays'));
    }

    //(القسم النظري)عرض صفحة الحرمانات وحساب كل ثلاث تأخيرات غياب في مادة معينة واظهار عدد الغيابات

    public function subject_deprivations($subject_id)
    {

        $absent_students = Absence_lec::where('subject_id', $subject_id)
            ->where('type', 2)
            ->groupBy('student_id')
            ->havingRaw('COUNT(*) > 3')
            ->pluck('student_id');

        $students = Student::whereIn('id', $absent_students)->get();

        $absences = DB::table('absence_lecs')
            ->select('student_id', DB::raw('COUNT(*) as num_absences'))
            ->whereIn('student_id', $absent_students)
            ->where('subject_id', $subject_id)
            ->where('type', 2)
            ->groupBy('student_id')
            ->get();

        $delays = DB::table('absence_lecs')
            ->select('student_id', DB::raw('CEIL(COUNT(*) / 3) as num_delays'))
            ->whereIn('student_id', $absent_students)
            ->where('subject_id', $subject_id)
            ->where('type', 1)
            ->groupBy('student_id')
            ->get();

        return view('Employe/Subject/deprivations_student', compact('students', 'absences', 'delays'));
    }
}
