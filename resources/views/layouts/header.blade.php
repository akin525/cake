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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/lastudioicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/dliconoutline.css')}}">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightgallery-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet" >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .merriweather-light {
            font-family: "Merriweather", serif;
            font-weight: 300;
            font-style: normal;
        }

        .merriweather-regular {
            font-family: "Merriweather", serif;
            font-weight: 400;
            font-style: normal;
        }

        .merriweather-bold {
            /*font-family: "Merriweather", serif;*/
            /*font-weight: 700;*/
            font-style: normal;
        }

        .merriweather-black {
            font-family: "Merriweather", serif;
            font-weight: 900;
            font-style: normal;
        }

        .merriweather-light-italic {
            font-family: "Merriweather", serif;
            font-weight: 300;
            font-style: italic;
        }

        .merriweather-regular-italic {
            font-family: "Merriweather", serif;
            font-weight: 400;
            font-style: italic;
        }

        .merriweather-bold-italic {
            font-family: "Merriweather", serif;
            font-weight: 700;
            font-style: italic;
        }

        .merriweather-black-italic {
            font-family: "Merriweather", serif;
            font-weight: 900;
            font-style: italic;
        }

    </style>
    <style>
        .cormorant-upright-light {
            font-family: "Cormorant Upright", serif;
            font-weight: 300;
            font-style: normal;
        }

        .cormorant-upright-regular {
            font-family: "Cormorant Upright", serif;
            font-weight: 400;
            font-style: normal;
        }

        .cormorant-upright-medium {
            font-family: "Cormorant Upright", serif;
            font-weight: 500;
            font-style: normal;
        }

        .cormorant-upright-semibold {
            font-family: "Cormorant Upright", serif;
            font-weight: 600;
            font-style: normal;
        }

        .cormorant-upright-bold {
            font-family: "Cormorant Upright", serif;
            font-weight: 700;
            font-style: normal;
        }

    </style>
@yield('style')

