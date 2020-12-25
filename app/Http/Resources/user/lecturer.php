<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class lecturer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'nip'=>$this->nip,
            'name'=>$this->name,
            'addres'=>$this->address,
        ];
    }
}
