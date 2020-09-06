<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table="student";

    protected $fillable = [
        'id', 'nip',  'name', 'gender',
    ];

    public function user(Type $var = null)
    {
        return $this->hasone(user::class, 'id', 'id');
    }
}
