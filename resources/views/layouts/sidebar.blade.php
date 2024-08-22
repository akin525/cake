<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Buy data in a few clicks to keep surfing the internet. You can buy whatever size of data plan for whichever network you desire. All plans are topped-up to your specified number in seconds.">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/eko.png')}}">


    <title>@yield('tittle')</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('ads/css/vendors_css.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('ads/css/style.css')}}">
{{--    <link rel="stylesheet" href="{{asset('ads/css/skin_color.css')}}">--}}
@yield('style')
</head>
<style>

    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .image-container {
        border-radius: 40px; /* Same border-radius as the card */
        overflow: hidden; /* Ensures the image conforms to the border-radius */
    }

    .image-container img {
        width: 100%;
        height: auto;
        display: block;
    }
</style>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
    <div id="loader"></div>
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>

{{--    @include('sweetalert::alert')--}}

    <header class="main-header">
        <div class="d-flex align-items-center logo-box justify-content-start">
            <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
                <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
            </a>
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- logo-->
                <div class="logo-lg">
                    <span class="light-logo"><img width="50" src="{{asset('assets/images/eko.png')}}" alt="logo"></span>
                    <span class="dark-logo"><img src="{{asset('assets/images/eko.png')}}" alt="logo"></span>
                </div>
            </a>
        </div>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <div class="app-menu">
                <ul class="header-megamenu nav">
                    <li class="btn-group nav-item d-md-none">
                        <a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
                            <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                        </a>
                    </li>
                    <li class="btn-group nav-item d-none d-xl-inline-block">
                        <a href="#" class="waves-effect waves-light nav-link svg-bt-icon" title="Chat">
                            <i class="icon-Chat"><span class="path1"></span><span class="path2"></span></i>
                        </a>
                    </li>
                    <li class="btn-group nav-item d-none d-xl-inline-block">
                        <a href="#" class="waves-effect waves-light nav-link svg-bt-icon" title="Mailbox">
                            <i class="icon-Mailbox"><span class="path1"></span><span class="path2"></span></i>
                        </a>
                    </li>
                    <li class="btn-group nav-item d-none d-xl-inline-block">
                        <a href="#" class="waves-effect waves-light nav-link svg-bt-icon" title="Taskboard">
                            <i class="icon-Clipboard-check"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="navbar-custom-menu r-side">
                <ul class="nav navbar-nav">
                    <li class="btn-group nav-item d-lg-inline-flex d-none">
                        <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
                            <i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
                        </a>
                    </li>
                    <li class="btn-group d-lg-inline-flex d-none">
                        <div class="app-menu">
                            <div class="search-bx mx-5">
                                <form>
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit" id="button-addon3"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>

                    <!-- User Account-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                        </a>
                        <ul class="dropdown-menu animated flipInX">
                            <li class="user-body">
                                <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> My Wallet</a>
                                <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-lock text-muted mr-2"></i> Logout</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
                            <i class="icon-Settings"><span class="path1"></span><span class="path2"></span></i>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>


    <aside class="main-sidebar">
        <!-- sidebar-->
        <section class="sidebar position-relative">
            <div class="multinav">
                <div class="multinav-scroll" style="height: 100%;">
                    <!-- sidebar menu-->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">Dashboard & Apps</li>
                        <li >
                            <a href="{{url('/')}}">
                                <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                                <span>Main-Page</span>
                            </a>
                        </li>
                        <li >
                            <a href="{{route('membership/dashboard')}}">
                                <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('membership/plans')}}">
                                <i class="icon-Bookmark"><span class="path1"></span><span class="path2"></span></i>
                                <span>My-Plan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('membership/order')}}">
                                <i class="iconsmind-File-Bookmark"><span class="path1"></span><span class="path2"></span></i>
                                <span>Order</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="iconsmind-File-Bookmark"><span class="path1"></span><span class="path2"></span></i>
                                <span>Payments</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <div class="sidebar-footer">
            <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><span class="icon-Settings-2"></span></a>
            <a href="mailbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><span class="icon-Mail"></span></a>
            <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
            @yield('content')
                </div>
            </section>

        </div>
    </div>

    <footer class="main-footer">
        <div class="pull-right d-none d-sm-inline-block">
            <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ekocakes</a>
                </li>
            </ul>
        </div>
        &copy; 2024 <a href="#">Membership</a>. All Rights Reserved.
    </footer>
    <div class="control-sidebar-bg"></div>

</div>

@yield('script')
<!-- Vendor JS -->
<script src="{{asset('ads/js/vendors.min.js')}}"></script>
<script src="{{asset('ads/js/pages/chat-popup.js')}}"></script>
<script src="{{asset('ads/assets/icons/feather-icons/feather.min.js')}}"></script>

<script src="{{asset('ads/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
<script src="{{asset('ads/assets/vendor_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('ads/assets/vendor_components/fullcalendar/fullcalendar.js')}}"></script>


<!-- EduAdmin App -->
<script src="{{asset('ads/js/template.js')}}"></script>
<script src="{{asset('ads/js/pages/dashboard.js')}}"></script>
<script src="{{asset('ads/js/pages/calendar.js')}}"></script>


<script src="{{asset('ads/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

<!-- EduAdmin App -->
<script src="{{asset('ads/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('ads/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>


<script src="{{asset('ads/js/pages/editor.js')}}"></script>
<script src="{{asset('ads/assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ads/js/pages/data-table.js')}}"></script>
<script src="{{asset('ads/assets/vendor_components/datatable/datatables.min.js')}}"></script>
</body>
</html>


