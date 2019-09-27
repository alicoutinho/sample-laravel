<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{

    public function index()
    {
        $filters=Filter::paginate(10);
        return view('admin.filter.index',compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::get();
        $filters=Filter::where('parent_id',0)->get();
        return view('admin.filter.create',compact('cat','filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat_id=$request->get('cat_id');
        $names=$request->get('name');
        $types=$request->get('type');
        $en_names=$request->get('en_name');
        if(is_array($names)){
            foreach ($names as $key => $value){
                $en_name=array_key_exists($key,$en_names)?$en_names[$key]:'-';
                $type=array_key_exists($key,$types)?$types[$key]:1;
                Filter::create([
                    'cat_id' => $cat_id,
                    'name' => $value,
                    'en_name' => $en_name,
                    'type' =>  $type,
                    'parent_id' => 0
                ]);
            }
        }
    }

    public function show(Filter $filter)
    {
        //
    }

    public function edit(Filter $filter)
    {
        $cat=Category::get();
        $filters=Filter::where('parent_id',0)->get();
        return view('admin.filter.edit',compact('cat','filters','filter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filter $filter)
    {
        $data=$request->all();
        $filter->update($data);
        return redirect(route('filter.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filter $filter)
    {
        $filter->delete();
        return redirect(route('filter.index'));
    }
}
