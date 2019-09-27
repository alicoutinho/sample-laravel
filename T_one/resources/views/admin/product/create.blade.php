@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
افزودن محصول جدید

        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" action="{{route('product.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">نام محصول</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">برند</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="brand" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">دسته بندی</label>
                    <div class="col-sm-10">
                        <select name="cat" class="form-control input-lg m-bot15">
                            @foreach($cats as $val)
                                <option value="{{ $val->id }}">{{ $val->title_fa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">تعداد</label>
                    <div class="col-sm-10">
                        <input type="text" name="count" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">وضعیت</label>
                    <div class="col-sm-10">
                        <input type="radio" name="status"  value="1" checked>موجود
                        <input type="radio" name="status"  value="0">ناموجود
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">تصویر</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control round-input">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">قیمت</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">توضیحات محصول</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="" cols="80" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">تخفیف</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="discount" >
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