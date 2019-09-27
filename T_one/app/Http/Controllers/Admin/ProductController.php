<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ProductController extends AdminController
{

    public function index()
    {
        $products=Product::paginate(6);
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $cats=Category::where('chid','!=','0')->get();
        return view('admin.product.create',compact('cats'));
    }

    public function store(Request $request)
    {
       $file=$request['image'];
       $img=$this->ImageUploader($file);
       $user_id=auth()->user()->id;
       Product::create([
           'name' =>$request['name'],
           'brand' =>$request['brand'],
           'price' =>$request['price'],
           'discount' =>$request['discount'],
           'body' =>$request['body'],
           'image' =>$img,
           'status'=>$request['status'],
           'user_id'=>$user_id,
           'category_id'=>$request['cat'],
           'count'=>$request['count']
       ]);
       return redirect(route('product.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        //if(Gate::allows('edit_product',$product)) {
        if(auth()->user()->can('view',$product)){
           return view('admin.product.edit', compact('product'));
    }else{
        return "<h1>شما اجازه دسترسی به این بخش را ندارید</h1>";
    }

    }

    public function update(Request $request, Product $product)
    {
        $data=$request->all();
        $product->update($data);
        return redirect(route('product.index'));
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'));
    }
    public function gallery(Request $request){
        $id=$request->get('id');
        $product=Product::findOrFail($id);
        return view('admin.product.gallery',compact('product'));
    }
    public function upload(Request $request){
        $id=$request->get('id');
        $files=$request->file('file');
        $name=rand()."-".$id."-".$files->getClientOriginalName();
        if($files->move('uploads/gallery',$name)){
            ProductImage::create([
                'product_id' => $id,
                'url' =>$name
            ]);
        }

    }
}
