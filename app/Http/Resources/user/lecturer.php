<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class lecturer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'nik'=>$this->nik,
            'nip'=>$this->nip,
            'name'=>$this->name,
            'addres'=>$this->address,
            'gender'=>$this->gender
        ];
    }
}
