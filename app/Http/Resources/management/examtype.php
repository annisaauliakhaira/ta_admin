<?php

namespace App\Http\Resources\management;

use Illuminate\Http\Resources\Json\JsonResource;

class examtype extends JsonResource
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
            'name'=>$this->name
        ];
    }
}
