<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_schedule extends Model
{
    protected $table = "examschedule";

    public $incrementing = false;
    public $primaryKey = "id";

    protected $fillable = [
        'id', 'start_hour', 'ending_hour', 'date', 'status', 'room_id', 'class_id', 'staff_id', 'examtype_id', 'news_event',
    ];

    public function rooms(Type $var = null)
    {
        return $this->hasmany(room::class, 'id', 'room_id');
    }

    public function room(Type $var = null)
    {
        return $this->hasone(room::class, 'id', 'room_id');
    }

    public function classes(Type $var = null)
    {
        return $this->hasmany(classes::class, 'id', 'class_id');
    }

    public function classe(Type $var = null)
    {
        return $this->hasone(classes::class, 'id', 'class_id');
    }

    public function staffs(Type $var = null)
    {
        return $this->hasmany(staff::class, 'id', 'staff_id');
    }

    public function staff(Type $var = null)
    {
        return $this->hasone(staff::class, 'id', 'staff_id');
    }

    public function examtypes(Type $var = null)
    {
        return $this->hasmany(examtype::class, 'id', 'examtype_id');
    }

    public function examtype(Type $var = null)
    {
        return $this->hasone(examtype::class, 'id', 'examtype_id');
    }

    public function presenceKrs($id=null)
    {
        return $this->hasone(presence::class, 'schedule_id', 'id')->where('krs_id',$id);
    }
}
