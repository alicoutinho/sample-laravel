@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            افزودن کاربر جدید
        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post"  action="{{route('user.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">نام </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ایمیل</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">رمز</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">سطح دسترسی</label>
                    <div class="col-sm-10">
                        <select name="roles_id[]" id="" multiple>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->title}}</option>
                            @endforeach
                        </select>
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