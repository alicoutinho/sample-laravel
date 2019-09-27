@extends('layouts.admin')
@section('script')
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endsection
@section('content')
    <section class="panel">
        <header class="panel-heading">
           گالری تصاویر {{ $product->name }}

        </header>
        <div class="panel-body">
            <div class="form-group">
                <label class="label">گالری تصاویر</label>
                <form action="/admin/product/upload?id={{$product->id}}" method="post" class="dropzone">
                    {{csrf_field()}}
                  <input type="file" name="file" style="display: none" multiple/>
            </form>
            </div>
        </div>
    </section>
@endsection