</head>
<body>
<style>
    /*body {*/
    /*    margin: 0;*/
    /*    padding: 0;*/
    /*}*/

    /*.container {*/
    /*    width: 80%; !* Adjust the width as needed *!*/
    /*    margin: 0 auto; !* Center the container horizontally *!*/
    /*    padding: 20px; !* Add padding to create space between content and edges *!*/
    /*    border: 1px solid #ccc; !* Add a border around the container *!*/
    /*    border-radius: 10px; !* Optionally, add border radius for rounded corners *!*/
    /*    background-color: #fff; !* Optionally, set background color *!*/
    /*}*/

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
<style>
    .rowdies-light {
        font-family: "Rowdies", sans-serif;
        font-weight: 300;
        font-style: normal;
    }

    .rowdies-regular {
        font-family: "Rowdies", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .rowdies-bold {
        font-family: "Rowdies", sans-serif;
        font-weight: 700;
        font-style: normal;
    }

    .head{
        color: #000000;
        /*margin: 0;*/
        font-family: "Great Vibes", cursive;
        font-size: 50px;
        line-height: .8em;
        /*color: #c19d56;*/
        font-style: normal;
        margin-bottom: 15px;
    }
    .sam{
        font-family: Montserrat, sans-serif;
        font-style: normal;
        font-weight: 600;
        text-transform: uppercase; vertical-align: baseline;  font-size: 30px; line-height: 1.18em;
        letter-spacing: .1em;
    }
    .cormorant-upright-light {
        font-family: "Cormorant Upright", serif;
        font-weight: 300;
        font-style: normal;
    }

    .cormorant-upright-regular {
        font-family: "Cormorant Upright", serif;
        font-weight: 400;
        font-style: normal;
    }

    .cormorant-upright-medium {
        font-family: "Cormorant Upright", serif;
        font-weight: 500;
        font-style: normal;
    }

    .cormorant-upright-semibold {
        font-family: "Cormorant Upright", serif;
        font-weight: 600;
        font-style: normal;
    }

    .cormorant-upright-bold {
        font-family: "Cormorant Upright", serif;
        font-weight: 700;
        font-style: normal;
    }

</style>

{{--<!-- Header Start -->--}}
{{--<div class="header-section header-transparent header-sticky">--}}
{{--    <div class="container position-relative">--}}

{{--        <div class="row align-items-center">--}}
{{--            <div class="col-lg-3 col-7">--}}
{{--                <!-- Header Logo Start -->--}}
{{--                <div class="header-logo">--}}
{{--                    <a href="{{url('/')}}"><img src="{{asset('assets/images/eko.png')}}" width="100"  alt="Logo"></a>--}}
{{--                </div>--}}
{{--                <!-- Header Logo End -->--}}
{{--            </div>--}}
{{--            <div class="col-lg-6 d-none d-lg-block">--}}
{{--                <!-- Header Menu Start -->--}}
{{--                <div class="header-menu">--}}
{{--                    <ul class="header-primary-menu header-primary-menu-03 d-flex justify-content-center">--}}
{{--                        <li>--}}
{{--                            <a href="{{url('/')}}" class="menu-item-link active"><span>Home</span></a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('cakes')}}" class="menu-item-link active"><span>Cakes</span></a>--}}
{{--                            <ul class="sub-menu">--}}
{{--                                @isset($category)--}}
{{--                                @forelse($category as $cat)--}}
{{--                                <li><a class="sub-item-link" href="{{route('category', $cat['name'])}}"><span>{{$cat['name']}}</span></a></li>--}}
{{--                                @empty--}}
{{--                                    <li><a class="sub-item-link" href="#"><span>Add Category</span></a></li>--}}
{{--                                @endforelse--}}
{{--                                @endisset--}}
{{--                            </ul>--}}
{{--                        </li>--}}

{{--                        <li class="position-static">--}}
{{--                            <a class="menu-item-link active" href="{{route('about')}}"><span>About</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="position-static">--}}
{{--                            <a class="menu-item-link active" href="{{route('cart')}}"><span>Cart</span></a>--}}
{{--                        </li>--}}
{{--                        <li><a class="menu-item-link active" href="#"><span>Contact</span></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!-- Header Menu End -->--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-5">--}}
{{--                <!-- Header Meta Start -->--}}
{{--                <div class="header-meta">--}}
{{--                    <ul class="header-meta__action d-flex justify-content-end">--}}
{{--                        <li><button class="action search-open"><i class="lastudioicon-zoom-1"></i></button></li>--}}
{{--                        <li><a class="action" href="{{route('cart')}}"><i class="lastudioicon-shopping-cart-2"></i></a></li>--}}

{{--                                                <li>--}}
{{--                            <button class="action" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart">--}}
{{--                                <i class="lastudioicon-shopping-cart-2"></i>--}}
{{--                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"></span>--}}
{{--                            </button>--}}
{{--                        </li>--}}
{{--                        <li><a class="action" href="{{route('dashboard')}}"><i class="lastudioicon-single-01-2"></i></a></li>--}}
{{--                        <li class="d-lg-none">--}}
{{--                            <button class="action" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"><i class="lastudioicon-menu-8-1"></i></button>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!-- Header Meta End -->--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
<!-- Header End -->
<!-- Header Start -->
<div class="header-section header-sticky-05">
    <div class="container custom-container-two position-relative">

        <div class="headertop">
            <div class="headertop-left">
                <ul class="hotline-wrapper">
                    <li>
                        <div class="hotline">
                            <i class="lastudioicon lastudioicon-support248"></i>
                            <div class="hotline-content">
                                <span class="hotline-text sam">Hotline</span>
                                <a class="hotline-link cormorant-upright-regular" href="tel:08162300183">08162300183</a>
                            </div>
                        </div>
                    </li>
                    <li>
{{--                        <div class="hotline">--}}
{{--                            <i class="lastudioicon lastudioicon-pin-check"></i>--}}
{{--                            <div class="hotline-content">--}}
{{--                                <span class="hotline-text sam">Location</span>--}}
{{--                                <a class="hotline-link cormorant-upright-regular" href="#/"> Gbagada 100234 Lagos</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </li>
                </ul>
            </div>
            <div class="headertop-center">
                <!-- Header Logo Start -->
                <div class="">
                    <a href="{{url('/')}}"><img src="{{asset('assets/images/eko.png')}}" width="100" alt="Logo"></a>
                </div>

                <!-- Header Logo End -->
            </div>

            <div class="headertop-right">
                <!-- Header Meta Start -->
                <div class="header-meta">
                    <ul class="header-meta__action header-meta__action-02 d-flex justify-content-end">
                        <li class="d-sm-block d-none">
                            <form action="{{route('search')}}" method="post" class="search-form">
                                @csrf
                                <input type="search" name="name" class="search-form-field" placeholder="Search Product...">
                                <button
                                    type="submit" class="search-form-btn"><i class="lastudioicon-zoom-1"></i></button>
                            </form>
                        </li>
                        <li class="d-block d-sm-none">
                            <button class="action search-open">
                                <i class="lastudioicon-zoom-1"></i>
                            </button>
                        </li>
                        <li>
                            <a href="{{route('cart')}}" class="action" >
                                <i class="lastudioicon-shopping-cart-2"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"></span>
                            </a>
                        </li>
                        <li><a class="action" href="{{route('membership/dashboard')}}"><i class="lastudioicon-single-01-2"></i></a></li>
                        <li class="d-lg-none">
                            <button class="action" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"><i class="lastudioicon-menu-8-1"></i></button>
                        </li>
                    </ul>
                </div>
                <!-- Header Meta End -->
            </div>
        </div>
        <div class="leftBox text-center">
            <h6 class="cormorant-upright-bold"  style="font-size: 16px; text-transform: uppercase;">
                <b> Delivering yellow boxes of happiness</b><br>
            </h6>

        </div>
        <div class="row">
            <div class="col-12">
                <!-- Header Menu Start -->
                <div class="header-menu d-none d-lg-block">
                    <ul class="header-primary-menu header-primary-menu-05 d-flex justify-content-center">
                        <li>
                            <a href="{{url('/')}}" class="menu-item-link merriweather-bold"><span>Home</span></a>
                                                </li>
                                                <li>
                                                    <a href="{{route('cakes')}}" class="menu-item-link  merriweather-bold"><span>All Cakes</span></a>

                                                </li>

{{--                                                <li class="position-static">--}}
{{--                                                    <a class="menu-item-link merriweather-bold" href="{{route('ready')}}"><span>Ready To Go Cakes</span></a>--}}
{{--                                                </li>--}}
{{--                        @isset($category)--}}
{{--                            @foreach($category as $cat)--}}
{{--                                <li><a class="sub-item-link merriweather-bold" href="{{route('category', $cat['name'])}}"><span>{{$cat['name']}}</span></a></li>--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
                                                <li class="position-static">
                                                    <a class="menu-item-link  merriweather-bold" href="{{route('about')}}"><span>About</span></a>
                                                </li>
                        @auth
                        <li class="position-static">
                                                    <a class="menu-item-link  merriweather-bold" href="{{route('membership/dashboard')}}"><span>Dashboard</span></a>
                                                </li>
                        @endauth
                        @guest
                            <li class="position-static">
                                                    <a class="menu-item-link  merriweather-bold" href="{{route('membership/login')}}"><span>login</span></a>
                                                </li>
                        @endguest
                                                <li class="position-static">
                                                    <a class="menu-item-link merriweather-bold" href="{{route('cart')}}"><span>Cart</span></a>
                                                </li>
                                                <li><a class="menu-item-link merriweather-bold" href="#"><span>Contact</span></a></li>
                    </ul>
                </div>
                <!-- Header Menu End -->
            </div>
        </div>

    </div>
</div>
<!-- Header End -->


<!-- Search Start  -->
<div class="search-popup position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center p-6 bg-black bg-opacity-75">
    <div class="search-popup__form position-relative">
        <form action="#">
            <input class="search-popup__field border-0 border-bottom bg-transparent text-white w-100 tra py-3" type="text" placeholder="Search…">
            <button class="search-popup__icon text-white border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y"><i class="lastudioicon-zoom-1"></i></button>
        </form>
    </div>
    <button class="search-popup__close position-absolute top-0 end-0 m-8 p-3 lh-1 border-0 text-white fs-4"><i class="lastudioicon-e-remove"></i></button>
</div>
<!-- Search End -->


<!-- Search Start  -->
<div class="search-popup position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center p-6 bg-black bg-opacity-75">
    <div class="search-popup__form position-relative">
        <form action="{{route('search')}}" method="post">
            @csrf
            <input name="name" class="search-popup__field border-0 border-bottom bg-transparent text-white w-100 tra py-3" type="text" placeholder="Search…">
            <button type="submit" class="search-popup__icon text-white border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y"><i class="lastudioicon-zoom-1"></i></button>
        </form>
    </div>
    <button class="search-popup__close position-absolute top-0 end-0 m-8 p-3 lh-1 border-0 text-white fs-4"><i class="lastudioicon-e-remove"></i></button>
</div>
<!-- Search End -->

<!-- offcanvas Menu Start -->
<div class="offcanvas offcanvas-end offcanvas-menu bg-secondary" id="offcanvasMenu">
    <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas"><i class="lastudioicon-e-remove"></i></button>
    </div>
    <div class="offcanvas-body">
        <ul class="mobile-primary-menu">
            <li>
                <a href="{{url('/')}}" class="menu-item-link active"><span>Home</span></a>
            </li>

            <li>
                <a href="{{route('cakes')}}" class="menu-item-link  merriweather-bold"><span>All Cakes</span></a>

            </li>
            <li class="position-static">
                <a class="menu-item-link merriweather-bold" href="{{route('about')}}"><span>About Us</span></a>
            </li>
            @guest
            <li><a class="menu-item-link merriweather-bold" href="{{route('membership/login')}}"><span>login</span></a></li>
            @endauth
            @auth
            <li><a class="menu-item-link merriweather-bold" href="{{route('membership/dashboard')}}"><span>Dashboard</span></a></li>
            @endauth
            <li><a class="menu-item-link merriweather-bold" href="#"><span>Contact</span></a></li>
        </ul>
        <ul class="hotline-wrapper offcanvas-hotline">
            <li>
                <div class="hotline">
                    <i class="lastudioicon lastudioicon-support248"></i>
                    <div class="hotline-content">
                        <span class="hotline-text merriweather-bold" >Hotline</span>
                        <a class="hotline-link merriweather-bold" href="tel:08162300183">08162300183</a>
                    </div>
                </div>
            </li>
{{--            <li>--}}
{{--                <div class="hotline">--}}
{{--                    <i class="lastudioicon lastudioicon-pin-check"></i>--}}
{{--                    <div class="hotline-content">--}}
{{--                        <span class="hotline-text">Store Location</span>--}}
{{--                        <a class="hotline-link" href="#">9A Tony Eyinna Street--}}
{{--                            Ifako, Gbagada--}}
{{--                            100234--}}
{{--                            Lagos</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>

<!-- offcanvas Menu End -->
@yield('content')

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
<!-- Offcanvas Cart Start  -->
{{--<div class="offcanvas offcanvas-end offcanvas-cart" id="offcanvasCart">--}}

{{--    <div class="offcanvas-header">--}}
{{--        <h4 class="offcanvas-title">My Cart</h4>--}}
{{--        <button type="button" class="btn-close text-secondary" data-bs-dismiss="offcanvas"><i class="lastudioicon lastudioicon-e-remove"></i></button>--}}
{{--    </div>--}}
{{--    @isset($cart)--}}

{{--    <div class="offcanvas-body">--}}
{{--        <!-- Offcanvas Cart Items Start  -->--}}
{{--        <ul class="offcanvas-cart-items">--}}
{{--                @foreach($cart as $cat)--}}
{{--            <li>--}}
{{--                <!-- Mini Cart Item Start  -->--}}
{{--                <div class="mini-cart-item">--}}
{{--                    <a href="#" class="mini-cart-item__remove"><i class="lastudioicon lastudioicon-e-remove"></i></a>--}}
{{--                    <div class="mini-cart-item__thumbnail">--}}
{{--                        <a href="#"><img width="70" height="88" src="{{url($cat['image'])}}" alt="Cart"></a>--}}
{{--                    </div>--}}
{{--                    <div class="mini-cart-item__content">--}}
{{--                        <h6 class="mini-cart-item__title"><a href="#">{{$cat['name']}}</a></h6>--}}
{{--                        <span class="mini-cart-item__quantity">{{$cat['amount']}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Mini Cart Item End  -->--}}
{{--            </li>--}}
{{--                @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}

{{--    <div class="offcanvas-footer d-flex flex-column gap-4">--}}

{{--        <!-- Mini Cart Total End  -->--}}
{{--        <div class="mini-cart-totla">--}}
{{--            <span class="label">Subtotal:</span>--}}
{{--            <span class="value">₦{{number_format(intval($cartsum *1))}}</span>--}}
{{--        </div>--}}
{{--        <!-- Mini Cart Total End  -->--}}

{{--        <!-- Mini Cart Button End  -->--}}
{{--        <div class="mini-cart-btn d-flex flex-column gap-2">--}}
{{--            <a class="d-block btn btn-secondary btn-hover-primary" href="#">View cart</a>--}}
{{--            <a class="d-block btn btn-secondary btn-hover-primary" href="#">Checkout</a>--}}
{{--        </div>--}}
{{--        <!-- Mini Cart Button End  -->--}}

{{--    </div>--}}
{{--    @endisset--}}


{{--</div>--}}

<!-- Offcanvas Cart End -->
<!-- Scroll Top Start -->
<a href="#" class="scroll-top" id="scroll-top" style="color: #eda939; background-color: #eda939">
    <i class="lastudioicon-up-arrow"></i>
</a>
<!-- Scroll Top End -->
<div class="">

<!-- Footer Strat -->
<div class="footer-section">

    <!-- Footer Widget Section Strat -->
    <div class="footer-widget-section">
        <div class="container custom-container">
            <div class="row gy-6">
                <div class="text-center">
                    <!-- Footer Widget Section Strat -->
                    <div class="footer-widget">
                        <div class="">
                            <a href="/"><img width="150" src="{{asset('assets/images/eko.png')}}" alt="Logo"></a>
                        </div>
                        <div class="">
                            <a href="#"><i class="lastudioicon-b-facebook"></i></a>
                            <a href="#"><i class="lastudioicon-b-twitter"></i></a>
                            <a href="#"><i class="lastudioicon-b-pinterest"></i></a>
                            <a href="#"><i class="lastudioicon-b-instagram"></i></a>
                        </div>
                    </div>
                    <!-- Footer Widget Section End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Widget Section End -->
    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            left:40px;
            background-color:#EF9B00;
            color:black;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        .my-float{
            margin-top:16px;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://wa.me/2348162300183" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    <!-- Footer Copyright Strat -->
    <div class="footer-copyright">
        <div class="container">
            <!-- Footer Copyright Text Strat -->
            <div class="footer-copyright-text text-center">
                <p>&copy; 2024 <strong> All right reserved </strong> <i class="lastudioicon-heart-1"></i> by <a href="#">Eko Cakes</a></p>
            </div>
            <!-- Footer Copyright Text End -->
        </div>
    </div>
    <!-- Footer Copyright End -->

</div>
<!-- Footer End -->
</div>

<!-- JS Vendor, Plugins & Activation Script Files -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/662801221ec1082f04e5ff86/1i4lol8vl';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!-- Vendors JS -->
<script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/countdown.min.js')}}"></script>
<script src="{{asset('assets/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('assets/js/lightgallery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/ajax.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>

<!-- Activation JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>
