<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'level',
        'points_per_question',
        'order'
    ];

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }

    public function questions()
    {
        return $this->hasManyThrough(Question::class, Theme::class);
    }

    public function userScores()
    {
        return $this->hasMany(UserScore::class);
    }
}