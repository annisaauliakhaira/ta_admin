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
            'student_name'=>$this->krs->student->name,
            'nim'=>$this->krs->student->nim,
            'exam_id'=>$this->schedule->id,
            'classes'=>[
                'id' => $this->schedule->classe->id,
                'class_id'=>$this->schedule->classe->name,
                'class_name'=>$this->schedule->classe->course->name
            ],
            'exam_type'=>$this->schedule->examtype->name, 
            'date'=>$this->schedule->date,
            'start_hour'=>$this->schedule->start_hour->format('H:i'),
            'ending_hour'=>$this->schedule->ending_hour->format('H:i'),
            'room'=>$this->schedule->room->name,
            'room_id'=>$this->schedule->room->id,
            'latitude'=>$this->schedule->room->latitude,
            'longitude'=>$this->schedule->room->longitude,
            'presence_status' => $this->status,
            'presence_mulai' => $this->schedule->waktu_masuk,
            'presence_code' => $this->code,
            'lecturer'=>aboutResource::collection($this->schedule->classe->lecturers),

        ];
    }
}
