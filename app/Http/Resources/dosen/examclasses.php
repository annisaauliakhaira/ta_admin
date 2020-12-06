<?php

namespace App\Http\Resources\dosen;

use Illuminate\Http\Resources\Json\JsonResource;

class examclasses extends JsonResource
{

    public function toArray($request)
    {
        $presence = $this->presence;
        return[
            'id'=>$presence->id,
            'exam_id'=>$presence->schedule_id,
            'name'=>$this->student->name,
            'nim'=>$this->student->nim,
            'presence_status' => $presence->status,
            'presence_code' => $presence->code,
        ];
    }
}
