<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class presence extends Model
{
    protected $table="presence";
    protected $primaryKey = ['class_id','student_id', 'examtype_id'];
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'class_id','student_id', 'examtype_id', 'status', 'code','presence_time_start', 'presence_time_end'
    ];

    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }


    public function krs()
    {
        $student_id=$this->student_id;
        return $this->hasone(krs::class, 'class_id', 'class_id')->where('student_id', $student_id);
    }

    public function schedule()
    {
        $examtype_id=$this->examtype_id;
        return $this->hasone(exam_schedule::class, 'class_id', 'class_id')->where('examtype_id', $examtype_id);
    }

    public function student()
    {
        return $this->hasOne(student::class, 'id', 'student_id');
    }
}
