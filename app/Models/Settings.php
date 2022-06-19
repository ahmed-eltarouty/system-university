<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'semester_register',
        'semester_type',
        'graduate_hours',
        'min_hours',
        'max_hours_CGPA_greater_2',
        'max_hours_CGPA_less_2_greater_1',
        'max_hours_CGPA_less_1',
        'max_hours_summer',
        'min_hours_summer',
        'period_of_editing_registered_semester',
        'emergency_graduate_hours',
    ];
}
