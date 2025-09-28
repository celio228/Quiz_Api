<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_id',
        'question_text',
        'question_type',
        'points'
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function quizResponses()
    {
        return $this->hasMany(QuizResponse::class);
    }

    public function getCorrectOptions()
    {
        return $this->options()->where('is_correct', true)->get();
    }
} 