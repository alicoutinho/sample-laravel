<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles(){
        $this->belongsToMany(Role::class);
    }
    public function hasRole($role){
        if(is_string($role)){
            return $this->roles->contains('name',$role);
        }else{
            return false;
        }
//        foreach ($role as $roll){
//            if($this->hasRole($r->name)){
//                return true;
//            }
//        }
//        return false;
       // return !! $role->intersect($this->roles)->count();
    }
}
