<?php

namespace App\Http\Resources\dosen;

use Illuminate\Http\Resources\Json\JsonResource;

class presence extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'student_name'=>$this->krs->student->name,
            'nim'=>$this->krs->student->nim,
            'class'=>$this->krs->classe->name,
            'lecturer'=>$this->krs->classe->lecturers,
            'presence_status'=>$this->status,

        ];
    }
}
