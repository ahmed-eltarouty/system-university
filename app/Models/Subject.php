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
        'study_hours',
        'max_degree',
        'min_degree',
        'total_students_can_register',
        'GPA_Greater_Than',
        'finished_subject_id_1',
        'finished_subject_id_2',
        'required_hours',
        'category_id',
        'subject_status',
        'status',
    ];

    // public function semester(){
    //     return $this->belongsToMany('App\Models\Semester', 'semesters_subjects', 'subject_id', 'semester_id');
    // }

    public function category(){
        return $this->belongsTo('App\Models\SubjectCategory', 'category_id');
    }
}
