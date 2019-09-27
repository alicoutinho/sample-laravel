@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
        ویرایش فیلتر

        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" action="{{route('filter.update',['id'=>$filter->id])}}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">دسته بندی</label>
                    <div class="col-sm-10">
                        <select name="cat_id" class="form-control input-lg m-bot15">
                            @foreach($cat as $val)
                                <option value="{{ $val->id }}" <?php if($val->id==$filter->cat_id){echo 'selected';}?>>{{ $val->title_fa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">فیلتر والد</label>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control input-lg m-bot15">
                            <option value="0" >سرگروه</option>
                            @foreach($filters as $val)
                                <?php $catt=\App\Category::where('id',$val->cat_id)->first()?>
                                <option value="{{ $val->id }}"<?php if($val->id==$val->parent_id){echo 'selected';}?>>{{ $catt->title }}::{{ $val->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group" class="d1">'+
                    <input value="{{$filter->name}}" type="text" name="name" placeholder="نام فیلتر">
                    <input value="{{$filter->en_name}}" type="text" name="en_name" placeholder="نام انگلیسی فیلتر">
                    <select name="type" >
                        <option value="1" <?php if($filter->type==1){echo "selected";}?>>دکمه رادیویی</option>
                        <option value="0"<?php if($filter->type==0){echo "selected";}?>>دکمه انتخاب رنگ</option>
                        </select>
                    </div>;
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-danger" type="submit">Save</button>
                    <button class="btn btn-default" type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection