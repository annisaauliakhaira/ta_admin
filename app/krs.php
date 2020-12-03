<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class krs extends Model
{
    protected $table="krs";
    
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable =[
        'id', 'class_id', 'student_id',
    ];

    public function classes(Type $var = null)
    {
        return $this->hasmany(classes::class, 'id', 'class_id');
    }

    public function classe(Type $var = null)
    {
        return $this->hasone(classes::class, 'id', 'class_id');
    }

    public function students(Type $var = null)
    {
        return $this->hasmany(student::class, 'id', 'student_id');
    }

    public function student(Type $var = null)
    {
        return $this->hasone(student::class, 'id', 'student_id');
    }

    public function presence(Type $var = null)
    {
        return $this->hasone(presence::class, 'krs_id', 'id');
    }
}
