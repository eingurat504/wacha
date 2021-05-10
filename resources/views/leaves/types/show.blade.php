<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
    <meta content="Spruko" name="author">

    <!-- Title -->
    <title>Ansta - Responsive Multipurpose Admin Dashboard Template</title>

    <!-- Favicon -->
    <link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Ansta CSS -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css">

    <!-- Data table css -->
    <link href="{{ asset('plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="{{ asset('plugins/customscroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    <!-- Sidemenu Css -->
    <link href="{{ asset('plugins/toggle-sidebar/css/sidemenu.css') }}" rel="stylesheet">

</head>
<body class="app sidebar-mini rtl" >
<div id="global-loader" ></div>
<div class="page">
    <div class="page-main">
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar ">
            <div class="sidebar-img">
                <a class="navbar-brand" href="index-2.html"><img alt="..." class="navbar-brand-img main-logo" src="{{ asset('img/brand/logo-dark.png') }}"> <img alt="..." class="navbar-brand-img logo" src="{{ asset('img/brand/logo.png') }}"></a>
                <ul class="side-menu">
                    <li class="slide">
                        <a class="side-menu__item active" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>

                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Apps</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="cards.html" class="slide-item">Cards</a>
                            </li>
                            <li>
                                <a href="dragable-cards.html" class="slide-item">Dragable Cards</a>
                            </li>
                            <li>
                                <a href="widgets.html" class="slide-item">Widgets</a>
                            </li>
                            <li>
                                <a href="full-calendar.html" class="slide-item">Full Calendar</a>
                            </li>
                            <li>
                                <a href="range-slider.html" class="slide-item">Range Slider</a>
                            </li>
                            <li>
                                <a href="scroll-bar.html" class="slide-item">Scroll Bar</a>
                            </li>
                            <li>
                                <a href="sweet-alerts.html" class="slide-item">Sweet Alerts</a>
                            </li>
                            <li>
                                <a href="timeline.html" class="slide-item">Timeline</a>
                            </li>
                            <li>
                                <a href="users.html" class="slide-item">Users</a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-edit"></i><span class="side-menu__label">Forms</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="forms.html" class="slide-item">Basic Forms</a>
                            </li>
                            <li>
                                <a href="form-select2.html" class="slide-item">Forms Select2</a>
                            </li>
                            <li>
                                <a href="file-uploads.html" class="slide-item">Forms Uploads</a>
                            </li>
                            <li>
                                <a href="form-wizard.html" class="slide-item">Form wizard</a>
                            </li>
                            <li>
                                <a href="datepicker.html" class="slide-item">Form Datepicker</a>
                            </li>
                            <li>
                                <a href="form-switches.html" class="slide-item">Form switches</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-map"></i><span class="side-menu__label">Maps</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="maps.html" class="slide-item">Google Maps</a>
                            </li>
                            <li>
                                <a href="vector-map.html" class="slide-item">Vector Map</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Tables</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="tables.html" class="slide-item">Tables</a>
                            </li>
                            <li>
                                <a href="datatable.html" class="slide-item">Data Tables</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-bar-chart-2"></i><span class="side-menu__label">Chart Types</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="chart-flot.html" class="slide-item">Flot Charts</a>
                            </li>
                            <li>
                                <a href="chart-high.html" class="slide-item">High Charts </a>
                            </li>
                            <li>
                                <a href="charts-chartjs.html" class="slide-item">Chartjs Charts</a>
                            </li>
                            <li>
                                <a href="charts-echarts.html" class="slide-item">Echart Charts</a>
                            </li>
                            <li>
                                <a href="charts-morris.html" class="slide-item">Morris Charts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="user-profile.html" class="slide-item">User Profile</a>
                            </li>
                            <li>
                                <a href="email-inbox.html" class="slide-item">Email Inbox</a>
                            </li>
                            <li>
                                <a href="email-compose.html" class="slide-item">Email</a>
                            </li>
                            <li>
                                <a href="gallery.html" class="slide-item">Gallery</a>
                            </li>
                            <li>
                                <a href="invoice.html" class="slide-item">Invoice</a>
                            </li>
                            <li>
                                <a href="pricing.html" class="slide-item">Pricing Tables</a>
                            </li>
                            <li>
                                <a href="empty.html" class="slide-item">Empty</a>
                            </li>
                            <li>
                                <a href="under-construction.html" class="slide-item">Under Construction</a>
                            </li>
                            <li>
                                <a href="400.html" class="slide-item">Page 400</a>
                            </li>
                            <li>
                                <a href="404.html" class="slide-item">Page 404</a>
                            </li>
                            <li>
                                <a href="500.html" class="slide-item">Page 500</a>
                            </li>
                            <li>
                                <a href="505.html" class="slide-item">Page 505</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-italic"></i><span class="side-menu__label">Icons</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="icons-feather.html" class="slide-item">Feather Icons</a>
                            </li>
                            <li>
                                <a href="icons-fontawesome.html" class="slide-item">Font Awesome Icons</a>
                            </li>
                            <li>
                                <a href="icons-ion.html" class="slide-item">Ion Icons</a>
                            </li>
                            <li>
                                <a href="icons-materialdesign.html" class="slide-item">Materialdesign Icons</a>
                            </li>
                            <li>
                                <a href="icons-nucleo.html" class="slide-item">Nucleo Icons</a>
                            </li>
                            <li>
                                <a href="icons-pe7.html" class="slide-item">pe7 Icons</a>
                            </li>
                            <li>
                                <a href="icons-simpleline.html" class="slide-item">Simpleline Icons</a>
                            </li>
                            <li>
                                <a href="icons-themify.html" class="slide-item">Themify Icons</a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Account</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="login.html" class="slide-item">Login</a>
                            </li>
                            <li>
                                <a href="register.html" class="slide-item">Register</a>
                            </li>
                            <li>
                                <a href="forgot.html" class="slide-item">Forgot password</a>
                            </li>
                            <li>
                                <a href="lockscreen.html" class="slide-item">Lock screen</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-shopping-cart"></i><span class="side-menu__label">Settings</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li>
                                <a href="shop.html" class="slide-item">Permissions</a>
                            </li>
                            <li>
                                <a href="cart.html" class="slide-item">Roles</a>
                            </li>
                            <li>
                                <a href="cart.html" class="slide-item">Users</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="side-menu__item" href="https://themeforest.net/user/sprukosoft/portfolio"><i class="side-menu__icon fa fa-question-circle"></i><span class="side-menu__label">Help & Support</span></a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Sidebar menu-->

        <!-- app-content-->
        <div class="app-content ">
            <div class="side-app">
                <div class="main-content">
                    <div class="p-2 d-block d-sm-none navbar-sm-search">
                        <!-- Form -->
                        <form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div><input class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Top navbar -->
                    <nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
                        <div class="container-fluid">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

                            <!-- Brand -->
                            <a class="navbar-brand pt-0 d-md-none" href="index-2.html">
                                <img src="{{ asset('img/brand/logo-light.png') }}" class="navbar-brand-img" alt="...">
                            </a>

                            <!-- User -->
                            <ul class="navbar-nav align-items-center ">
                                <li class="nav-item d-none d-md-flex">
                                    <div class="dropdown d-none d-md-flex mt-2 ">
                                        <a class="nav-link full-screen-link pl-0 pr-0"><i class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown d-none d-md-flex">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <i class="fe fe-user "></i>
                                        </div></a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
                                        <a class="dropdown-item d-flex" href="#">
                                            <span class="avatar brround mr-3 align-self-center"> <img src="assets/img/faces/male/4.jpg" alt="imag" ></span>
                                            <div>
                                                <strong>Madeleine Scott</strong> sent you friend request
                                                <div class=" mt-2 small text-muted">
                                                    <span class="btn btn-sm btn-primary">Conform</span>
                                                    <span class="btn btn-sm btn-outline-primary">Delete</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex" href="#">
                                            <span class="avatar brround mr-3 align-self-center"><img src="assets/img/faces/female/14.jpg" alt="imag" ></span>
                                            <div>
                                                <strong>rebica</strong> sent you friend request
                                                <div class=" mt-2 small text-muted">
                                                    <span class="btn btn-sm btn-primary">Conform</span>
                                                    <span class="btn btn-sm btn-outline-primary">Delete</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex" href="#">
                                            <span class="avatar brround mr-3 align-self-center"><img src="assets/img/faces/male/1.jpg" alt="imag"></span>
                                            <div>
                                                <strong>Devid robott</strong> sent you friend request
                                                <div class=" mt-2 small text-muted">
                                                    <span class="btn btn-sm btn-primary">Conform</span>
                                                    <span class="btn btn-sm btn-outline-primary">Delete</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-center text-muted-dark" href="#">View all Requestes</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown d-none d-md-flex">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <i class="fe fe-mail "></i>
                                        </div></a>
                                    <div class="dropdown-menu  dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
                                        <a href="#" class="dropdown-item text-center">12 New Messages</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item d-flex">
                                            <span class="avatar brround mr-3 align-self-center"><img src="assets/img/faces/male/41.jpg" alt="img"></span>
                                            <div>
                                                <strong>Madeleine</strong> Hey! there I' am available....
                                                <div class="small text-muted">3 hours ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex">
                                            <span class="avatar brround mr-3 align-self-center"><img src="assets/img/faces/female/1.jpg" alt="img" ></span>
                                            <div>
                                                <strong>Anthony</strong> New product Launching...
                                                <div class="small text-muted">5  hour ago</div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-center">See all Messages</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown d-none d-md-flex">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <i class="fe fe-bell f-30 "></i>
                                        </div></a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
                                        <a href="#" class="dropdown-item d-flex">
                                            <div>
                                                <strong>Someone likes our posts.</strong>
                                                <div class="small text-muted">3 hours ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex">
                                            <div>
                                                <strong> 3 New Comments</strong>
                                                <div class="small text-muted">5  hour ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex">
                                            <div>
                                                <strong> Server Rebooted.</strong>
                                                <div class="small text-muted">45 mintues ago</div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-center">View all Notification</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="{{ asset('img/faces/female/32.jpg') }}"></span>
                                            <div class="media-body ml-2 d-none d-lg-block">
                                                <span class="mb-0 ">Cori Stover</span>
                                            </div>
                                        </div></a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                        <div class=" dropdown-header noti-title">
                                            <h6 class="text-overflow m-0">Welcome!</h6>
                                        </div>
                                        <a class="dropdown-item" href="user-profile.html"><i class="ni ni-single-02"></i> <span>My profile</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-settings-gear-65"></i> <span>Settings</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-calendar-grid-58"></i> <span>Activity</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-support-16"></i> <span>Support</span></a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="login.html"><i class="ni ni-user-run"></i> <span>Logout</span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Top navbar-->

                    <!-- Page content -->
                    <div class="container-fluid pt-8">
                        <div class="page-header mt-0 shadow p-3">
                            <ol class="breadcrumb mb-sm-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Roles</li>
                            </ol>
                            <div class="btn-group mb-0">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+ Create</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h2 class="mb-0">Roles</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class="wd-15p">Last name</th>
                                                    <th class="wd-20p">Position</th>
                                                    <th class="wd-15p">Start date</th>
                                                    <th class="wd-10p">Salary</th>
                                                    <th class="wd-25p">E-mail</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Bella</td>
                                                    <td>Chloe</td>
                                                    <td>System Developer</td>
                                                    <td>2018/03/12</td>
                                                    <td>$654,765</td>
                                                    <td>b.Chloe@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Donna</td>
                                                    <td>Bond</td>
                                                    <td>Account Manager</td>
                                                    <td>2012/02/21</td>
                                                    <td>$543,654</td>
                                                    <td>d.bond@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Harry</td>
                                                    <td>Carr</td>
                                                    <td>Technical Manager</td>
                                                    <td>20011/02/87</td>
                                                    <td>$86,000</td>
                                                    <td>h.carr@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Lucas</td>
                                                    <td>Dyer</td>
                                                    <td>Javascript Developer</td>
                                                    <td>2014/08/23</td>
                                                    <td>$456,123</td>
                                                    <td>l.dyer@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Karen</td>
                                                    <td>Hill</td>
                                                    <td>Sales Manager</td>
                                                    <td>2010/7/14</td>
                                                    <td>$432,230</td>
                                                    <td>k.hill@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Dominic</td>
                                                    <td>Hudson</td>
                                                    <td>Sales Assistant</td>
                                                    <td>2015/10/16</td>
                                                    <td>$654,300</td>
                                                    <td>d.hudson@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Herrod</td>
                                                    <td>Chandler</td>
                                                    <td>Integration Specialist</td>
                                                    <td>2012/08/06</td>
                                                    <td>$137,500</td>
                                                    <td>h.chandler@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Jonathan</td>
                                                    <td>Ince</td>
                                                    <td>junior Manager</td>
                                                    <td>2012/11/23</td>
                                                    <td>$345,789</td>
                                                    <td>j.ince@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Leonard</td>
                                                    <td>Ellison</td>
                                                    <td>Junior Javascript Developer</td>
                                                    <td>2010/03/19</td>
                                                    <td>$205,500</td>
                                                    <td>l.ellison@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Madeleine</td>
                                                    <td>Lee</td>
                                                    <td>Software Developer</td>
                                                    <td>20015/8/23</td>
                                                    <td>$456,890</td>
                                                    <td>m.lee@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Karen</td>
                                                    <td>Miller</td>
                                                    <td>Office Director</td>
                                                    <td>2012/9/25</td>
                                                    <td>$87,654</td>
                                                    <td>k.miller@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Lisa</td>
                                                    <td>Smith</td>
                                                    <td>Support Lead</td>
                                                    <td>2011/05/21</td>
                                                    <td>$342,000</td>
                                                    <td>l.simth@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Morgan</td>
                                                    <td>Keith</td>
                                                    <td>Accountant</td>
                                                    <td>2012/11/27</td>
                                                    <td>$675,245</td>
                                                    <td>m.keith@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Nathan</td>
                                                    <td>Mills</td>
                                                    <td>Senior Marketing Designer</td>
                                                    <td>2014/10/8</td>
                                                    <td>$765,980</td>
                                                    <td>n.mills@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Ruth</td>
                                                    <td>May</td>
                                                    <td>office Manager</td>
                                                    <td>2010/03/17</td>
                                                    <td>$654,765</td>
                                                    <td>r.may@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Penelope</td>
                                                    <td>Ogden</td>
                                                    <td>Marketing Manager</td>
                                                    <td>2013/5/22</td>
                                                    <td>$345,510</td>
                                                    <td>p.ogden@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Sean</td>
                                                    <td>Piper</td>
                                                    <td>Financial Officer</td>
                                                    <td>2014/06/11</td>
                                                    <td>$725,000</td>
                                                    <td>s.piper@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Trevor</td>
                                                    <td>Ross</td>
                                                    <td>Systems Administrator</td>
                                                    <td>2011/05/23</td>
                                                    <td>$237,500</td>
                                                    <td>t.ross@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Vanessa</td>
                                                    <td>Robertson</td>
                                                    <td>Software Designer</td>
                                                    <td>2014/6/23</td>
                                                    <td>$765,654</td>
                                                    <td>v.robertson@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Una</td>
                                                    <td>Richard</td>
                                                    <td>Personnel Manager</td>
                                                    <td>2014/5/22</td>
                                                    <td>$765,290</td>
                                                    <td>u.richard@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Justin</td>
                                                    <td>Peters</td>
                                                    <td>Development lead</td>
                                                    <td>2013/10/23</td>
                                                    <td>$765,654</td>
                                                    <td>j.peters@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Adrian</td>
                                                    <td>Terry</td>
                                                    <td>Marketing Officer</td>
                                                    <td>2013/04/21</td>
                                                    <td>$543,769</td>
                                                    <td>a.terry@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Cameron</td>
                                                    <td>Watson</td>
                                                    <td>Sales Support</td>
                                                    <td>2013/9/7</td>
                                                    <td>$675,876</td>
                                                    <td>c.watson@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Evan</td>
                                                    <td>Terry</td>
                                                    <td>Sales Manager</td>
                                                    <td>2013/10/26</td>
                                                    <td>$66,340</td>
                                                    <td>d.terry@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Angelica</td>
                                                    <td>Ramos</td>
                                                    <td>Chief Executive Officer</td>
                                                    <td>20017/10/15</td>
                                                    <td>$6,234,000</td>
                                                    <td>a.ramos@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Connor</td>
                                                    <td>Johne</td>
                                                    <td>Web Developer</td>
                                                    <td>2011/1/25</td>
                                                    <td>$92,575</td>
                                                    <td>C.johne@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer</td>
                                                    <td>Chang</td>
                                                    <td>Regional Director</td>
                                                    <td>2012/17/11</td>
                                                    <td>$546,890</td>
                                                    <td>j.chang@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Brenden</td>
                                                    <td>Wagner</td>
                                                    <td>Software Engineer</td>
                                                    <td>2013/07/14</td>
                                                    <td>$206,850</td>
                                                    <td>b.wagner@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Fiona</td>
                                                    <td>Green</td>
                                                    <td>Chief Operating Officer</td>
                                                    <td>2015/06/23</td>
                                                    <td>$345,789</td>
                                                    <td>f.green@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Shou</td>
                                                    <td>Itou</td>
                                                    <td>Regional Marketing</td>
                                                    <td>2013/07/19</td>
                                                    <td>$335,300</td>
                                                    <td>s.itou@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Michelle</td>
                                                    <td>House</td>
                                                    <td>Integration Specialist</td>
                                                    <td>2016/07/18</td>
                                                    <td>$76,890</td>
                                                    <td>m.house@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Suki</td>
                                                    <td>Burks</td>
                                                    <td>Developer</td>
                                                    <td>2010/11/45</td>
                                                    <td>$678,890</td>
                                                    <td>s.burks@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Prescott</td>
                                                    <td>Bartlett</td>
                                                    <td>Technical Author</td>
                                                    <td>2014/12/25</td>
                                                    <td>$789,100</td>
                                                    <td>p.bartlett@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Gavin</td>
                                                    <td>Cortez</td>
                                                    <td>Team Leader</td>
                                                    <td>2015/1/19</td>
                                                    <td>$345,890</td>
                                                    <td>g.cortez@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Martena</td>
                                                    <td>Mccray</td>
                                                    <td>Post-Sales support</td>
                                                    <td>2011/03/09</td>
                                                    <td>$324,050</td>
                                                    <td>m.mccray@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Unity</td>
                                                    <td>Butler</td>
                                                    <td>Marketing Designer</td>
                                                    <td>2014/7/28</td>
                                                    <td>$34,983</td>
                                                    <td>u.butler@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Howard</td>
                                                    <td>Hatfield</td>
                                                    <td>Office Manager</td>
                                                    <td>2013/8/19</td>
                                                    <td>$98,000</td>
                                                    <td>h.hatfield@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Hope</td>
                                                    <td>Fuentes</td>
                                                    <td>Secretary</td>
                                                    <td>2015/07/28</td>
                                                    <td>$78,879</td>
                                                    <td>h.fuentes@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Vivian</td>
                                                    <td>Harrell</td>
                                                    <td>Financial Controller</td>
                                                    <td>2010/02/14</td>
                                                    <td>$452,500</td>
                                                    <td>v.harrell@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Timothy</td>
                                                    <td>Mooney</td>
                                                    <td>Office Manager</td>
                                                    <td>20016/12/11</td>
                                                    <td>$136,200</td>
                                                    <td>t.mooney@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Jackson</td>
                                                    <td>Bradshaw</td>
                                                    <td>Director</td>
                                                    <td>2011/09/26</td>
                                                    <td>$645,750</td>
                                                    <td>j.bradshaw@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Olivia</td>
                                                    <td>Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>2014/02/03</td>
                                                    <td>$234,500</td>
                                                    <td>o.liang@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Bruno</td>
                                                    <td>Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>2015/05/03</td>
                                                    <td>$163,500</td>
                                                    <td>b.nash@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Sakura</td>
                                                    <td>Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>2010/08/19</td>
                                                    <td>$139,575</td>
                                                    <td>s.yamamoto@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Thor</td>
                                                    <td>Walton</td>
                                                    <td>Developer</td>
                                                    <td>2012/08/11</td>
                                                    <td>$98,540</td>
                                                    <td>t.walton@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Finn</td>
                                                    <td>Camacho</td>
                                                    <td>Support Engineer</td>
                                                    <td>2016/07/07</td>
                                                    <td>$87,500</td>
                                                    <td>f.camacho@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Serge</td>
                                                    <td>Baldwin</td>
                                                    <td>Data Coordinator</td>
                                                    <td>2017/04/09</td>
                                                    <td>$138,575</td>
                                                    <td>s.baldwin@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Zenaida</td>
                                                    <td>Frank</td>
                                                    <td>Software Engineer</td>
                                                    <td>2018/01/04</td>
                                                    <td>$125,250</td>
                                                    <td>z.frank@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Zorita</td>
                                                    <td>Serrano</td>
                                                    <td>Software Engineer</td>
                                                    <td>2017/06/01</td>
                                                    <td>$115,000</td>
                                                    <td>z.serrano@datatables.net</td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer</td>
                                                    <td>Acosta</td>
                                                    <td>Junior Javascript Developer</td>
                                                    <td>2017/02/01</td>
                                                    <td>$75,650</td>
                                                    <td>j.acosta@datatables.net</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Footer -->
                        <footer class="footer">
                            <div class="row align-items-center justify-content-xl-between">
                                <div class="col-xl-6">
                                    <div class="copyright text-center text-xl-left text-muted">
                                        <p class="text-sm font-weight-500">Copyright 2018 © All Rights Reserved.Dashboard Template</p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <p class="float-right text-sm font-weight-500"><a href="www.templatespoint.net">Templates Point</a></p>
                                </div>
                            </div>
                        </footer>
                        <!-- Footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- Ansta Scripts -->
<!-- Core -->
<script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Optional JS -->
<script src="{{ asset('plugins/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('plugins/chart.js/dist/Chart.extension.js') }}"></script>

<!-- Data tables -->
<script src="{{ asset('plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>

<!-- Fullside-menu Js-->
<script src="{{ asset('plugins/toggle-sidebar/js/sidemenu.js') }}"></script>

<!-- Custom scroll bar Js-->
<script src="{{ asset('plugins/customscroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- Ansta JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script>
    $(function(e) {
        $('#example').DataTable();

        var table = $('#example1').DataTable();
        $('button').click( function() {
            var data = table.$('input, select').serialize();
            alert(
                "The following data would have been submitted to the server: \n\n"+
                data.substr( 0, 120 )+'...'
            );
            return false;
        });
        $('#example2').DataTable( {
            "scrollY":        "200px",
            "scrollCollapse": true,
            "paging":         false
        });
    } );

</script>
</body>


</html>