<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class building extends Model
{
    protected $table = "building";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'name',
    ];
}
