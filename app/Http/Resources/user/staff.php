<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class staff extends JsonResource
{

    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'username'=>$this->user->username,
        ];
    }
}
