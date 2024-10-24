@extends('layouts.header')
@section('tittle', 'Sign-up Page')
@section('content')
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
            <div class="row">
                <span class="fa fa-lock"></span>
                <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
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
                        <p>Already have an account? <a href="{{route('login')}}">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

