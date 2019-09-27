@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h1>
                لیست اسلایدهای وب سایت
            </h1>
        </header>
        <table class="table table-striped table-advance table-hover">
            <thead>
            <tr>
                <th> ردیف </th>
                <th><i class="icon-picture"></i>تصویر</th>
                <th><i class="icon-bullhorn"></i>عنوان </th>
                <th class="hidden-phone"><i class="icon-question-sign"></i>آدرس</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($slider as $val)
                <tr>
                    <td>{{ $val->id }}</td>
                    <td><img src='{{ $val->image }}' width='40' /> </td>
                    <td><a href="#">{{$val->title}}</a></td>
                    <td class="hidden-phone">{{ $val->url}}</td>
                    <td>
                        <a href="{{route('slider.edit',['id'=>$val->id])}}" class="btn btn-success btn-xs">ویرایش</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('slider.destroy',['id'=>$val->id])}}">
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
        {{ $slider->links() }}
    </div>
@endsection