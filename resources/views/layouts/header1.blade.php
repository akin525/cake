<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/eko.png')}}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('new/assets/css/bootstrap.min.css')}}">

    <!-- Font CSS -->
    <link rel="stylesheet" href="{{asset('new/assets/css/font-awesome.min.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('new/assets/css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('new/assets/css/style.css')}}">

    <!-- Modernizer JS -->
    <script src="{{asset('new/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

@yield('style')

</head>
<body class="box-body">
<div class="main-wrapper home-2">

    <div class="container-box">
        <!-- header-area start -->
        <div class="header-area">
            <!-- header-top start -->
            <div class="header-top bg-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 order-lg-1 col-md-5 order-1">
                            <div class="top-selector-wrapper">
                                <ul class="single-top-selector-left">
                                    <!-- Currency Start -->

                                    <!-- Currency End -->
                                    <!-- Language Start -->
                                    <li class="language list-inline-item">
                                        <div class="btn-group">
                                            <button class="dropdown-toggle"><img src="{{asset('new/assets/images/icon/la-1.jpg')}}" alt="">  English <i class="fa fa-angle-down"></i></button>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <li><a href="#"><img src="{{asset('new/assets/images/icon/la-1.jpg')}}" alt=""> English</a></li>
                                                    <li><a href="#"><img src="{{asset('new/assets/images/icon/la-2.jpg')}}" alt=""> Français</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Language End -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-2 col-md-12">
                            <!-- logo start -->
                            <div class="logo text-center">
                                <a href="{{url('/')}}"><img src="{{asset('assets/images/eko.png')}}" alt=""></a>
                            </div>
                            <!-- logo end -->
                        </div>
                        <div class="col-lg-4 order-lg-3 col-lg-4 col-md-7 order-2">
                            <div class="header-bottom-right">

                                <!-- block-search start -->
                                <div class="block-search">
                                    <div class="trigger-search"><i class="fa fa-search"></i> <span>Search</span></div>
                                    <!-- search-box start -->
                                    <div class="search-box main-search-active">
                                        <form action="{{route('search')}}" method="post" class="search-box-inner">
                                            @csrf
                                            <input type="text" name="name" placeholder="Search our catalog">
                                            <button  class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                    <!-- search-box end -->
                                </div>
                                <!-- block-search end -->
                                <div class="shoping-cart">
                                    <div class="btn-group">
                                        <!-- Mini Cart Button start -->
                                        <button class="dropdown-toggle" onclick="window.location.href='{{route('cart')}}'"><i class="fa fa-shopping-cart"></i> Cart </button>
                                        <!-- Mini Cart button end -->

                                        <!-- Mini Cart wrap start -->


                                        <!-- Mini Cart wrap End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header-top end -->
            <!-- Header-bottom start -->
            <div class="header-bottom-area bg-grey header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 d-none d-lg-block">
                            <!-- main-menu-area start -->
                            <div class="main-menu-area text-center">
                                <nav class="main-navigation">
                                    <ul>
                                        <li  class="active"><a href="{{url('/')}}">Home  <i class="fa fa-angle-down"></i></a>

                                        </li>
                                        <li><a href="#">Cakes<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub-menu">
                                        @isset($category)
                                            @foreach($category as $cat)
                                                <li><a  href="{{route('category', $cat['name'])}}">{{$cat['name']}}</a></li>
                                                @endforeach
                                                @endisset
                                            </ul>
                                        </li>
                                        <li><a href="{{route('about')}}">About</a>
                                        </li>
                                        <li>
                                            <a  href="{{route('cart')}}">Cart</a>
                                        </li>
                                        <li><a href="#">Contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- main-menu-area start -->
                        </div>
                        <div class="col">
                            <!-- mobile-menu start -->
                            <div class="mobile-menu d-block d-lg-none"></div>
                            <!-- mobile-menu end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header-bottom end -->
        </div>
        <!-- Header-area end -->
        <div class="container-box-inner">
        @yield('content')
        </div>
    </div>
</div>

@if(Session::has('errors'))
    <script>
        Swal.fire({
            title: 'Ooops..',
            text: '{{ Session::get('errors') }}',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
        })
    </script>
@endif
@if(Session::has('status'))
    <script>
        Swal.fire({
            title: 'Done',
            text: '{{ Session::get('status') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6',
        })
    </script>
@endif


<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6628014ba0c6737bd12f79e7/1hs64a5vm';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<script src="{{asset('new/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('new/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('new/assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('new/assets/js/bootstrap.min.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('new/assets/js/plugins.js')}}"></script>
<!-- Ajax Mail -->
<script src="{{asset('new/assets/js/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('new/assets/js/main.js')}}"></script>


</body>
</html>
