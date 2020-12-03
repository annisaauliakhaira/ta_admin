<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_schedule extends Model
{
    protected $table = "examschedule";

    
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'start_hour', 'ending_hour', 'date', 'status', 'room_id', 'class_id', 'staff_id', 'examtype_id', 
    ];

    public function rooms()
    {
        return $this->hasmany(room::class, 'id', 'room_id');
    }

    public function room()
    {
        return $this->hasone(room::class, 'id', 'room_id');
    }

    public function classes()
    {
        return $this->hasmany(classes::class, 'id', 'class_id');
    }

    public function classe()
    {
        return $this->hasone(classes::class, 'id', 'class_id');
    }

    public function staffs()
    {
        return $this->hasmany(staff::class, 'id', 'staff_id');
    }

    public function staff()
    {
        return $this->hasone(staff::class, 'id', 'staff_id');
    }

    public function examtypes()
    {
        return $this->hasmany(examtype::class, 'id', 'examtype_id');
    }

    public function examtype()
    {
        return $this->hasone(examtype::class, 'id', 'examtype_id');
    }
    public function newsEvents()
    {
        return $this->hasMany(newsevent::class, 'exam_id', 'id');
    }

    public function presenceKrs($id=null)
    {
        return $this->hasone(presence::class, 'schedule_id', 'id')->where('krs_id',$id);
    }
}
