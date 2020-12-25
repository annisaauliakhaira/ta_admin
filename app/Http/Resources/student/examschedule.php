<?php

namespace App\Http\Resources\student;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\dosen\about as aboutResource;
use Illuminate\Support\Facades\Auth;

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
            'exam_id'=>$this->schedule->id,
            'classes'=>[
                'class_id'=>$this->schedule->classe->name,
                'class_name'=>$this->schedule->classe->course->name
            ],
            'date'=>$this->schedule->date,
            'start_hour'=>$this->schedule->start_hour,
            'ending_hour'=>$this->schedule->ending_hour,
            'room'=>$this->schedule->room->name,
            'room_id'=>$this->schedule->room->id,
            'latitude'=>$this->schedule->room->latitude,
            'longitude'=>$this->schedule->room->longitude,
            'presence_status' => $this->status,
            'presence_code' => $this->code,
            'lecturer'=>aboutResource::collection($this->schedule->classe->lecturer_class->lecturers),

        ];
    }
}
