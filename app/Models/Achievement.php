<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function scores() 
    {
        return $this->hasMany(Score::class);
    }

    public function files()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
