@extends('layouts.sidebar')
@section('tittle', 'My Plan')
@section('content')

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Select Plan</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Sample Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Pricing Table</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
    <hr/>
    <div class="row">
        <div class="col-12">
            <div class="box  overflow-hidden pull-up" style="background-color: #0a0a0a">
                <div class="box-body pr-0 pl-lg-50 pl-15 py-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-8">
                            <h1 class="font-size-40 text-white">My-Membership Plan</h1>
                            @if(Auth::user()->plan ==NULL)
                                <p class="text-white mb-0 font-size-20">
                                    Please kindly select any plan for ur membership here
                                </p>
                            @else
                                <p class="text-white mb-0 font-size-20">
                                    <b>MY Plan:</b> <i>{{Auth::user()->plan}}</i>
                                <hr>
                                <a href="#" class="badge badge-success">Upgrade</a>
                                </p>
                            @endif
                        </div>
{{--                        <div class="col-12 col-lg-4"><img src="https://eduadmin-template.multipurposethemes.com/bs4/images/svg-icon/color-svg/custom-15.svg" alt=""></div>--}}
                    </div>
                </div>
            </div>
        </div>
        @foreach($plan as $pa)
            <div class="col-lg-4">
                <div class="box">
                    <div class="box-body text-center">
                        <h4 class="price" style="font-size: 30px">
                            ₦{{$pa['amount']}}
                            <span>&nbsp;</span>
                        </h4>
                        <h5 class="text-uppercase text-muted">{{$pa['plan']}}</h5>

                        <hr>
                        <p><strong>{{$pa['days']}}Days</strong> Duration</p>
                        <p><strong>{!! $pa['body'] !!}</strong></p>

                        <br/>
                        <br/>

                        @if($pa['plan'] == Auth::user()->plan)
                            <a class="badge badge-success" href="#">Current Plan</a>
                        @else
                            <a class="btn btn-success" href="{{route('membership/detail', $pa['id'])}}">Select plan</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
