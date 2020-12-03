<?php

namespace App\Http\Resources\dosen;

use Illuminate\Http\Resources\Json\JsonResource;

class examclasses extends JsonResource
{

    public function toArray($request)
    {
        $presence = $this->classe->exam_schedule->presenceKrs($this->id)->first();
        return[
            'exam_id'=>$this->id,
            'name'=>$this->student->name,
            'nim'=>$this->student->nim,
            'presence_status' => $presence? $presence->status : '',
            'presence_code' => $presence? $presence->code : '',
        ];
    }
}
