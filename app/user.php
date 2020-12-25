<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = "user";
    protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
        'id', 'username', 'password', 'status'
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ]; 
    
    
    public function lecturer(Type $var = null)
    {
        return $this->hasone(lecturer::class, 'id', 'id');
    }

    public function staff(Type $var = null)
    {
        return $this->hasone(staff::class, 'id', 'id');
    }

    public function student(Type $var = null)
    {
        return $this->hasone(student::class, 'id', 'id');
    }
    
    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }
}
