<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::latest()->paginate(5);
        return view('admin.role.index' ,compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::get();
        return view('admin.role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $role=Role::create([
          'name'  =>$request['name'],
         'title'  => $request['title'],
        ]);
        $role->permissions()->sync($request->input('permission_id'));
        return redirect(route('role.index'));
    }


    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit',compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data=$request->all();
        $role->update($data);
        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('role.index'));
    }
}
