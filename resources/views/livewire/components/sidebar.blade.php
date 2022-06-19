<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item"><a href="#"><i class="las la-user-graduate"></i>
                <span class="menu-title" data-i18n="nav.dash.main">الطلاب </span>
                <span
                    class="badge badge badge-info badge-pill float-right mr-2"></span>
            </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.show-student')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.add-student')}}" data-i18n="nav.dash.crypto">إضافة
                        طالب جديد </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href="#"><i class="la la-group"></i>
                <span class="menu-title" data-i18n="nav.dash.main">المشرفين </span>
                <span
                    class="badge badge badge-danger badge-pill float-right mr-2"></span>
            </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.show-supervisor')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.add-supervisor')}}" data-i18n="nav.dash.crypto">إضافة
                        مشرف </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#"><i class="las la-cubes"></i>
                <span class="menu-title" data-i18n="nav.dash.main">التخصصات  </span>
                <span
                    class="badge badge badge-warning  badge-pill float-right mr-2"></span>
            </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.show-subject-category')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.add-subject-category')}}" data-i18n="nav.dash.crypto">أضافة
                        تخصص </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#"><i class="las la-school"></i>
                <span class="menu-title" data-i18n="nav.dash.main">المواد  </span>
                <span
                    class="badge badge badge-success badge-pill float-right mr-2"></span>
            </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.show-subject')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.add-subject')}}" data-i18n="nav.dash.crypto">إضافة
                        مادة </a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="{{route('admin.CurrentSemester')}}"><i class="las la-sort-numeric-up-alt"></i><span
                class="menu-title" data-i18n="">اضافة النقاط</span></a>
            </li>

            <li class=" nav-item"><a href="{{route('admin.settings')}}"><i class="las la-cog"></i><span
                class="menu-title" data-i18n="">الإعدادات</span></a>
            </li>


        </ul>
    </div>
</div>



