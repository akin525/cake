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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
{{--    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">--}}
    @yield('style')
</head>

<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        color: #333;
    }

    .container-fluid {
        padding: 0 2em;
    }

    /* Main Content */
    .main-content {
        width: 50%;
        border-radius: 20px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.15);
        margin: 5em auto;
        display: flex;
        background-color: #fff;
        overflow: hidden;
    }

    /* Company Info Section */
    .company__info {
        background-color: #f1f0ed;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 2em;
        text-align: center;
    }

    .company__logo h2 {
        color: #977510;
        margin-bottom: 1em;
    }

    .company__logo img {
        margin-top: 1em;
    }

    @media screen and (max-width: 640px) {
        .main-content {
            width: 90%;
        }
        .company__info {
            display: none;
        }
        .login_form {
            border-radius: 20px;
        }
    }

    @media screen and (min-width: 642px) and (max-width: 800px) {
        .main-content {
            width: 70%;
        }
    }

    /* Login Form */
    .login_form {
        padding: 2em;
        background-color: #fff;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        border-top: 1px solid #e5e5e5;
        border-right: 1px solid #e5e5e5;
    }

    form {
        padding: 0 1.5em;
    }

    h4 {
        color: #977510;
        margin-bottom: 1.5em;
    }

    /* Input Styles */
    .form__input {
        width: 100%;
        border: none;
        border-bottom: 2px solid #aaa;
        padding: 1em 0.5em;
        padding-left: 2.5em;
        margin: 1.5em 0;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .form__input:focus {
        border-bottom-color: #977510;
        box-shadow: 0 0 5px rgba(0,80,80,0.4);
    }

    .position-relative {
        position: relative;
    }

    /* Toggle Password Icon */
    #togglePassword {
        position: absolute;
        right: -90px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #aaa;
    }

    #togglePassword:hover {
        color: #977510;
    }

    /* Button Styles */
    .btn {
        width: 70%;
        padding: 0.8em;
        border-radius: 30px;
        color: #fff;
        background-color: #e5b619;
        border: none;
        font-weight: 600;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #d4a10b;
    }

    .btn:focus {
        outline: none;
    }

    /* Checkbox and Links */
    label {
        font-size: 0.9em;
        color: #555;
        margin-left: 10px;
    }

    a {
        color: #e5b619;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    p {
        margin-top: 2em;
        font-size: 0.9em;
    }

    /* Alerts */
    .alert {
        margin-bottom: 1.5em;
        padding: 0.75em;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 0.25em;
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
            <span class="company__logo"><h2></h2></span>
            {{--            <h4 class="company_title">Your Company Logo</h4>--}}
            <center>
                <img width="100" src="{{asset('assets/images/eko.png')}}" alt=""/>
            </center>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
            <div class="container-fluid">
                <br>
                <div class="row">
                    <h5>Become a member? <a href="{{route('register')}}">Click Here</a></h5>

                </div>
                <div class="row">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    @if (session('errors'))
                        <div class="alert alert-danger">
                            {{ session('errors') }}
                        </div>
                    @endif
                    <form class="form-group" action="{{route('membership/login')}}" method="post">
                        @csrf
                        <div class="row">
                            <input type="email" name="email" id="email" class="form__input" placeholder="email">
{{--                                                            <x-input-error :messages="$errors->get('email')" class="alert alert-danger" />--}}
                        </div>
                        <div class="row position-relative">
                            <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                            <span id="togglePassword" class="fa fa-eye position-absolute"></span>
                        </div>

                        <script>
                            const togglePassword = document.querySelector('#togglePassword');
                            const password = document.querySelector('#password');

                            togglePassword.addEventListener('click', function (e) {
                                // Toggle the type attribute
                                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                password.setAttribute('type', type);

                                // Toggle the eye icon
                                this.classList.toggle('fa-eye');
                                this.classList.toggle('fa-eye-slash');
                            });
                        </script>

                        <div class="row">
                            <input type="checkbox" name="remember_me" id="remember_me" class="">
                            <label for="remember_me">Remember Me!</label>
                        </div>
                        <div class="row">
                            <center>
                                <input type="submit" value="Login" class="btn">
                            </center>
                        </div>
                        <div class="row">
{{--                            <h5>Become a member? <a href="{{route('register')}}">Click Here</a></h5>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

