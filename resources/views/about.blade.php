@extends('layouts.header')
@section('tittle', 'About-Us')

@section('content')


    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb breadcrumb-about" data-bg-image="assets/images/bg/breadcrumb-bg-3.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="cormorant-upright-bold text-white"><b>About Us</b></h1>
{{--                        <p class="breadcrumb_text">Welcome to Eko Cakes WHO WE ARE</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- About Section Start -->
    <div class="section-padding-03 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="section-title-10 justify-content-start text-start align-items-start">
{{--                        <span class="cormorant-upright-bold" style="font-family: Great Vibes, cursive; font-size: 40px;">Welcome to Eko Cakes</span>--}}
                        <span class="cormorant-upright-bold" style="font-size: 40px;">Welcome to Eko Cakes</span>
                        <h5 class="cormorant-upright-regular">WHO WE ARE</h5>
                        <hr/>
                        <p class="cormorant-upright-regular">{!! $setting->about !!}</p>
{{--                        <p class="section-title-10__text">Vestibulum eu tristique tellus. Praesent at varius nisi, ut dignissim lectus. Praesent venenatis ipsum in arcu ullamcorper tristique. Aliquam et gravida magna, ut tincidunt massa.</p>--}}
{{--                        <img src="assets/images/singnecher-2.png" alt="Signature-Image">--}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <img src="https://ekocakes.com/wp-content/uploads/2024/01/IMG_0834-600x600.jpg" alt="About-Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <div class="faq">
        <div class="container custom-container">
            <div class="row" id="exampleOne">

                <div class="">
                    <div class="faq-head align-content-center">
                        <h4 class="faq-head__title text-center merriweather-bold" style="font-size: 18px">FREQUENTLY ASKED QUESTIONS</h4>
                        <span class="faq-head__border"></span>
                    </div>
                </div>
                <div class="">
                    <div class="accordion">
                        @foreach($fq as $fa)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$fa['id']}}" aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="merriweather-regular" style="font-size: 14px">{{$fa['heading']}}</h4>
                                        <i class="lastudioicon lastudioicon-down-arrow"></i>
                                    </button>
                                </h2>
                                <div id="collapse{{$fa['id']}}" class="accordion-collapse collapse" data-bs-parent="#exampleOne">
                                    <div class="accordion-body merriweather-bold" style="font-size: 12px">{!! $fa['content'] !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
