<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $table="room";
    protected $fillable =[
        'id', 'name', 'latiude', 'longitude', 'building_id',
    ];

    public function building(Type $var = null)
    {
        return $this->hasmany(building::class, 'id', 'building_id');
    }
}
