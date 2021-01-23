<?php

namespace App\Http\Resources\student;

use Illuminate\Http\Resources\Json\JsonResource;

class examshistory extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'student_id'=>$this->student_id,
            'class_name'=>$this->krs->classe->name,
            'date'=>$this->schedule->date,
            'start_hour'=>$this->schedule->start_hour->format('H:i'),
            'ending_hour'=>$this->schedule->ending_hour->format('H:i'),
            'room'=>$this->schedule->room->name,
            'examtype_id'=>$this->examtype_id,
            'enter_time'=>$this->presence_time_start,
            'exit_time'=>$this->presence_time_end,
            'examtype'=>$this->schedule->examtype->name,
            'courses'=>$this->schedule->classe->course->name,
            'name'=>$this->krs->student->name,
            'nim'=>$this->krs->student->nim,
            'presence_status' => $this->status,
            
        ];
    }
}
