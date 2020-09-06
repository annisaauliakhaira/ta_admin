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

    public function period(Type $var = null)
    {
        return $this->hasmany(period::class, 'id', 'period_id');
    }
}
