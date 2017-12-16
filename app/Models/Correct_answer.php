<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Correct_answer extends Model
{
    protected $guarded=['id'];

    protected $table='correct_answer';

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
