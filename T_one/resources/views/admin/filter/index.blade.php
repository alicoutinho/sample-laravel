@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h1>
                لیست فیلتر های وب سایت
            </h1>

        </header>
        <div class="col-10 align-content-center">
            <form  action="">
                <input type="text" name="title" placeholder="عنوان دسته بندی">
                <input type="submit"class="btn btn-primary btn-sm" value="جست و جو">
            </form>
        </div>
        <table class="table table-striped table-advance table-hover">
            <thead>
            <tr>
                <th> ردیف </th>
                <th><i class="icon-picture"></i>نام</th>
                <th><i class="icon-bullhorn"></i>نام انگلیسی</th>
                <th class="hidden-phone"><i class="icon-question-sign"></i>دسته بندی</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($filters as $val)
                <tr>
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->name }} </td>
                    <td><a href="#">{{$val->en_name}}</a></td>
                    <td class="hidden-phone"><?php $cat=\App\Category::where('id',$val->cat_id)->first()?>{{ $cat->title_fa}}</td>
                    <td>
                        <a href="{{route('filter.edit',['id'=>$val->id])}}" class="btn btn-success btn-xs">ویرایش</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('filter.destroy',['id'=>$val->id])}}">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                        <button class="btn btn-danger btn-xs">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
    <div class="text-center">
        {{ $filters->links() }}
    </div>
@endsection