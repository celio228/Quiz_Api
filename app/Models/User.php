<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'points',
    ];

    public function quizResponses()
    {
        return $this->hasMany(QuizResponse::class);
    }

    public function scores()
    {
        return $this->hasMany(UserScore::class);
    }

    public function getScoreForPhase($phaseId)
    {
        return $this->scores()->where('phase_id', $phaseId)->first();
    }
}