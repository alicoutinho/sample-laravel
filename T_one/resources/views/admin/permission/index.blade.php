@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h1>
                لیست سطوح دسترسی وب سایت
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
            @foreach($permissions as $permission)
                <tr>
                    <td><a href="#">{{$permission->name}}</a></td>
                    <td class="hidden-phone">{{ $permission->title }}</td>
                    <td>
                        <a href="{{route('permission.edit',['id'=>$permission->id])}}" class="btn btn-success btn-xs">ویرایش</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('permission.destroy',['id'=>$permission->id])}}">
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
        {{ $permissions->links() }}
    </div>
@endsection