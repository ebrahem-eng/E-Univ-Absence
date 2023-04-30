<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
     'name',
     'code',
     'hour',
     'status',
    ];


    public function doctor_lec()
    {
        return $this->belongsToMany(Doctor::class , 'subject__doctor_lecs' , 'subject_id' , 'doctor_id');
    }

    public function doctor_lab()
    {
        return $this->belongsToMany(Doctor::class , 'subject__doctor_labs' , 'subject_id' , 'doctor_id');
    }

    public function student_lec()
    {
        return $this->belongsToMany(Student::class , 'subject__student_lecs' , 'subject_id' , 'student_id');
    }

    public function student_lab()
    {
        return $this->belongsToMany(Student::class , 'subject__student_labs' , 'subject_id' , 'student_id');
    }


    public function student_absence_lec()
    {
        return $this->belongsToMany(Student::class , 'absence_lecs' , 'subject_id' , 'student_id');
    }

    public function student_absence_lab()
    {
        return $this->belongsToMany(Student::class , 'absence_labs' , 'subject_id' , 'student_id');
    }

    
}
