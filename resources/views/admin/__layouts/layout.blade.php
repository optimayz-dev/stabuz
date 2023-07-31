<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="{{ asset('/assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/assets/admin/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ asset('assets/admin/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">



    <!-- Custom styling plus plugins -->
    <link href="{{ asset('/assets/admin/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/admin/css/style.css') }}" rel="stylesheet">

    <title>Document</title>
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><img src="https://stab.uz/thumb/2/9mFw-kR9rAwCQaW95NHAvA/250c90/d/stabuz-logoendgreen.svg" alt="" style="width: 70%;"><!--<i class="fa fa-paw"></i> <span>Stab.uz</span>--></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li>
                                <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/admin/">Dashboard</a></li>
{{--                                    <li><a href="index2.html">Dashboard2</a></li>--}}
{{--                                    <li><a href="index3.html">Dashboard3</a></li>--}}
                                </ul>
                            </li>
                            <li>
                                <a><i class="fa fa-shopping-cart"></i> Ресурсы <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('admin.catalog.index') }}">Каталог</a></li>
                                    <li><a href="{{ route('admin.category.index') }}">Категории</a></li>
                                    <li><a href="{{ route('admin.subcategory.index') }}">Подкатегории</a></li>
                                    <li><a href="{{ route('admin.product.index') }}">Товары</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-star"></i> Бренды <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('admin.brand.index') }}">Бренды</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-file-text-o"></i> Заказы <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('admin.brand.index') }}">Заказы</a></li>
                                </ul>
                            </li>
{{--                            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>--}}
{{--                                <ul class="nav child_menu">--}}
{{--                                    <li><a href="tables.html">Tables</a></li>--}}
{{--                                    <li><a href="tables_dynamic.html">Table Dynamic</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>--}}
{{--                                <ul class="nav child_menu">--}}
{{--                                    <li><a href="chartjs.html">Chart JS</a></li>--}}
{{--                                    <li><a href="chartjs2.html">Chart JS2</a></li>--}}
{{--                                    <li><a href="morisjs.html">Moris JS</a></li>--}}
{{--                                    <li><a href="echarts.html">ECharts</a></li>--}}
{{--                                    <li><a href="other_charts.html">Other Charts</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>--}}
{{--                                <ul class="nav child_menu">--}}
{{--                                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>--}}
{{--                                    <li><a href="fixed_footer.html">Fixed Footer</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
{{--                    <div class="menu_section">--}}
{{--                        <h3>Live On</h3>--}}
{{--                        <ul class="nav side-menu">--}}
{{--                            <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>--}}
{{--                                <ul class="nav child_menu">--}}
{{--                                    <li><a href="e_commerce.html">E-commerce</a></li>--}}
{{--                                    <li><a href="projects.html">Projects</a></li>--}}
{{--                                    <li><a href="project_detail.html">Project Detail</a></li>--}}
{{--                                    <li><a href="contacts.html">Contacts</a></li>--}}
{{--                                    <li><a href="profile.html">Profile</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>--}}
{{--                                <ul class="nav child_menu">--}}
{{--                                    <li><a href="page_403.html">403 Error</a></li>--}}
{{--                                    <li><a href="page_404.html">404 Error</a></li>--}}
{{--                                    <li><a href="page_500.html">500 Error</a></li>--}}
{{--                                    <li><a href="plain_page.html">Plain Page</a></li>--}}
{{--                                    <li><a href="login.html">Login Page</a></li>--}}
{{--                                    <li><a href="pricing_tables.html">Pricing Tables</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>--}}
{{--                                <ul class="nav child_menu">--}}
{{--                                    <li><a href="#level1_1">Level One</a>--}}
{{--                                    <li><a>Level One<span class="fa fa-chevron-down"></span></a>--}}
{{--                                        <ul class="nav child_menu">--}}
{{--                                            <li class="sub_menu"><a href="level2.html">Level Two</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="#level2_1">Level Two</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="#level2_2">Level Two</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="#level1_2">Level One</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            <button type="submit" style="border: none; background: unset; color: #5A738E;"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button>
                        </form>

                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>
        @yield('content')
        <!-- footer content -->

        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('/assets/admin/js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/assets/admin/js/bootstrap.bundle.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/dataTables.bootstrap.min.js') }}"></script>

<!-- Axios cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
@stack('scripts')
<!-- Custom Theme Scripts -->
<script src="{{ asset('/assets/admin/js/custom.min.js') }}"></script>
<script src="{{ asset('/assets/admin/js/search.js') }}"></script>
</body>
</html>
