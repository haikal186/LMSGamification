<?php

namespace App\Models;

use App\Models\Enroll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function enrolls()
    {
        return $this->hasMany(Enroll::class);

    }
}
