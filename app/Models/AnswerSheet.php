<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AnswerSheet extends Model
{
    protected $guarded=[];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
