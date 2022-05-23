<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin_assets/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->

    <!-- Main CSS-->
    <link href="{{ asset('admin_assets/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body>
    

    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{url('admin/dashboard')}}">
                            <img src="{{ asset('admin_assets/images/icon/logo.png') }}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        <li>
                            <a href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('admin/category')}}">
                                <i class="fas fa-list"></i>Category</a>
                        </li>
                        <li>
                            <a href="{{url('admin/coupon')}}">
                                <i class="fas fa-table"></i>Coupon</a>
                        </li>
                        <li>
                            <a href="{{url('admin/size')}}">
                                <i class="far fa-check-square"></i>Size</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{url('admin/dashboard')}}">
                    <img src="{{ asset('admin_assets/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard_active')">
                            <a href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li class="@yield('ctegory_active')">
                            <a href="{{url('admin/category')}}">
                                <i class="fas fa-list"></i>Category</a>
                        </li>
                        <li class="@yield('coupon_active')">
                            <a href="{{url('admin/coupon')}}">
                                <i class="fas fa-tag"></i>Coupon</a>
                        </li>
                        <li class="@yield('size_active')">
                            <a href="{{url('admin/size')}}">
                                <i class="far fa-check-square"></i>Size</a>
                        </li>

                        <li class="@yield('brand_active')">
                            <a href="{{url('admin/brand')}}">
                                <i class="fab fa-fort-awesome"></i>Brand</a>
                        </li>

                        <li class="@yield('color_active')">
                            <a href="{{url('admin/color')}}">
                                <i class="fas fa-paint-brush"></i>Color</a>
                        </li>
                        <li class="@yield('tax_active')">
                            <a href="{{url('admin/tax')}}">
                                <i class="fas fa-percent"></i>Tax</a>
                        </li>
                        <li class="@yield('product_active')">
                            <a href="{{url('admin/product')}}">
                                <i class="fab fa-product-hunt"></i>Product</a>
                        </li>

                        <li class="@yield('customer_active')">
                            <a href="{{url('admin/customer')}}">
                                <i class="fas fa-user"></i>Customer</a>
                        </li>

                        <li class="@yield('home_banner_active')">
                            <a href="{{url('admin/home_banner')}}">
                                <i class="fas fa-image"></i>Home Banner</a>
                        </li>
                        
                        
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap " style="float: right">
                            
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Welcome Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('/admin/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
           
            <!-- END MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @section('content')
                        @show
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>




    <!-- Jquery JS-->
    <script src="{{ asset('admin_assets/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin_assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <!-- Main JS-->
    <script src="{{ asset('admin_assets/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->