<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['name','title'];
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function permissions(){
         $this->belongsToMany(Permission::class);
    }
}
