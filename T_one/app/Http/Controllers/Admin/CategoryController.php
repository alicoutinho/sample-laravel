<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends AdminController
{

    public function index(Request $request)
    {
        $category=Category::search($request->all());
        return view('admin.category.index',compact('category'));
    }
    public function create()
    {
        $cat=Category::where('chid',0)->get();
        return view('admin.category.create',compact('cat'));
    }

    public function store(Request $request)
    {
        $file=$request['image'];
        $img=$this->ImageUploader1($file,'/uploads/cat/');
        Category::create([
            'title' =>$request['title'],
            'title_fa' =>$request['title_fa'],
            'image' =>$img,
            'chid' =>$request['chid']
        ]);
        return redirect(route('category.index'));
    }
    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data=$request->all();
        $category->update($data);
        return redirect(route('category.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'));
    }
}
