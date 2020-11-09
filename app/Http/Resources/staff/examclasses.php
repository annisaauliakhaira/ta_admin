<?php

namespace App\Http\Resources\staff;

use Illuminate\Http\Resources\Json\JsonResource;

class examclasses extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $presence = $this->classe->exam_schedule->presenceKrs($this->id)->first();
        return[
            'schedule_code'=>$this->classe->exam_schedule->id,
            'lecturer_name'=>$this->classe->lecturer_class->lecturer->name,
            'krs_id'=>$this->id,
            'name'=>$this->student->name,
            'nim'=>$this->student->nim,
            'class_id'=>$this->class_id,
            'class_name'=>$this->classe->name,
            'date'=>$this->classe->exam_schedule->date,
            'start_hour'=>$this->classe->exam_schedule->start_hour,
            'ending_hour'=>$this->classe->exam_schedule->ending_hour,
            'room_id'=>$this->classe->exam_schedule->room->id,
            'room'=>$this->classe->exam_schedule->room->name,
            'presence_status' => $presence? $presence->status : '',
            'presence_code' => $presence? $presence->code : '',
        ];
    }
}
