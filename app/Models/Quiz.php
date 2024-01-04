<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'level',
        'quiz_duration',
        'course_id',
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
