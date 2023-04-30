<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence_lec extends Model
{
    use HasFactory;

    protected $fillable = [
  
        'date',
        'type',
        'week',
    ];
}
