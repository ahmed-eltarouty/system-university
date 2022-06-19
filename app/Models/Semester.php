<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester_type',
        'semester_hours',
        'semester_status',
        'user_id',
        'semester_hours_registered',
        'GPA',
    ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function subjects(){
        return $this->hasMany(Student_Subject::class, 'semester_id', 'id');
    }


}
