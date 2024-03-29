@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
افزودن دسته بندی  جدید

        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" action="{{route('category.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">نام </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">عنوان فارسی</label>
                    <div class="col-sm-10">
                        <input type="text" name="title_fa" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">سرگروه</label>
                    <div class="col-sm-10">
                        <select name="chid" class="form-control input-lg m-bot15">
                                <option value="0">سرگروه</option>
                            @foreach($cat as $val)
                                <option value="{{ $val->id }}">{{ $val->title_fa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">تصویر</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control round-input">
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