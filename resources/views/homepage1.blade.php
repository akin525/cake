@extends('layouts.header')
@section('tittle', 'Home')
@section('content')
<!-- Slider Section Strat -->
    <div class="slider-section-seven slider-active overflow-hidden">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- Single Slider Start -->
                <div class="swiper-slide single-slider-07 animation-style-07 movearea" style="background-image: url(assets/images/slider/slider-bg-7-1.jpg);">
                    <div class="image movex">
                        <img class="img-center" width="70" src="{{asset('ct2.png')}}" alt="Slider-Image">
                    </div>
                    <div class="slider-content-07 container">
                        <div class="row align-items-end">
                            <div class="col-12 col-sm-6 text-center text-sm-end pe-lg-16">
                                <h2 class="slider-content-07__title">MAKING CAKE <br>IS ART </h2>
                                <a class="slider-content-07__btn btn slider-btn-01" href="{{route('cakes')}}">Discover</a>
                            </div>
                            <div class="col-12 col-sm-6">
{{--                                <p class="slider-content-07__text">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider End -->
                <!-- Single Slider Start -->
                <div class="swiper-slide single-slider-07 animation-style-07 movearea" style="background-image: url(assets/images/slider/slider-bg-7-2.jpg);">
                    <div class="image movex">
                        <img class="img-center" src="assets/images/slider/slider-7-02.png" alt="Slider-Image">
                    </div>
                    <div class="slider-content-07 container">
                        <div class="row align-items-end">
                            <div class="col-12 col-sm-6 text-center text-sm-end pe-lg-16">
                                <h2 class="slider-content-07__title">MAKING CAKE <br>IS ART </h2>
                                <a class="slider-content-07__btn btn slider-btn-01" href="{{route('cakes')}}">Discover</a>
                            </div>
                            <div class="col-12 col-sm-6 ">
{{--                                <p class="slider-content-07__text">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider End -->
                <!-- Single Slider Start -->
                <div class="swiper-slide single-slider-07 animation-style-07 movearea" style="background-image: url(assets/images/slider/slider-bg-7-3.jpg);">
                    <div class="image movex">
                        <img class="img-center" src="assets/images/slider/slider-7-03.png" alt="Slider-Image">
                    </div>
                    <div class="slider-content-07 container">
                        <div class="row align-items-end">
                            <div class="col-12 col-sm-6 text-center text-sm-end pe-lg-16">
                                <h2 class="slider-content-07__title">MAKING CAKE <br>IS ART </h2>
                                <a class="slider-content-07__btn btn slider-btn-01" href="{{route('cakes')}}">Discover</a>
                            </div>
                            <div class="col-12 col-sm-6">
{{--                                <p class="slider-content-07__text">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider End -->
            </div>
            <div class="swiper-pagination container"></div>
        </div>
    </div>
    <!-- Slider Section End -->


    <!-- Category Section Start -->
    <div class="bg-dark-two category-three_bg" data-bg-image="assets/images/bg/category-three-bg.png">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 mb-n25">
                <div class="col mb-25">
                    <div class="category-three">
                        <div class="category-three_thumb">
                            <img width="200"  src="{{asset('ct.png')}}" alt="Category-image">
                        </div>
                        <h4 class="category-three_title">All Cakes</h4>
                        <a href="{{route('cakes')}}" class="category-three_more">View More</a>
                    </div>
                </div>
                <div class="col mb-25">
                    <div class="category-three">
                        <div class="category-three_thumb">
                            <img width="200"  src="{{asset('ct1.png')}}" alt="Category-image">
                        </div>
                        <h4 class="category-three_title">Cake For Him</h4>
                        <a href="{{url('category/Cake%20for%20Him')}}" class="category-three_more">View More</a>
                    </div>
                </div>
                <div class="col mb-25">
                    <div class="category-three">
                        <div class="category-three_thumb">
                            <img width="200" src="{{asset('ct2.png')}}" alt="Category-image">
                        </div>
                        <h4 class="category-three_title">Ready To Go</h4>
                        <a href="{{route('ready')}}" class="category-three_more">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category Section End -->


    <!-- Product Section End -->
    <div class="bg-dark-two">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Strat -->
                    <div class="section-title-07 text-center">
                        <span class="section-title-07__subtitle">Cakes</span>
                        <h5 class="section-title-07__title">What we have</h5>
                    </div>
                    <br>
                    <br>
                    <!-- Section Title End -->
                </div>
            </div>

            <!-- Product Tab Menu Strat -->

            <!-- Product Tab Menu End -->

            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1">
                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
                        @forelse($product as $pro)
                        <div class="col mb-60">
                            <!-- Product Item Start -->
                            <div class="product-item product-item-08 text-center">
                                <div class="product-item__image" data-bg-image="">
                                    <a class="item-img" href="{{route('cakedetail', $pro['id'])}}">
                                        <img src="{{url($pro['image'])}}" alt="Product">
                                    </a>
                                    <ul class="product-item__meta meta-middle">
                                        <li class="product-item__meta-round">
                                            <a class="labtn-icon-quickview" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Quick View" data-product-id="{{$pro['id']}}" data-bs-toggle="modal" data-bs-target="#quickViewModal{{$pro['id']}}"></a>
                                        </li>
                                        <li class="product-item__meta-round">
                                            <a class="shadow-1 labtn-icon-cart" href="{{route('cakedetail', $pro['id'])}}" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Cart" ></a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="product-item__content">
                                    <h5 class="product-item__title"><a href="{{route('cakedetail', $pro['id'])}}">{{$pro['name']}}</a></h5>
                                    <span class="product-item__price">₦{{number_format(intval($pro['price'] *1))}}</span>
                                </div>
                            </div>
                            <!-- Product Item End -->
                        </div>
                            <div class="quickview-product-modal modal fade" id="quickViewModal{{$pro['id']}}" tabindex="-1" aria-labelledby="quickViewModalLabel{{$pro['id']}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-100">
                                    <div class="container">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="lastudioicon lastudioicon-e-remove"></i>
                                            </button>
                                            <div class="modal-body">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="quickview-product-modal modal fade" id="modalCart1{{$pro['id']}}"
                                 tabindex="-1" aria-labelledby="quickViewModalLabel{{$pro['id']}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-100">
                                    <div class="custom-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="lastudioicon lastudioicon-e-remove"></i>
                                        </button>
                                        <div class="modal-body">
                                            <!-- Your modal content will be loaded dynamically via AJAX -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">No Product Available On Store</p>
                        @endforelse

                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{route('cakes')}}" class="more-btn_two">All Cakes</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Product Section End -->






    <!-- Call To Action Three Section Start -->
    <div class="bg-dark-two section-padding-03" data-bg-image="assets/images/bg/category-three-bg.png">
        <div class="container">
            <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-1 mb-n30">
                <div class="col mb-30">
                    <!-- Single Call To Actio 03 Start -->
                    <a href="contact.html" class="callto-action-03">
                        <span class="callto-action-03_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" fill="none" viewBox="0 0 63 63"><path fill="currentColor" d="M39.206 6.34H23.794C10.45 6.34 0 11.111 0 17.205c0 1.636.732 3.194 2.177 4.634.512.508.806 1.234.806 1.992v9.07a.923.923 0 0 0 1.845 0v-9.07c0-1.246-.492-2.45-1.35-3.301-1.083-1.08-1.632-2.198-1.632-3.325 0-2.233 2.239-4.488 6.144-6.185 4.206-1.829 9.818-2.836 15.804-2.836 5.985 0 11.597 1.007 15.803 2.836 3.905 1.697 6.144 3.952 6.144 6.185 0 1.127-.55 2.246-1.632 3.324-.858.852-1.35 2.056-1.35 3.302v18.644a.923.923 0 1 0 1.846 0V23.832c0-.758.293-1.484.806-1.993 1.444-1.438 2.176-2.997 2.176-4.633 0-3.8-4.063-7.085-10.357-9.021h1.976c5.985 0 11.598 1.007 15.804 2.836 3.905 1.697 6.144 3.952 6.144 6.185 0 1.127-.55 2.246-1.632 3.324-.858.852-1.35 2.056-1.35 3.302v1.995a.923.923 0 0 0 1.845 0v-1.995c0-.758.294-1.484.806-1.993C62.269 20.4 63 18.842 63 17.206c0-6.094-10.451-10.867-23.794-10.867z"></path><path fill="currentColor" d="M59.094 29.224a.923.923 0 0 0-.923.922v23.106c0 .862-.701 1.563-1.563 1.563H44.223c.243-.468.381-1 .381-1.563v-6.457a.923.923 0 1 0-1.846 0v6.457c0 .862-.701 1.563-1.563 1.563H6.392a1.565 1.565 0 0 1-1.564-1.563v-16.03a.923.923 0 1 0-1.846 0v16.03c0 1.88 1.53 3.409 3.41 3.409h50.216c1.88 0 3.41-1.53 3.41-3.409V30.146a.923.923 0 0 0-.924-.922z"></path><path fill="currentColor" d="M7.884 52.683h31.82c.51 0 .923-.413.923-.923V23.831c0-1.808.72-3.562 1.978-4.812.458-.456 1.005-1.14 1.005-1.813 0-1.053-1.504-2.77-4.862-4.23-3.887-1.69-9.338-2.66-14.954-2.66-5.617 0-11.068.97-14.954 2.66-3.36 1.46-4.862 3.176-4.862 4.23 0 .672.546 1.357 1.004 1.812 1.258 1.25 1.979 3.005 1.979 4.813v27.93c0 .509.413.922.923.922zm-1.6-34.973a2.802 2.802 0 0 1-.418-.506c.238-.391 1.208-1.448 3.71-2.536 3.663-1.592 8.845-2.506 14.218-2.506 5.372 0 10.555.914 14.218 2.506 2.501 1.088 3.471 2.145 3.71 2.537a2.805 2.805 0 0 1-.419.505c-1.603 1.594-2.522 3.825-2.522 6.121v27.006H8.806V23.831c0-2.296-.92-4.527-2.522-6.121z"></path><path fill="currentColor" d="M12.483 24.29a1.243 1.243 0 1 0 0-2.485 1.243 1.243 0 0 0 0 2.486zm0-4.971a1.243 1.243 0 1 0 0-2.486 1.243 1.243 0 0 0 0 2.486zm4.971 0a1.243 1.243 0 1 0 0-2.486 1.243 1.243 0 0 0 0 2.486z"></path></svg>
                        </span>
                        <div class="callto-action-03_content">
                            <h6 class="callto-action-03__title">custom bread</h6>
                            <p class="callto-action-03__text">Amet minim mollit non deserunt</p>
                        </div>
                    </a>
                    <!-- Single Call To Actio 03 End -->
                </div>
                <div class="col mb-30">
                    <!-- Single Call To Actio 03 Start -->
                    <a href="contact.html" class="callto-action-03">
                        <span class="callto-action-03_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" fill="none" viewBox="0 0 63 63"><g fill="currentColor"><path d="M17.063 49.875h-5.25a1.313 1.313 0 0 1 0-2.625h5.25a1.313 1.313 0 0 1 0 2.625zm42.657 0h-3.282a1.313 1.313 0 0 1 0-2.625h2.192l1.77-9.43c-.024-4.824-4.146-8.945-9.212-8.945H42.57L38.394 47.25h7.544a1.313 1.313 0 0 1 0 2.625H36.75a1.313 1.313 0 0 1-1.28-1.602l4.772-21a1.311 1.311 0 0 1 1.28-1.023h9.666c6.513 0 11.813 5.3 11.813 11.812l-1.993 10.742a1.309 1.309 0 0 1-1.289 1.07z"></path><path d="M51.188 55.125a6.57 6.57 0 0 1-6.563-6.563A6.57 6.57 0 0 1 51.188 42a6.57 6.57 0 0 1 6.562 6.562 6.57 6.57 0 0 1-6.563 6.563zm0-10.5a3.942 3.942 0 0 0-3.938 3.937 3.942 3.942 0 0 0 3.938 3.938 3.942 3.942 0 0 0 3.937-3.938 3.942 3.942 0 0 0-3.938-3.937zm-28.875 10.5a6.57 6.57 0 0 1-6.563-6.563A6.57 6.57 0 0 1 22.313 42a6.57 6.57 0 0 1 6.562 6.562 6.57 6.57 0 0 1-6.563 6.563zm0-10.5a3.942 3.942 0 0 0-3.938 3.937 3.942 3.942 0 0 0 3.938 3.938 3.942 3.942 0 0 0 3.937-3.938 3.942 3.942 0 0 0-3.938-3.937zm-5.25-18.375h-10.5a1.313 1.313 0 0 1 0-2.625h10.5a1.313 1.313 0 0 1 0 2.625zm0 7.875H3.938a1.313 1.313 0 0 1 0-2.625h13.124a1.313 1.313 0 0 1 0 2.625zm0 7.875H1.313a1.313 1.313 0 0 1 0-2.625h15.75a1.313 1.313 0 0 1 0 2.625z"></path><path d="M36.75 49.875h-9.188a1.313 1.313 0 0 1 0-2.625h8.14L41.668 21H11.812a1.313 1.313 0 0 1 0-2.625h31.5a1.313 1.313 0 0 1 1.282 1.601L38.03 48.851a1.314 1.314 0 0 1-1.281 1.024z"></path></g></svg>
                        </span>
                        <div class="callto-action-03_content">
                            <h6 class="callto-action-03__title">Bulk Delivery</h6>
                            <p class="callto-action-03__text">Amet minim mollit non deserunt</p>
                        </div>
                    </a>
                    <!-- Single Call To Actio 03 End -->
                </div>
                <div class="col mb-30">
                    <!-- Single Call To Actio 03 Start -->
                    <a href="contact.html" class="callto-action-03">
                        <span class="callto-action-03_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" fill="none" viewBox="0 0 63 63"><g fill="currentColor"><path d="M53.298 19.762l-2.958-3.588a3.175 3.175 0 0 1-.714-1.724l-.446-4.629a5.068 5.068 0 0 0-4.55-4.55L40 4.824a3.181 3.181 0 0 1-1.724-.714l-3.588-2.958a5.068 5.068 0 0 0-6.436 0L24.665 4.11a3.178 3.178 0 0 1-1.724.714l-4.629.445a5.069 5.069 0 0 0-4.55 4.551l-.446 4.63a3.182 3.182 0 0 1-.714 1.723l-2.958 3.588a5.068 5.068 0 0 0 0 6.436l2.958 3.588c.406.493.653 1.089.714 1.724l.445 4.63a5.069 5.069 0 0 0 4.551 4.55l2.83.272-6.723 16.065c-.182.438-.1.93.215 1.285.315.354.793.494 1.248.365l5.832-1.647a.053.053 0 0 1 .062.025l2.92 5.31a1.214 1.214 0 0 0 1.135.633 1.22 1.22 0 0 0 1.068-.75l7.098-16.962c.24-.138.472-.297.692-.478l3.589-2.958a3.173 3.173 0 0 1 1.578-.695l6.429 15.361-4.55-1.284a1.915 1.915 0 0 0-2.205.922l-2.278 4.142-3.018-7.212a.934.934 0 0 0-1.723.72l3.535 8.45c.185.435.593.72 1.066.744l.064.002c.447 0 .853-.239 1.07-.634l2.92-5.31a.054.054 0 0 1 .062-.026l5.832 1.647c.456.129.934-.011 1.249-.365.314-.355.397-.847.214-1.286L41.8 40.962l2.83-.273a5.068 5.068 0 0 0 4.55-4.55l.446-4.63c.06-.634.308-1.23.714-1.723l2.958-3.588a5.067 5.067 0 0 0 0-6.436zM25.69 60.296l-2.279-4.143a1.914 1.914 0 0 0-2.205-.921l-4.549 1.284 6.428-15.36a3.172 3.172 0 0 1 1.579.693l3.588 2.959a5.05 5.05 0 0 0 3.439 1.147L25.69 60.296zM51.856 25.01l-2.958 3.588a5.038 5.038 0 0 0-1.132 2.733l-.446 4.629a3.196 3.196 0 0 1-2.87 2.87l-4.066.392a.56.56 0 0 0-.048.004l-.515.05a5.04 5.04 0 0 0-2.733 1.132L33.5 43.366a3.196 3.196 0 0 1-4.059 0l-3.588-2.958a5.036 5.036 0 0 0-2.733-1.132l-.518-.05a.618.618 0 0 0-.042-.004l-4.07-.392a3.196 3.196 0 0 1-2.87-2.87l-.445-4.629a5.037 5.037 0 0 0-1.132-2.733l-2.958-3.588a3.196 3.196 0 0 1 0-4.06l2.958-3.588a5.037 5.037 0 0 0 1.132-2.733l.446-4.63a3.196 3.196 0 0 1 2.87-2.869l4.629-.446a5.04 5.04 0 0 0 2.733-1.132l3.588-2.957a3.186 3.186 0 0 1 2.03-.728c.72 0 1.44.243 2.029.728l3.588 2.957a5.037 5.037 0 0 0 2.733 1.132l4.63.446A3.196 3.196 0 0 1 47.32 10l.445 4.63a5.038 5.038 0 0 0 1.132 2.732l2.958 3.589a3.197 3.197 0 0 1 0 4.059z"></path><path d="M31.47 8.387c-.624 0-1.252.04-1.867.118a.934.934 0 0 0 .237 1.853 12.858 12.858 0 0 1 1.63-.103c7.017 0 12.726 5.709 12.726 12.726 0 7.017-5.71 12.725-12.726 12.725-7.017 0-12.726-5.709-12.726-12.726a12.75 12.75 0 0 1 7.519-11.615.934.934 0 1 0-.766-1.704 14.622 14.622 0 0 0-8.621 13.32c0 8.047 6.547 14.593 14.594 14.593s14.594-6.546 14.594-14.594c0-8.047-6.547-14.593-14.594-14.593z"></path><path d="M22.193 21.898a2.86 2.86 0 0 0 0 4.04l4.08 4.08a2.84 2.84 0 0 0 2.02.837 2.84 2.84 0 0 0 2.02-.837l8.907-8.907a2.86 2.86 0 0 0 0-4.04 2.86 2.86 0 0 0-4.04 0l-6.887 6.887-2.06-2.06a2.86 2.86 0 0 0-4.04 0zm6.1 4.316a.934.934 0 0 0 .66-.274l7.548-7.548A.99.99 0 0 1 37.9 19.79l-8.907 8.907a.982.982 0 0 1-.699.29.982.982 0 0 1-.699-.29l-4.08-4.08a.99.99 0 0 1 .699-1.687.98.98 0 0 1 .698.289l2.721 2.72a.935.935 0 0 0 .661.275z"></path></g></svg>
                        </span>
                        <div class="callto-action-03_content">
                            <h6 class="callto-action-03__title">Quality Standards</h6>
                            <p class="callto-action-03__text">Amet minim mollit non deserunt</p>
                        </div>
                    </a>
                    <!-- Single Call To Actio 03 End -->
                </div>
                <div class="col mb-30">
                    <!-- Single Call To Actio 03 Start -->
                    <a href="contact.html" class="callto-action-03">
                        <span class="callto-action-03_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" fill="none" viewBox="0 0 63 63"><g fill="currentColor"><path d="M17.063 49.875h-5.25a1.313 1.313 0 0 1 0-2.625h5.25a1.313 1.313 0 0 1 0 2.625zm42.657 0h-3.282a1.313 1.313 0 0 1 0-2.625h2.192l1.77-9.43c-.024-4.824-4.146-8.945-9.212-8.945H42.57L38.394 47.25h7.544a1.313 1.313 0 0 1 0 2.625H36.75a1.313 1.313 0 0 1-1.28-1.602l4.772-21a1.311 1.311 0 0 1 1.28-1.023h9.666c6.513 0 11.813 5.3 11.813 11.812l-1.993 10.742a1.309 1.309 0 0 1-1.289 1.07z"></path><path d="M51.188 55.125a6.57 6.57 0 0 1-6.563-6.563A6.57 6.57 0 0 1 51.188 42a6.57 6.57 0 0 1 6.562 6.562 6.57 6.57 0 0 1-6.563 6.563zm0-10.5a3.942 3.942 0 0 0-3.938 3.937 3.942 3.942 0 0 0 3.938 3.938 3.942 3.942 0 0 0 3.937-3.938 3.942 3.942 0 0 0-3.938-3.937zm-28.875 10.5a6.57 6.57 0 0 1-6.563-6.563A6.57 6.57 0 0 1 22.313 42a6.57 6.57 0 0 1 6.562 6.562 6.57 6.57 0 0 1-6.563 6.563zm0-10.5a3.942 3.942 0 0 0-3.938 3.937 3.942 3.942 0 0 0 3.938 3.938 3.942 3.942 0 0 0 3.937-3.938 3.942 3.942 0 0 0-3.938-3.937zm-5.25-18.375h-10.5a1.313 1.313 0 0 1 0-2.625h10.5a1.313 1.313 0 0 1 0 2.625zm0 7.875H3.938a1.313 1.313 0 0 1 0-2.625h13.124a1.313 1.313 0 0 1 0 2.625zm0 7.875H1.313a1.313 1.313 0 0 1 0-2.625h15.75a1.313 1.313 0 0 1 0 2.625z"></path><path d="M36.75 49.875h-9.188a1.313 1.313 0 0 1 0-2.625h8.14L41.668 21H11.812a1.313 1.313 0 0 1 0-2.625h31.5a1.313 1.313 0 0 1 1.282 1.601L38.03 48.851a1.314 1.314 0 0 1-1.281 1.024z"></path></g></svg>
                        </span>
                        <div class="callto-action-03_content">
                            <h6 class="callto-action-03__title">Fast Delivery</h6>
                            <p class="callto-action-03__text">Amet minim mollit non deserunt</p>
                        </div>
                    </a>
                    <!-- Single Call To Actio 03 End -->
                </div>
                <div class="col mb-30">
                    <!-- Single Call To Actio 03 Start -->
                    <a href="contact.html" class="callto-action-03">
                        <span class="callto-action-03_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" fill="none" viewBox="0 0 63 63"><g fill="currentColor"><path d="M31.5 60.375a1.32 1.32 0 0 1-1.005-.467L.307 24.053a1.312 1.312 0 0 1-.147-1.475l10.584-19.27c.231-.42.672-.683 1.15-.683h39.212c.48 0 .922.263 1.15.683l10.581 19.27c.263.475.203 1.06-.147 1.475L32.504 59.908a1.31 1.31 0 0 1-1.003.467zM2.898 23.05L31.5 57.026 60.102 23.05 50.33 5.25H12.671l-9.773 17.8z"></path><path d="M61.031 24.937H1.97a1.313 1.313 0 0 1 0-2.625h59.06a1.313 1.313 0 0 1 0 2.625z"></path><path d="M44.789 24.2c-.412 0-.82-.194-1.074-.56L31.506 6.23 19.452 23.548a1.31 1.31 0 0 1-1.824.328 1.309 1.309 0 0 1-.328-1.827L30.425 3.187a1.308 1.308 0 0 1 1.073-.562h.003c.428 0 .827.208 1.074.56l13.287 18.95a1.31 1.31 0 0 1-.32 1.826c-.226.16-.49.239-.753.239z"></path><path d="M31.5 60.375c-.556 0-1.05-.349-1.236-.871L10.658 4.379a1.315 1.315 0 0 1 .795-1.678 1.303 1.303 0 0 1 1.677.796l18.37 51.65 18.37-51.65a1.31 1.31 0 0 1 1.677-.796 1.31 1.31 0 0 1 .796 1.678L32.736 59.504c-.186.522-.68.871-1.236.871z"></path></g></svg>
                        </span>
                        <div class="callto-action-03_content">
                            <h6 class="callto-action-03__title">Premium Material</h6>
                            <p class="callto-action-03__text">Amet minim mollit non deserunt</p>
                        </div>
                    </a>
                    <!-- Single Call To Actio 03 End -->
                </div>
                <div class="col mb-30">
                    <!-- Single Call To Actio 03 Start -->
                    <a href="contact.html" class="callto-action-03">
                        <span class="callto-action-03_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" fill="none" viewBox="0 0 63 63"><path fill="currentColor" d="M39.206 6.34H23.794C10.45 6.34 0 11.111 0 17.205c0 1.636.732 3.194 2.177 4.634.512.508.806 1.234.806 1.992v9.07a.923.923 0 0 0 1.845 0v-9.07c0-1.246-.492-2.45-1.35-3.301-1.083-1.08-1.632-2.198-1.632-3.325 0-2.233 2.239-4.488 6.144-6.185 4.206-1.829 9.818-2.836 15.804-2.836 5.985 0 11.597 1.007 15.803 2.836 3.905 1.697 6.144 3.952 6.144 6.185 0 1.127-.55 2.246-1.632 3.324-.858.852-1.35 2.056-1.35 3.302v18.644a.923.923 0 1 0 1.846 0V23.832c0-.758.293-1.484.806-1.993 1.444-1.438 2.176-2.997 2.176-4.633 0-3.8-4.063-7.085-10.357-9.021h1.976c5.985 0 11.598 1.007 15.804 2.836 3.905 1.697 6.144 3.952 6.144 6.185 0 1.127-.55 2.246-1.632 3.324-.858.852-1.35 2.056-1.35 3.302v1.995a.923.923 0 0 0 1.845 0v-1.995c0-.758.294-1.484.806-1.993C62.269 20.4 63 18.842 63 17.206c0-6.094-10.451-10.867-23.794-10.867z"></path><path fill="currentColor" d="M59.094 29.224a.923.923 0 0 0-.923.922v23.106c0 .862-.701 1.563-1.563 1.563H44.223c.243-.468.381-1 .381-1.563v-6.457a.923.923 0 1 0-1.846 0v6.457c0 .862-.701 1.563-1.563 1.563H6.392a1.565 1.565 0 0 1-1.564-1.563v-16.03a.923.923 0 1 0-1.846 0v16.03c0 1.88 1.53 3.409 3.41 3.409h50.216c1.88 0 3.41-1.53 3.41-3.409V30.146a.923.923 0 0 0-.924-.922z"></path><path fill="currentColor" d="M7.884 52.683h31.82c.51 0 .923-.413.923-.923V23.831c0-1.808.72-3.562 1.978-4.812.458-.456 1.005-1.14 1.005-1.813 0-1.053-1.504-2.77-4.862-4.23-3.887-1.69-9.338-2.66-14.954-2.66-5.617 0-11.068.97-14.954 2.66-3.36 1.46-4.862 3.176-4.862 4.23 0 .672.546 1.357 1.004 1.812 1.258 1.25 1.979 3.005 1.979 4.813v27.93c0 .509.413.922.923.922zm-1.6-34.973a2.802 2.802 0 0 1-.418-.506c.238-.391 1.208-1.448 3.71-2.536 3.663-1.592 8.845-2.506 14.218-2.506 5.372 0 10.555.914 14.218 2.506 2.501 1.088 3.471 2.145 3.71 2.537a2.805 2.805 0 0 1-.419.505c-1.603 1.594-2.522 3.825-2.522 6.121v27.006H8.806V23.831c0-2.296-.92-4.527-2.522-6.121z"></path><path fill="currentColor" d="M12.483 24.29a1.243 1.243 0 1 0 0-2.485 1.243 1.243 0 0 0 0 2.486zm0-4.971a1.243 1.243 0 1 0 0-2.486 1.243 1.243 0 0 0 0 2.486zm4.971 0a1.243 1.243 0 1 0 0-2.486 1.243 1.243 0 0 0 0 2.486z"></path></svg>
                        </span>
                        <div class="callto-action-03_content">
                            <h6 class="callto-action-03__title">Special Taste</h6>
                            <p class="callto-action-03__text">Amet minim mollit non deserunt</p>
                        </div>
                    </a>
                    <!-- Single Call To Actio 03 End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action Three Section End -->

<div class="newsletter-three" data-bg-image="assets/images/bg/newsletter-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Title Strat -->
                <div class="section-title-07 text-start">
                    <span class="section-title-07__subtitle">We are bakerfresh</span>
                    <h5 class="section-title-07__title">newsletters & special offers</h5>
                </div>
                <!-- Section Title End -->
                <!-- Newsletter Section Strat -->
                <div class="newsletter-three__form">
                    <form action="#">
                        <input class="newsletter-three__field" type="text" placeholder="Your email address">
                        <button class="newsletter-three__btn"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="none" viewBox="0 0 44 16">
                                <path fill="currentColor" d="M43.707 8.707a1 1 0 0 0 0-1.414L37.343.929a1 1 0 1 0-1.414 1.414L41.586 8l-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364zM0 9h43V7H0v2z"></path>
                            </svg></button>
                    </form>
                </div>
                <!-- Newsletter Section End -->
            </div>
        </div>
    </div>

</div>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.labtn-icon-quickview').click(function(e){
                e.preventDefault();
                var productId = $(this).data('product-id');
                var modalBody = $('#quickViewModal'+productId).find('.modal-body');

                // Make AJAX request to fetch product details
                $.ajax({
                    url: '/product/' + productId, // Replace this with your API endpoint to fetch product details
                    method: 'GET',
                    success: function(response){
                        // Populate modal with product details
                        modalBody.html(`<div class="row">
                                        <div class="col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                                            <div class="product-details-img d-flex overflow-hidden flex-row">
                                                <div class="single-product-vertical-tab swiper-container order-2">

                                                    <div class="swiper-wrapper">
                                                        <a class="swiper-slide h-auto" href="#/">
                                                            <img class="w-100" src=${response.image} alt="Product">
                                                        </a>
                                                    </div>

                                                    <!-- Next Previous Button Start -->
                                                    <div class="swiper-button-vertical-next swiper-button-next"><i class="lastudioicon-arrow-right"></i></div>
                                                    <div class="swiper-button-vertical-prev swiper-button-prev"><i class="lastudioicon-arrow-left"></i></div>

                                                </div>
                                                <div class="product-thumb-vertical overflow-hidden swiper-container order-1">

                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <img src=${response.image} alt=${response.image}/>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product-summery position-relative">
                                                <div class="product-head mb-3">
                                                    <span class="product-head-price">₦${response.price}</span>

                                                </div>
                                                <p class="desc-content">${response.description}</p>
                                                <div class="product-color mb-2">
                                                    <label for="colorBy">Color</label>
                                                    <div class="select-wrapper">
                                                        <select name="color" id="colorBy">
                                                            <option value="manual">Choose an option</option>
                                                            <option value="blue">Blue</option>
                                                            <option value="red">Red</option>
                                                            <option value="green">Green</option>
                                                            <option value="black">Black</option>
                                                            <option value="yellow">Yellow</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <ul class="product-cta">
                                                    <li>
                                                        <div class="quantity">
                                                            <div class="cart-plus-minus"></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cart-btn">
                                                            <div class="add-to_cart">
                                                                <a class="btn btn-dark btn-hover-primary" href="/cakedetail/${response.id}" >More Option</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="actions">
                                                            <a href="#" title="Compare" class="action compare"><i class="lastudioicon-heart-2"></i></a>
                                                            <a href="#" title="Wishlist" class="action wishlist"><i class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="product-meta">
                                                    <li class="product-meta-wrapper">
                                                        <span class="product-meta-detail">${response.name}</span>
                                                    </li>
                                                    <li class="product-meta-wrapper">
                                                        <span class="product-meta-name">category:</span>
                                                        <span class="product-meta-detail">
                                            <a href="#">${response.category}, </a>
                                            <a href="#">New</a>
                                        </span>
                                                    </li>
                                                    <li class="product-meta-wrapper">
                                                        <span class="product-meta-name">Tags:</span>
                                                        <span class="product-meta-detail">
                                            <a href="#">Cake 1</a>
                                        </span>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>`
                        );
                        // Call functions to handle dynamic behavior
                        updateFlavourOptions();
                        handleTopperVisibility();
                        handleEkoCakesCard();
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                        modalBody.html('<p>Error loading product details.</p>');
                    }
                });
            });

            // Function to update flavor options based on selected layers
            function updateFlavourOptions() {
                const selectedLayers = parseInt($('#layersBy').val());

                // Disable all options first
                $('#flavourBy option').prop('disabled', true);

                // Enable options based on selected layers
                if (selectedLayers === 1) {
                    $('#flavourBy option[value="vanilla"]').prop('disabled', false);
                    $('#flavourBy option[value="chocolate"]').prop('disabled', false);
                } else if (selectedLayers === 2) {
                    $('#flavourBy option[value="vanilla_chocolate"]').prop('disabled', false);
                    $('#flavourBy option[value="vetuer"]').prop('disabled', false);
                } else if (selectedLayers === 3) {
                    $('#flavourBy option[value="red_vetuer_chocolate"]').prop('disabled', false);
                    $('#flavourBy option[value="vanilla_red_vetuer"]').prop('disabled', false);
                }
            }

            // Function to handle visibility of topper text input based on selected topper option
            function handleTopperVisibility() {
                const selectedTopper = $('#topperBy').val();
                if (selectedTopper === 'select') {
                    $('#topperTextSection').show();
                } else {
                    $('#topperTextSection').hide();
                    $('#topperText').val(''); // Clear the text input when not visible
                }
            }

            // Function to handle visibility of Eko Cakes card message input based on selected option
            function handleEkoCakesCard() {
                const selectedOption = $('#ekoCakesCard').val();
                if (selectedOption === 'yes') {
                    $('#ekoCakesMessageSection').show();
                } else {
                    $('#ekoCakesMessageSection').hide();
                    $('#ekoCakesMessage').val(''); // Clear the text input when not visible
                }
            }

            // Event listeners to call the functions when the user makes selections
            $('#layersBy').on('change', function() {
                updateFlavourOptions();
            });
            $('#topperBy').on('change', function() {
                handleTopperVisibility();
            });
            $('#ekoCakesCard').on('change', function() {
                handleEkoCakesCard();
            });
        });
    </script>
@endsection
