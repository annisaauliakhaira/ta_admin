<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    protected $table="classes";

    protected $primaryKey = 'id'; // or null
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id', 'name', 'courses_id', 'period_id',
    ];

    public function courses()
    {
        return $this->hasmany(courses::class, 'id', 'courses_id');
    }

    public function course()
    {
        return $this->hasone(courses::class, 'id', 'courses_id');
    }

    public function periods()
    {
        return $this->hasmany(period::class, 'id', 'period_id');
    }
    
    public function period()
    {
        return $this->hasone(period::class, 'id','period_id');
    }

    public function lecturer_class()
    {
            return $this->hasOne(lecturer_class::class, 'class_id','id');
    }

    public function exam_schedule()
    {
        return $this->hasone(exam_schedule::class, 'class_id', 'id');
    }

    public function krs($studentId=null)
    {
        if($studentId){
            return $this->hasone(krs::class, 'class_id', 'id')->where('student_id',$studentId);
        }
        return $this->hasone(krs::class, 'class_id', 'id');
    }

    public function krses()
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
