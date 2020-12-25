<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class student extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'nim'=>$this->nim,
            'name'=>$this->name,
        ];
    }
}
