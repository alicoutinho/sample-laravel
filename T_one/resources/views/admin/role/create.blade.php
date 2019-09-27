@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
افزودن نقش جدید

        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post"  action="{{route('role.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">نام </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">عنوان نقش</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">سطح دسترسی ها</label>
                    <select name="permission_id[]" multiple style="margin-right: 200px;">
                        @foreach($permissions as $permission)
                            <option value="{{$permission->id }}">{{ $permission->name }}</option>
                         @endforeach
                    </select>
                </div>
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-danger" type="submit">Save</button>
                    <button class="btn btn-default" type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection