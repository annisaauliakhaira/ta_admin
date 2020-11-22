<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newsevent extends Model
{
    protected $table = "newsevent";
    public $incrementing=false;

    protected $fillable = [
        'id', 'newsevent', 'exam_id'
    ];

    public function examschedule()
    {
        return $this->hasone(user::class, 'id', 'exam_id');
    }
    public function examschedules()
    {
        return $this->hasMany(user::class, 'id', 'exam_id');
    }
}
