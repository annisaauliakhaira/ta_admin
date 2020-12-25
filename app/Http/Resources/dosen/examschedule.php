<?php

namespace App\Http\Resources\dosen;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\dosen\about as aboutResource;

class examschedule extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'lecturer'=>aboutResource::collection($this->classe->lecturer_class->lecturers),
            // 'lecturer'=> aboutResource::collection($this->classe->lecturers),
            'class_id'=>$this->classe->id,
            'class_name'=>$this->classe->name,
            'course_name'=>$this->classe->course->name, 
            'room'=>$this->room->name,
            'room_id'=>$this->room->id,
            'latitude'=>$this->room->latitude,
            'longitude'=>$this->room->longitude,
            'date'=>$this->date,
            'start_hour'=>$this->start_hour,
            'ending_hour'=>$this->ending_hour,
            'exam_type'=>$this->examtype->name, 
            'staff_name'=>$this->staff->name
        ];
    }
}
