<?php

namespace App\Http\Resources\dosen;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\dosen\about as aboutResource;

class dosenLecturerClass extends JsonResource
{
    public function toArray($request)
    {
        return[
            new aboutResource($this->lecturer)
        ];
    }
}
