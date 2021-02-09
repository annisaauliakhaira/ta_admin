<?php

namespace App\Http\Resources\dosen;

use Illuminate\Http\Resources\Json\JsonResource;

class about extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'nip'=>$this->nip, 
            'image'=>$this->user->getImage()
        ];
    }
}
