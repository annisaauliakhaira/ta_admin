<?php

namespace App\Http\Resources\student;

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
        $presence = $this->classe->exam_schedule->presenceKrs($this->classe->krs->id)->first();
        return[
            'exam_id'=>$this->id,
            'krs_id'=>$this->classe->krs->id,
            'courses'=>[
                'courses_id'=>$this->classe->course->id,
                'courses_name'=>$this->classe->course->name,
                'sks'=>$this->classe->course->sks
            ],
            'classes'=>[
                'class_id'=>$this->classe->id,
                'class_name'=>$this->classe->name
            ],
            'date'=>$this->date,
            'start_hour'=>$this->start_hour,
            'ending_hour'=>$this->ending_hour,
            'room'=>$this->room->name,
            'presence_status' => $presence? $presence->status : '',
            'presence_code' => $presence? $presence->code : '',
            'lecturers'=>[
                'lecturer_id'=>$this->classe->lecturer_class->lecturer->id,
                'name'=>$this->classe->lecturer_class->lecturer->name,
                'nip' =>$this->classe->lecturer_class->lecturer->nip
            ]

        ];
    }
}
