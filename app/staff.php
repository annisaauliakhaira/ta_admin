<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $table="staff";
    
    protected $fillable = [
        'id', 'nik', 'nip',  'name', 'gender',
    ];

    public function user(Type $var = null)
    {
        return $this->hasone(user::class, 'id', 'id');
    }
}
