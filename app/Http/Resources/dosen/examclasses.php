<?php

namespace App\Http\Resources\dosen;

use Illuminate\Http\Resources\Json\JsonResource;

class examclasses extends JsonResource
{

    public function toArray($request)
    { 
        return[
            'student_id'=>$this->student_id,
            'class_id'=>$this->class_id,
            'examtype_id'=>$this->examtype_id,
            'name'=>$this->student->name,
            'nim'=>$this->student->nim,
            'presence_status' => $this->status,
            'presence_code' => $this->code,
        ];
    }
}
