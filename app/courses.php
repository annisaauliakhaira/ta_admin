<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    protected $table = "courses";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id', 'name', 'sks',
    ];
}
