<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectCategory extends Model
{
    use HasFactory;

    protected $table = 'subject_categories';

    protected $fillable = [
        'name', 'code', 'total_hours', 'min_hours', 'max_hours', 'M_hours', 'E_hours', 'status'
    ];
}
