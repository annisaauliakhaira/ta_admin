<?php

namespace App\Http\Resources\staff;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'class' => [
                'id'=>$this->classe->id,
                'name'=>$this->classe->name,
            ],
            'course' => [
                'id'=>$this->classe->course->id,
                'name'=>$this->classe->course->name,
                'sks'=>$this->classe->course->sks,
            ],
            'lecturer'=>[
                'lecturer_id'=>$this->classe->lecturer_class->lecturer->id,
                'name'=>$this->classe->lecturer_class->lecturer->name,
                'nip' =>$this->classe->lecturer_class->lecturer->nip
            ],
            'room_id'=>$this->room->id,
            'room'=>$this->room->name,
            'date'=>$this->date,
            'start_hour'=>$this->start_hour,
            'ending_hour'=>$this->ending_hour,
            'exam_type'=>$this->examtype->name,
            'staff_name'=>$this->staff->name
        ];
    }
}
