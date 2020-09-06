<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class student extends JsonResource
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
            'nim'=>$this->nim,
            'name'=>$this->name,
            'gender'=>$this->gender
        ];
    }
}
