<?php

namespace App\Http\Resources\staff;

use Illuminate\Http\Resources\Json\JsonResource;

class about extends JsonResource
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
