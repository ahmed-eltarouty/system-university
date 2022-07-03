<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                    class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand"
                        @if(Auth::guard('admin')->check())
                            href="{{route('admin.dashboard')}}"
                        @elseif(Auth::guard('web')->check())
                            href="{{route('user.dashboard')}}"
                        @endif
                    >
                        <img class="brand-logo" alt="modern admin logo"
                             src="{{asset('admin/images/logo/logo.png')}}">
                        <h3 class="brand-text">University System</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                        class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                        class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right mx-5">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">مرحبا
                  <span
                      class="user-name text-bold-700"> {{ Auth::user()->name }}</span>
                </span>
                            <span class="avatar avatar-online">
                  <img  style="height: 35px;" src="{{asset('admin/images/logo/logo-80x80.png')}}" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href=""><i class="ft-power"></i>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-outline-danger" type="submit">تسجيل الخروج</button>
                                </form>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">
                                @if(Auth::guard('web')->check())
                                    {{$noti = Auth::user()->notifications->count()}}
                                @endif
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">الإشعارات</span>
                                </h6>
                            </li>
                            @if(Auth::guard('web')->check())
                                @isset($noti)
                                    @foreach(Auth::user()->notifications()->orderBy('id','desc')->take(5)->get() as $notification)
                                <li class="scrollable-container media-list w-100">
                                    <a href="{{route('user.notifications')}}">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading {{$notification->status ? 'text-danger' : 'text-primary'}}">{{$notification->status ? 'تحذير' : 'اشعار'}}</h6>
                                                <p class="notification-text font-small-3 text-muted">
                                                    {{$notification->content}}
                                                </p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">{{ $notification->created_at->diffForHumans(); }}
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                    @endforeach
                                @endisset
                            @endif
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                                href="{{route('user.notifications')}}">إقرأ كل الإشعارات</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
