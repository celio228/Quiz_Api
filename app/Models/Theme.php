<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'phase_id',
        'name',
        'description',
        'order'
    ];

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getQuestionsWithOptions()
    {
        return $this->questions()->with('options')->get();
    }
}