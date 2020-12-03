<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class period extends Model
{
    protected $table="period";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id', 'year', 'semester', 'status',
    ];
}
