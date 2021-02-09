<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = "user";
    protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
        'id', 'username', 'password', 'status', 'image'
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ]; 
    
    
    public function lecturer()
    {
        return $this->hasone(lecturer::class, 'id', 'id');
    }

    public function staff()
    {
        return $this->hasone(staff::class, 'id', 'id');
    }

    public function student()
    {
        return $this->hasone(student::class, 'id', 'id');
    }
    
    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }

    public function FileNameimage()
    {
        $id = $this->id ? $this->id : "not-found";
        return uniqid("image-user-".$id."-");
    }

    public function getImage()
    {
        
        $patlink = rtrim(app()->basePath('public/storage'), '/');
        if($this->image && is_dir($patlink) && Storage::disk('public')->exists($this->image)){
            return url("/storage/".$this->image);
            // return config('app.url')."/storage/".$this->avatar;
        }
        return "https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=".urlencode($this->name);
        
    }
}
