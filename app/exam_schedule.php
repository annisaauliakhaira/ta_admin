<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_schedule extends Model
{
    protected $table = "examschedule";

    protected $fillable = [
        'id', 'start_hour', 'ending_hour', 'date', 'status', 'room_id', 'class_id', 'staff_id', 'examtype_id', 'news_event',
    ];

    public function room(Type $var = null)
    {
        return $this->hasmany(room::class, 'id', 'room_id');
    }

    public function classes(Type $var = null)
    {
        return $this->hasmany(classes::class, 'id', 'class_id');
    }

    public function staff(Type $var = null)
    {
        return $this->hasmany(staff::class, 'id', 'staff_id');
    }

    public function examtype(Type $var = null)
    {
        return $this->hasmany(examtype::class, 'id', 'examtype_id');
    }
}
