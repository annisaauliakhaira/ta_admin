<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lecturer_class extends Model
{
    protected $table = "lecturerclass";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable =[
        'id', 'class_id', 'lecturer_id',
    ];

    public function classe(Type $var = null)
    {
        return $this->hasmany(classes::class, 'id', 'class_id');
    }

    public function classes(Type $var = null)
    {
        return $this->hasone(classes::class, 'id', 'class_id');
    }

    public function lecturers(Type $var = null)
    {
        return $this->hasmany(lecturer::class, 'id', 'lecturer_id');
    }

    public function lecturer(Type $var = null)
    {
        return $this->hasone(lecturer::class, 'id', 'lecturer_id');
    }
}
