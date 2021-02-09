<?php

namespace App\Http\Resources\student;

use Illuminate\Http\Resources\Json\JsonResource;

class about extends JsonResource
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
            'nim'=>$this->nip,
            'email'=>$this->user->email,
            'gender'=>$this->gender, 
            'image'=>$this->user->getImage()
        ];
    }
}
