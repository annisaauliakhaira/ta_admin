<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presence extends Model
{
    protected $table="presence";

    protected $fillable = [
        'id', 'status', 'news_event', 'krs_id', 'schedule_id',
    ];

    public function krs(Type $var = null)
    {
        return $this->hasmany(krs::class, 'id', 'krs_id');
    }


    public function schedule(Type $var = null)
    {
        return $this->hasmany(schedule::class, 'id', 'schedule_id');
    }
}
