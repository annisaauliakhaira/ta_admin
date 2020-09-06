<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lecturer_class extends Model
{
    protected $table = "lecturer_class";
    
    protected $fillable =[
        'id', 'class_id', 'lecturer_id',
    ];

    public function classes(Type $var = null)
    {
        return $this->hasmany(classes::class, 'id', 'class_id');
    }

    public function lecturer(Type $var = null)
    {
        return $this->hasmany(lecturer::class, 'id', 'lecturer_id');
    }
}
