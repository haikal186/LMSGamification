<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'submission_date',
        'assignment_id',
        'user_id',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class,'assignment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
