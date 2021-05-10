<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ config('app.url') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('storage/common/images/favicon.png') }}" rel="shortcut icon"/>
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>--}}
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>

    {{--@yield('extra-css')--}}
</head>
<body>
<div id="app">
    <div class="container-scroller">
        {{-- Nav --}}
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

                <a class="navbar-brand brand-logo" href="{{ url('/home') }}">
                    <img src="{{ asset('images/wacha.jpg') }}" alt="logo" width="400px;" height="70px;"/>
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
                    ufza
                    {{--<img src="{{ asset('images/logo-mini.svg') }}" alt="logo"/>--}}
                </a>
                {{--<a class="navbar-brand brand-logo" href="{{ route('home') }}">--}}
                {{--<img src="{{ asset('storage/common/images/logo.svg') }}" alt="logo"/>--}}
                {{--</a>--}}
                {{--<a class="navbar-brand brand-logo-mini" href="{{ route('home') }}">--}}
                {{--<img src="{{ asset('storage/common/images/logo-mini.svg') }}" alt="logo"/>--}}
                {{--</a>--}}
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                {{--<div class="search-field d-none d-md-block">--}}
                {{--<form class="d-flex align-items-center h-100" action="#">--}}
                {{--<div class="input-group">--}}
                {{--<div class="input-group-prepend bg-transparent">--}}
                {{--<i class="input-group-text border-0 mdi mdi-magnify"></i>--}}
                {{--</div>--}}
                {{--<input type="text" class="form-control bg-transparent border-0"--}}
                {{--placeholder="Search application...">--}}
                {{--</div>--}}
                {{--</form>--}}
                {{--</div>--}}
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                           data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-email-outline"></i>
                            <span class="count-symbol bg-warning"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                             aria-labelledby="messageDropdown">
                            <h6 class="p-3 mb-0">Messages</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="{{ asset('images/faces/face4.jpg') }}" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a
                                        message</h6>
                                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="{{ asset('images/faces/face2.jpg') }}" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a
                                        message</h6>
                                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="{{ asset('images/faces/face3.jpg') }}" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture
                                        updated</h6>
                                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                           data-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="count-symbol bg-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                             aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0">Notifications</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-calendar"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event
                                        today </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="mdi mdi-settings"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="mdi mdi-link-variant"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                           aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{ asset('images/faces/face1.jpg') }}" alt="image">
                                {{--<img src="{{ asset('storage/common/images/face.jpg') }}" alt="image">--}}
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('users.profile.index', Auth::user()->id) }}">
                                <i class="mdi mdi-bookmark-outline mr-2 text-success"></i>{{ __('Profile') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout mr-2 text-primary"></i>{{ __('Sign Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            {{-- Sidebar --}}
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{ asset('images/faces/face1.jpg') }}" alt="profile">
                                {{--<img src="{{ asset('storage/common/images/face.jpg') }}" alt="profile">--}}
                                <span class="login-status online"></span>
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{  Auth::user()->name }}</span>
                                <span class="text-secondary text-small">{{ Auth::user()->getRoleNames()->implode(', ') }}</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    @can('viewAny', \App\Models\Application::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('applications.index') }}">
                                <span class="menu-title">Applications</span>
                                <i class="mdi mdi-view-list menu-icon"></i>
                            </a>
                        </li>
                    @endcan
                    @can('viewAny', \App\Models\Leave::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('leaves.index') }}">
                                <span class="menu-title">Leave Roaster</span>
                                <i class="mdi mdi-contacts menu-icon"></i>
                            </a>
                        </li>
                    @endcan
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">--}}
                    {{--<span class="menu-title">Leave Type</span>--}}
                    {{--<i class="mdi mdi-format-list-bulleted menu-icon"></i>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#app-reports" aria-expanded="true"
                           aria-controls="app-reports">
                            <span class="menu-title">Reports</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-receipt menu-icon"></i>
                        </a>
                        <div class="collapse" id="app-reports" style="">
                            <ul class="nav flex-column sub-menu">
                                @can('viewAny', \App\Models\Permission::class)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('reports.roaster.index') }}">User Roaster</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#app-settings" aria-expanded="true"
                           aria-controls="app-settings">
                            <span class="menu-title">Settings</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-settings menu-icon"></i>
                        </a>
                        <div class="collapse" id="app-settings" style="">
                            <ul class="nav flex-column sub-menu">
                                @can('viewAny', \App\Models\Permission::class)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('permissions.index') }}">Permissions</a>
                                    </li>
                                @endcan
                                @can('viewAny', \App\Models\Role::class)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                                    </li>
                                @endcan
                                @can('viewAny', \App\Models\User::class)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            {{-- Content --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                {{-- Footer --}}
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                                    Copyright &copy; {{ date('Y')}} <a href="#" target="_blank">Wizzta, Inc.</a> All rights reserved.
                                </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                                    Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
                                </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    var app = '{{ config('app.url') }}';

    window.$.ajaxSetup({
        headers: {
            'Accept': 'application/json',
            // 'Authorization': 'Bearer {{ session('api_token') }}',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('div.alert').not('.alert-danger, .alert-important').delay(5000).fadeOut(500);

    var modal = $('.modal');

    modal.on('shown.bs.modal', function () {
        $(this).find('[autofocus]').focus();
    });

    modal.on('hidden.bs.modal', function () {
        // Source: https://stackoverflow.com/a/35079811
        // $(this).find('form').trigger('reset');
        $(this).find('form')[0].reset();
    });
</script>

@stack('extra-js')
</body>
</html>
