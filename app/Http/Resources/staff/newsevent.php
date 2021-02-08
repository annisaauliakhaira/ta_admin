<?php

namespace App\Http\Resources\staff;

use Illuminate\Http\Resources\Json\JsonResource;

class newsevent extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'news_event'=>$this->news_event,
            'exam_id'=>$this->exam_id
        ];
    }
}
