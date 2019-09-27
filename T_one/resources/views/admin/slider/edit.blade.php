@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
        ویرایش دسته بندی

        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" action="{{route('slider.update',['id'=>$slider->id])}}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">عنوان </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ادرس</label>
                    <div class="col-sm-10">
                        <input type="text" name="url" class="form-control" value="{{ $slider->url }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">تصویر</label>
                    <img src="{{ $slider->image }}" height="100">
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-danger" type="submit">Save</button>
                    <button class="btn btn-default" type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection