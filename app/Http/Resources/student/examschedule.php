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
        $krs = $this->classe->krs(Auth::user()->id)->first();
        $presence = $this->classe->exam_schedule->presenceKrs($krs->id)->first();
        return[
            'exam_id'=>$this->id,
            'krs_id'=>$krs->id,
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
            'lecturer'=>aboutResource::collection($this->classe->lecturer_class->lecturers),

        ];
    }
}
