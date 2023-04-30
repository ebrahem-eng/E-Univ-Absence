<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        's_number',
    ];


    public function subjects_lec()
    {
        return $this->belongsToMany(Subject::class , 'subject__student_lecs' , 'student_id' , 'subject_id');
    }

    public function subjects_lab()
    {
        return $this->belongsToMany(Subject::class , 'subject__student_labs' , 'student_id' , 'subject_id');
    }


    public function subjects_absence_lec()
    {
        return $this->belongsToMany(Subject::class , 'absence_lecs' , 'student_id' , 'subject_id');
    }

    public function subjects_absence_lab()
    {
        return $this->belongsToMany(Subject::class , 'absence_labs' , 'student_id' , 'subject_id');
    }
}
