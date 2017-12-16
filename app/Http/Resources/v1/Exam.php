<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\Resource;

class Exam extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'expiry'=>$this->expiry,
            'course_id'=>$this->course_id,
            'created_at'=> (string)$this->created_at,
            'updated_at'=> (string)$this->updated_at,
            'questions'=>$this->questions
        ];
    }
}
