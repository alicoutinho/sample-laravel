<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'name' ,'brand','body','discount','price','image','status','category_id','count','user_id'
    ];
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function basket(){
        return $this->hasMany(Basket::class);
    }
}
