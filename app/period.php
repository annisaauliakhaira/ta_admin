<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class period extends Model
{
    protected $table="period";
    
    protected $fillable = [
        'id', 'year', 'semester', 'status',
    ];
}
