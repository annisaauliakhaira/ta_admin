<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class user extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'username'=>$this->username,
            'status'=>$this->status,
            'image'=>$this->getImage()
        ];
    }
}
