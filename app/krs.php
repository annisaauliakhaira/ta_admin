<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class krs extends Model
{
    protected $table="krs";
    
    protected $fillable =[
        'id', 'class_id', 'student_id',
    ];

    public function classes(Type $var = null)
    {
        return $this->hasmany(classes::class, 'id', 'class_id');
    }

    public function student(Type $var = null)
    {
        return $this->hasmany(student::class, 'id', 'student_id');
    }
}
