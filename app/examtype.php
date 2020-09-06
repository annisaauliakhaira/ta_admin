<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examtype extends Model
{
    protected $table = "examtype";
    
    protected $fillable = [
        'id', 'name',
    ];
}
