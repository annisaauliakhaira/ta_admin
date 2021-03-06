<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class room extends JsonResource
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
            'name'=>$this->name,
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude,
            'building'=>$this->building_id
        ];
    }
}
