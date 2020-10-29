<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    protected $table="classes";
    
    protected $fillable = [
        'id', 'name', 'courses_id', 'period_id',
    ];

    public function courses(Type $var = null)
    {
        return $this->hasmany(courses::class, 'id', 'courses_id');
    }

    public function course(Type $var = null)
    {
        return $this->hasone(courses::class, 'id', 'courses_id');
    }

    public function periods(Type $var = null)
    {
        return $this->hasmany(period::class, 'id', 'period_id');
    }
    
    public function period(Type $var = null)
    {
        return $this->hasone(period::class, 'id','period_id');
    }

    public function lecturer_class(Type $var = null)
    {
            return $this->hasOne(lecturer_class::class, 'class_id','id');
    }

    public function exam_schedule(Type $var = null)
    {
        return $this->hasone(exam_schedule::class, 'class_id', 'id');
    }

    public function krs(Type $var = null)
    {
        return $this->hasone(krs::class, 'class_id', 'id');
    }

    public function krses(Type $var = null)
    {
        return $this->hasMany(krs::class, 'class_id', 'id');
    }

    public function krsMahasiswa()
    {
        return $this->belongsToMany(student::class, 'krs','class_id', 'student_id');
    }

    public function lecturers()
    {
        return $this->belongsToMany(lecturer::class, 'lecturerclass','class_id', 'lecturer_id');
    }
}
