@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h1>
                لیست نقش های وب سایت
            </h1>

        </header>
        <table class="table table-striped table-advance table-hover">
            <thead>
            <tr>
                <th><i class="icon-bullhorn"></i>نام </th>
                <th class="hidden-phone"><i class="icon-question-sign"></i>عنوان</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td><a href="#">{{$role->name}}</a></td>
                    <td class="hidden-phone">{{ $role->title }}</td>
                    <td>
                        <a href="{{route('role.edit',['id'=>$role->id])}}" class="btn btn-success btn-xs">ویرایش</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('role.destroy',['id'=>$role->id])}}">
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
        {{ $roles->links() }}
    </div>
@endsection