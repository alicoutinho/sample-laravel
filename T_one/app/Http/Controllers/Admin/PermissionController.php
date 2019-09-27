<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=Permission::paginate(6);
        return view('admin.permission.index',compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        Permission::create([
            'name'=>$request['name'],
            'title'=>$request['title'],
        ]);
        return redirect(route('permission.index'));
    }

    public function show(Permission $permission)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('admin.product.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $data=$request->all();
        $permission->update($data);
        return redirect(route('permission.index'));
    }


    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect(route('permission.index'));
    }
}
