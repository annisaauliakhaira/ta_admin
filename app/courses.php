<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    protected $table = "courses";
    
    protected $fillable = [
        'id', 'name', 'sks',
    ];
}
