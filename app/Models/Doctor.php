<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'doctor';

    protected $fillable = [
        'name',
        'email',
        'password',
        'college',
        'specialization',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function subjects_lec()
    {
        return $this->belongsToMany(Subject::class , 'subject__doctor_lecs' , 'doctor_id' , 'subject_id');
    }

    public function subjects_lab()
    {
        return $this->belongsToMany(Subject::class , 'subject__doctor_labs' , 'doctor_id' , 'subject_id');
    }
}
