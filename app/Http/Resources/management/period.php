<?php

namespace App\Http\Resources\management;

use Illuminate\Http\Resources\Json\JsonResource;

class period extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'year'=>$this->year,
            'semester'=>$this->semester,
            'status'=>$this->status
        ];
    }
}
