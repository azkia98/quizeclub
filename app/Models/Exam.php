<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded=['id'];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function answerSheets()
    {
        return $this->hasMany(AnswerSheet::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
