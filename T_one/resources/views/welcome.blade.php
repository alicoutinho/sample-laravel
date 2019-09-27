@extends('layouts.default')
@section('main')
    <!--Middle Part Start-->
    <div id="content" class="col-sm-9">
        <!-- Slideshow Start-->
        <div class="slideshow single-slider owl-carousel">
            @foreach($sliders as $slider)
            <div class="item"> <a href="{{$slider->url}}">
                <img class="img-responsive" src="{{$slider->image}}" alt="banner 1" />
            </a></div>
             @endforeach
        </div>
        <!-- Slideshow End-->
        <!-- Featured محصولات Start-->
        <h3 class="subtitle">ویژه</h3>
        <div class="owl-carousel product_carousel">
            @foreach($special as $p)
            <div class="product-thumb clearfix">
                <div class="image"><a href="product.html"><img src="{{$p->image}}" alt="کفش راحتی مردانه" title="کفش راحتی مردانه" class="img-responsive" /></a></div>
                <div class="caption">
                    <h4><a href="product.html">{{$p->name}}</a></h4>
                    <p class="price"> <span class="price-new">{{$p->price}}</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-25%</span> </p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                </div>
                <div class="button-group">
                    <button class="btn-primary add-to-cart" type="button" data-id="{{$p->id}}"><span>افزودن به سبد</span></button>
                    <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
                        <button type="button" data-toggle="tooltip" title="مقایسه this محصولات" onClick=""><i class="fa fa-exchange"></i></button>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
        <!-- Featured محصولات End-->
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.add-to-cart').on('click',function () {
                    var id=$(this).attr('data-id');
                    $.ajax({
                        url:'/product/store',
                        type:'post',
                        dataType:'json',
                        data:{id:id},
                        success:function (data) {
                            if(data.basket_create =='success'){
                                alert('محصول مورد نظر با موفقیت به سبد خرید افزوده شد')
                            }else if(data.count=='exceeded'){
                                alert('تعداد سفارش شده بیش از موجودی انبار می باشد')
                            }
                        }
                    })
                });

            });
        </script>

@endsection