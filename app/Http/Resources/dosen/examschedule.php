<?php

namespace App\Http\Resources\dosen;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\dosen\about as aboutResource;

class examschedule extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'lecturer'=> aboutResource::collection($this->classe->lecturers),
            'class' => [
                'id'=>$this->classe->id,
                'name'=>$this->classe->name,
            ],
            'course' => [
                'id'=>$this->classe->course->id,
                'name'=>$this->classe->course->name,
                'sks'=>$this->classe->course->sks,
            ],
            'room'=>$this->room->name,
            'date'=>$this->date,
            'start_hour'=>$this->start_hour,
            'ending_hour'=>$this->ending_hour,
            'exam_type'=>$this->examtype->name
        ];
    }
}
