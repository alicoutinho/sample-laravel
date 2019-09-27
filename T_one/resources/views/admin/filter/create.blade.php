@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
افزودن فیلتر  جدید

        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post"  action="{{route('filter.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">دسته بندی</label>
                    <div class="col-sm-10">
                        <select name="cat_id" class="form-control input-lg m-bot15">
                            @foreach($cat as $val)
                                <option value="{{ $val->id }}">{{ $val->title_fa }}</option>
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
                                <option value="{{ $val->id }}">{{ $catt->title }}::{{ $val->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        <span class="btn btn-danger" onclick="addfilter()">افزودن فیلتر</span>
                    </label>
                    <div class="col-sm-10" id="filter_add">

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
@section('script')
    <script type="text/javascript">
        function addfilter() {
            var count=document.getElementsByClassName('d1').length+1 ;
            var txt='<div class="form-group" class="d1">'+
                '<input type="text" name="name['+count+']" placeholder="نام فیلتر">'+
                '<input type="text" name="en_name['+count+']" placeholder="نام انگلیسی فیلتر">'+
                '<select name="type['+count+']" >'+
                '<option value="1">دکمه رادیویی</option>'+
                '<option value="0">دکمه انتخاب رنگ</option>'+
                '</select>'
                '</div>';
            $('#filter_add').append(txt);
        }

    </script>
@endsection