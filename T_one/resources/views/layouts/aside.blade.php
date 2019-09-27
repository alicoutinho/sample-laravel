<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{ route('home') }}">
                    <i class="icon-dashboard"></i>
                    <span>صفحه اصلی</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span> مدیریت محصولات </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('product.index') }}">لیست محصولات</a></li>
                    <li><a class="" href="{{ route('product.create') }}">افزودن محصول جدید </a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span> مدیریت کاربران </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    @can('edit_user')
                    <li><a class="" href="{{ route('user.index') }}">لیست کاربران</a></li>
                    @endcan
                        <li><a class="" href="{{ route('user.create') }}">افزودن کاربر جدید </a></li>
                     {{--//////////// Roles///////////////////////////////--}}
                    <li><a class="" href="{{ route('role.index') }}">لیست نقش ها</a></li>
                    <li><a class="" href="{{ route('role.create') }}">افزودن نقش جدید </a></li>
                    {{--/////////////////Permission////////////////////////////--}}
                    <li><a class="" href="{{ route('permission.index') }}">لیست دسترسی ها</a></li>
                    <li><a class="" href="{{ route('permission.create') }}">افزودن دسترسی جدید </a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span> مدیریت اسلاید </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('slider.index') }}">لیست اسلاید ها</a></li>
                    <li><a class="" href="{{ route('slider.create') }}">افزودن اسلاید جدید </a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span> مدیریت فیلترها </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('filter.index') }}">لیست فیلتر ها</a></li>
                    <li><a class="" href="{{ route('filter.create') }}">افزودن فیلتر جدید </a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->