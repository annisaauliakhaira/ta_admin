<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lecturer extends Model
{

    protected $table = "lecturer";

    protected $fillable = [
        'id', 'nik', 'nip',  'name', 'address', 'gender',
    ];

    public function user(Type $var = null)
    {
        return $this->hasone(user::class, 'id', 'id');
    }
}
