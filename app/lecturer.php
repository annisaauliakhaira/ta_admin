<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lecturer extends Model
{

    protected $table = "lecturer";
    protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
        'id', 'nip',  'name', 'email'
    ];

    public function user()
    {
        return $this->hasone(user::class, 'id', 'id');
    }
}
