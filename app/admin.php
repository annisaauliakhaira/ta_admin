<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = "admin";
    
    protected $fillable = [
        'id', 'nik', 'nip',  'name', 'gender',
    ];

    public function user(Type $var = null)
    {
        return $this->hasone(user::class, 'id', 'id');
    }
}
