<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/eko.png')}}">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;family=Handlee&amp;family=Inter:wght@300;400;500;600;700&amp;family=Comfortaa:wght@300;400;500;600;700&amp;family=Montaga&amp;family=Pacifico&amp;family=Fredericka+the+Great&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Yellowtail&amp;display=swap" rel="stylesheet">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @yield('style')
</head>

<style>
    .main-content{
        width: 50%;
        border-radius: 20px;
        box-shadow: 0 5px 5px rgba(0,0,0,.4);
        margin: 5em auto;
        display: flex;
    }
    .company__info{
        background-color: #f1f0ed;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
    }
    .fa-android{
        font-size:3em;
    }
    @media screen and (max-width: 640px) {
        .main-content{width: 90%;}
        .company__info{
            display: none;
        }
        .login_form{
            border-top-left-radius:20px;
            border-bottom-left-radius:20px;
        }
    }
    @media screen and (min-width: 642px) and (max-width:800px){
        .main-content{width: 70%;}
    }
    .row > h2{
        color: #977510;
    }
    .login_form{
        background-color: #fff;
        border-top-right-radius:20px;
        border-bottom-right-radius:20px;
        border-top:1px solid #ccc;
        border-right:1px solid #ccc;
    }
    form{
        padding: 0 2em;
    }
    .form__input{
        width: 100%;
        border:0px solid transparent;
        border-radius: 0;
        border-bottom: 1px solid #aaa;
        padding: 1em .5em .5em;
        padding-left: 2em;
        outline:none;
        margin:1.5em auto;
        transition: all .5s ease;
    }
    .form__input:focus{
        border-bottom-color: #977510;
        box-shadow: 0 0 5px rgba(0,80,80,.4);
        border-radius: 4px;
    }
    .btn{
        transition: all .5s ease;
        align-content: center;
        width: 70%;
        border-radius: 30px;
        color: #e5b619;
        font-weight: 600;
        background-color: #fff;
        border: 1px solid #e5b619;
        margin-top: 1.5em;
        margin-bottom: 1em;
    }
    .btn:hover, .btn:focus{
        background-color: #e5b619;
        color:#fff;
    }
</style>
@if(Session::has('error'))
    <script>
        Swal.fire({
            title: 'Ooops..',
            text: '{{ Session::get('error') }}',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
        })
    </script>
@endif
<!-- Main Content -->
<div class="container-fluid">
    <div class="row main-content bg-success text-center">
        <div class="col-md-4 text-center company__info">
            <span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
            {{--            <h4 class="company_title">Your Company Logo</h4>--}}
            <center>
                <img width="100" src="{{asset('assets/images/eko.png')}}" alt=""/>
            </center>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
            <div class="container-fluid">
                <br>
                <div class="row">
                    <h4>Admin Login</h4>
                </div>
                <div class="row">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    @if (session('errors'))
                        <div class="alert alert-danger">
                            {{ session('errors') }}
                        </div>
                    @endif
                    <form class="form-group" action="{{route('login')}}" method="post">
                        @csrf
                        <div class="row">
                            <input type="email" name="email" id="email" class="form__input" placeholder="email">
                                                            <x-input-error :messages="$errors->get('email')" class="alert alert-danger" />
                        </div>
                        <div class="row">
                            <span class="fa fa-lock"></span>
                            <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="row">
                            <input type="checkbox" name="remember_me" id="remember_me" class="">
                            <label for="remember_me">Remember Me!</label>
                        </div>
                        <div class="row">
                            <center>
                                <input type="submit" value="Login" class="btn">
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

