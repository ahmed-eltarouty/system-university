<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Subject extends Model
{
    use HasFactory;

    protected $table = 'student_subjects';

    protected $fillable = [
        'semester_id',
        'subject_id',
        'subject_hours',
    ];
}
