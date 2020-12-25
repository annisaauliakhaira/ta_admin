<?php

namespace App\Http\Resources\staff;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\staff\about as aboutResource;

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
            'exam_id'=>$this->id,
            'lecturer'=>aboutResource::collection($this->classe->lecturer_class->lecturers),
            'class_id'=>$this->class_id,
            'class_name'=>$this->classe->name,
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
