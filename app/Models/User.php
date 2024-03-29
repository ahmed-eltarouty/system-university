<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'code',
        'phone',
        'address',
        'specialization_id',
        'semester',
        'year_enrolled',
        'total_registered_hours',

        'total_finished_hours',

        'GPA',
        'CGPA',
        'supervisor_id',
        'status',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function supervisor(){
        return $this->belongsTo(Supervisor::class);
    }

    public function semesters(){
        // return $this->belongsToMany('App\Models\Semester', 'students_semesters', 'user_id', 'semester_id');
        return $this->hasMany('App\Models\Semester','user_id','id');
    }


    public function category(){

        return $this->belongsToMany('App\Models\SubjectCategory', 'user_categories', 'user_id', 'category_id');
    }

    public function notifications(){
        return $this->hasMany('App\Models\Notification','user_id','id');
    }

}
