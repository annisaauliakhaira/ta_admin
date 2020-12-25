<?php

namespace App\Http\Resources\dosen;

use Illuminate\Http\Resources\Json\JsonResource;

class presence extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'student_id'=>$this->student_id,
            'class_id'=>$this->class_id,
            'examtype_id'=>$this->examtype_id,
            'student_name'=>$this->krs->student->name,
            'nim'=>$this->krs->student->nim, 
            'class'=>$this->krs->classe->name,
            'presence_status'=>$this->status

        ];
    }
}
