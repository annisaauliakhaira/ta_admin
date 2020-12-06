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

    public function classes()
    {
        return $this->hasmany(classes::class, 'id', 'class_id');
    }

    public function classe()
    {
        return $this->hasone(classes::class, 'id', 'class_id');
    }

    public function students()
    {
        return $this->hasmany(student::class, 'id', 'student_id');
    }

    public function student()
    {
        return $this->hasone(student::class, 'id', 'student_id');
    }

    public function presence()
    {
        return $this->hasone(presence::class, 'krs_id', 'id');
    }
}
