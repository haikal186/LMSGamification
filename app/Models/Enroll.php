<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $table = 'enrollments'; 

    protected $fillable = [
        'user_id', 
        'course_id', 
        'enroll_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
