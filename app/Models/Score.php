<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Score extends Model
{
    use HasFactory;

    protected $table = 'scores';

    protected $fillable = [
        'score',
        'duration',
        'date_completed',
        'user_id',
        'quiz_id',
        'achievement_id',
    ];

    public function achievements()
    {
        return $this->belongsTo(Achievement::class, 'achievement_id');
    }

    public function quizzes()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

