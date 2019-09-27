<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public  function ImageUploader($file){
        $filename=time()."-".$file->getClientOriginalName();
        $path=public_path("/uploads/");
        $files=$file->move($path,$filename);
        $img=Image::make($files->getRealPath());
        $img->resize(200,200);
        $img->save($path."small-".$filename);
        return "/uploads/".$filename;
    }
    public  function ImageUploader1($file,$paths){
        $filename=time()."-".$file->getClientOriginalName();
        $path=public_path($paths);
        $files=$file->move($path,$filename);
        $img=Image::make($files->getRealPath());
        $img->resize(200,200);
        $img->save($path."small-".$filename);
        return $paths.$filename;
    }
}
