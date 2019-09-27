<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['title','title_fa','image','chid'];
    public static function search($data){
        $category=Category::orderBy('id','DESC');
        if(sizeof($data)>0 && array_key_exists('title',$data)){
            $category=$category->where('title_fa','like','%'.$data['title'].'%');
        }
        $category=$category->paginate(8);
        return $category;
    }
    public function product(){
       return  $this->hasMany(Product::class);
    }
}
