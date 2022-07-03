<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item  {{Route::currentRouteName() == 'user.dashboard' ? 'active' : '' }}"><a href="{{route('user.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item  {{Route::currentRouteName() == 'user.edit' ? 'active' : '' }}">
                <a href="{{route('user.edit')}}"><i class="las la-user-graduate"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">تعديل بيناتى </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>

            </li>


            <li class="nav-item  {{Route::currentRouteName() == 'user.add-semester' ? 'active' : '' }}">
                <a href="{{route('user.add-semester')}}">
                    <i class="las la-school"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المواد الدراسية  </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2"></span>
                </a>
            </li>


        </ul>
    </div>
</div>



