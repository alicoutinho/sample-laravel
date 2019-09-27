@extends('layouts.default')
@section('main')
    <div id="content" class="col-sm-12">
        <h1 class="title">سبد خرید</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td class="text-center">تصویر</td>
                    <td class="text-left">نام محصول</td>
                    <td class="text-left">تعداد</td>
                    <td class="text-right">قیمت واحد</td>
                    <td class="text-right">کل</td>
                </tr>
                </thead>
                <tbody>
                @foreach($baskets as $basket)
                <tr>
                    <td class="text-center"><a href="product.html"><img  width="80" src="{{$basket->product->image}}" alt="تبلت ایسر" title="تبلت ایسر" class="img-thumbnail"></a></td>
                    <td class="text-left"><a href="product.html">{{$basket->product->name}}</a><br>
                        <small>امتیازات خرید: 1000</small></td>
                    <td class="text-left"><div class="input-group btn-block quantity">
                            <input type="text" name="quantity" value="{{$basket->count}}" size="1" class="form-control">
                            <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="بروزرسانی"><i class="fa fa-refresh"></i></button>
                        <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="" data-original-title="حذف"><i class="fa fa-times-circle"></i></button>
                        </span></div></td>
                    <td class="text-right">{{$basket->price}} تومان</td>
                    <td class="text-right">98000 تومان</td>
                </tr>
               @endforeach
                </tbody>
            </table>
        </div>
        <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
        <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                    </div>
                    <div id="collapse-coupon" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>
                            <div class="input-group">
                                <input type="text" name="coupon" value="" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control">
                                <span class="input-group-btn">
                      <input type="button" value="اعمال کد تخفیف" id="button-coupon" data-loading-text="بارگذاری ..." class="btn btn-primary">
                      </span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">استفاده از کارت هدیه</h4>
                    </div>
                    <div id="collapse-voucher" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <label class="col-sm-4 control-label" for="input-voucher">کد کارت هدیه را در اینجا وارد کنید</label>
                            <div class="input-group">
                                <input type="text" name="voucher" value="" placeholder="کد کارت هدیه را در اینجا وارد کنید" id="input-voucher" class="form-control">
                                <span class="input-group-btn">
                      <input type="submit" value="اعمال کارت هدیه" id="button-voucher" data-loading-text="بارگذاری ..." class="btn btn-primary">
                      </span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">پیش بینی هزینه ی حمل و نقل و مالیات</h4>
            </div>
            <div id="collapse-shipping" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p>مقصد خود را جهت براورد هزینه ی ارسال وارد کنید.</p>
                    <form class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-country">کشور</label>
                            <div class="col-sm-10">
                                <select name="country_id" id="input-country" class="form-control">
                                    <option value=""> --- لطفا انتخاب کنید --- </option>
                                    <option value="244">Aaland Islands</option>
                                    <option value="1">Afghanistan</option>
                                    <option value="2">Albania</option>
                                    <option value="3">Algeria</option>
                                    <option value="4">American Samoa</option>
                                    <option value="5">Andorra</option>
                                    <option value="6">Angola</option>
                                    <option value="7">Anguilla</option>
                                    <option value="8">Antarctica</option>
                                    <option value="9">Antigua and Barbuda</option>
                                    <option value="10">Argentina</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-postcode">کد پستی</label>
                            <div class="col-sm-10">
                                <input type="text" name="postcode" value="" placeholder="کد پستی" id="input-postcode" class="form-control">
                            </div>
                        </div>
                        <input type="button" value="دریافت پیش فاکتور" id="button-quote" data-loading-text="بارگذاری ..." class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
                <table class="table table-bordered">
                    <tbody><tr>
                        <td class="text-right"><strong>جمع کل:</strong></td>
                        <td class="text-right">132000 تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>کسر هدیه:</strong></td>
                        <td class="text-right">4000 تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>مالیات:</strong></td>
                        <td class="text-right">11880 تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>قابل پرداخت :</strong></td>
                        <td class="text-right">139880 تومان</td>
                    </tr>
                    </tbody></table>
            </div>
        </div>
        <div class="buttons">
            <div class="pull-left"><a href="index.html" class="btn btn-default">ادامه خرید</a></div>
            <div class="pull-right"><a href="checkout.html" class="btn btn-primary">تسویه حساب</a></div>
        </div>
    </div>
@endsection