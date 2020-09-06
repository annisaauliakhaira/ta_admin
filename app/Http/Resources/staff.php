<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class staff extends JsonResource
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
            'nik'=>$this->nik,
            'nip'=>$this->nip,
            'gender'=>$this->gender
        ];
    }
}
