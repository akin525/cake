@extends('layouts.header')
@section('tittle', 'Sign-up Page')
@section('content')
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
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="{{asset('assets/images/bg/breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Register</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
{{--                <span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>--}}
                {{--            <h4 class="company_title">Your Company Logo</h4>--}}
                <center>
                    <img width="100" src="{{asset('assets/images/eko.png')}}" alt=""/>
                </center>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <h4>Register</h4>
                    </div>
                    <div class="row">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
    <form class="form-group" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div class="row">
                <input type="text" name="name" id="name" class="form__input" placeholder="Fullname">
                <x-input-error :messages="$errors->get('name')" class="alert alert-danger" />
            </div>
        <div class="row">
            <label class="text-left">Date of birth</label>
            <input type="date" name="dob" id="Dob" class="form__input" placeholder="Date of birth">
            <x-input-error :messages="$errors->get('dob')" class="alert alert-danger" />
        </div>

            <div class="row">
                <input type="email" name="email" id="email" class="form__input" placeholder="email">
                <x-input-error :messages="$errors->get('email')" class="alert alert-danger" />
            </div>
            <div class="row">
                <input type="number" name="number" id="number" class="form__input" placeholder="Phone Number">
                <x-input-error :messages="$errors->get('number')" class="alert alert-danger" />
            </div>
            <div class="row">
                <input type="text" name="address" id="address" class="form__input" placeholder="Home Address">
                <x-input-error :messages="$errors->get('address')" class="alert alert-danger" />
            </div>

        <!-- Password -->
        <div class="row position-relative">
            <input type="password" name="password" id="password" class="form__input" placeholder="Password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
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

{{--            <div class="row">--}}
{{--                <span class="fa fa-lock"></span>--}}
{{--                <input type="password" name="password" id="password" class="form__input" placeholder="Password">--}}
{{--                <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--            </div>--}}
            <div class="row">
                <span class="fa fa-lock"></span>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form__input" placeholder="password_confirmation">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

        <!-- Confirm Password -->
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--            <x-text-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password_confirmation" required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--        </div>--}}
            <div class="row">
                <center>
                    <input type="submit" value="Submit" class="btn">
                </center>
            </div>
    </form>
                    </div>
                    <div class="row">
                        <p>Already have an account? <a href="{{route('membership/login')}}">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

