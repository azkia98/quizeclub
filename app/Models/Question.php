<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded=['id'];
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function usersAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
