<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presence extends Model
{
    protected $table="presence";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'status', 'news_event', 'krs_id', 'schedule_id',
    ];

    public function krss(Type $var = null)
    {
        return $this->hasmany(krs::class, 'id', 'krs_id');
    }

    public function krs(Type $var = null)
    {
        return $this->hasone(krs::class, 'id', 'krs_id');
    }

    public function schedules(Type $var = null)
    {
        return $this->hasmany(schedule::class, 'id', 'schedule_id');
    }

    public function schedule(Type $var = null)
    {
        return $this->hasone(schedule::class, 'id', 'schedule_id');
    }
}
