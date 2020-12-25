<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class staff extends JsonResource
{

    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'username'=>$this->username,
            'name'=>$this->name,
        ];
    }
}
