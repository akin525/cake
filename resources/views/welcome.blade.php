@extends('layouts.header')
@section('tittle', 'Home')
@section('content')
    <!-- Slider Section Strat -->
    <div class="custom-container-three container-fluid">
        <div class="container-three-inner">
            <div class="slider-section slider-active overflow-hidden">
                <div class="swiper">
                    <div class="swiper-wrapper">

                        <!-- Single Slider Start -->
                        <div class=" swiper-slide single-slider-05 animation-style-05" style="background-image: url(cake.jpg);  background-size: contain; background-position: center; background-repeat: no-repeat;">
                            <!-- Slider Content Start -->
                            <div class="slider-content-05">
{{--                                <h1 class="slider-content-05__title">Sweet classics.</h1>--}}
{{--                                <span class="slider-content-05__subtitle">Génial</span>--}}
                                <a class="slider-content-05__btn btn slider-btn-01" style="background-color: white" href="{{route('cakes')}}">Shop Now</a>
                            </div>
                            <!-- Slider Content Start -->
                        </div>
                        <!-- Single Slider End -->

                        <!-- Single Slider Start -->
                        <div class="swiper-slide single-slider-05 animation-style-05" style="background-image: url(cake.jpg);  background-size: contain; background-position: center; background-repeat: no-repeat;">
                            <!-- Slider Content Start -->
                            <div class="slider-content-05">
{{--                                <h1 class="slider-content-05__title">Eat it instead.</h1>--}}
{{--                                <span class="slider-content-05__subtitle">Génial</span>--}}
                                <a class="slider-content-05__btn btn slider-btn-01 " style="background-color: #ffffff " href="{{route('cakes')}}">Shop Now</a>
                            </div>
                            <!-- Slider Content Start -->
                        </div>
                        <!-- Single Slider End -->

                        <!-- Single Slider Start -->
                        <div class="swiper-slide single-slider-05 animation-style-05" style="background-image: url(cake.jpg);  background-size: contain; background-position: center; background-repeat: no-repeat;">
                            <!-- Slider Content Start -->
                            <div class="slider-content-05">
{{--                                <h1 class="slider-content-05__title">Let’s Get Baked!</h1>--}}
{{--                                <span class="slider-content-05__subtitle">Génial</span>--}}
                                <a class="slider-content-05__btn btn slider-btn-01" style="background-color: white" href="{{route('cakes')}}">Shop Now</a>
                            </div>
                            <!-- Slider Content Start -->
                        </div>
                        <!-- Single Slider End -->

                    </div>
                    <div class="slider-arrow-two">
                        <div class="swiper-button-next"><i class="lastudioicon-left-arrow"></i></div>
                        <div class="swiper-button-prev"><i class="lastudioicon-right-arrow"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>

    <br>
    @include('hot')
    <!-- Product Section Strat -->
    <div class="section-padding-01 bg-color-01" style="background-image: url({{asset('assets/images/bg-02.png')}});">
        <div class="container">

            <!-- Section Title Strat -->
            <div class="section-title-03 text-center max-width-720 mx-auto">
                <h2 class="section-title-03__title"><span>MAKING CAKE IS ART</span></h2>
                <p>PLEASE VIEW OUR PRODUCTS BELOW</p>

            </div>
            <!-- Section Title End -->

            <div class="row g-6 gy-xxl-16 gx-xxl-10">

                @forelse($product1 as $pro)
                <div class="col-lg-4 col-sm-6">
                    <!-- Product Item Start -->
                    <div class="product-item product-item-03 bg-white p-4 p-md-6 text-center">
                        <div class="product-item__image">
                            <a href="#">
                                <img width="310" height="310" src="{{url($pro['image'])}}" alt="Product">
                            </a>
                            <ul class="product-item__meta meta-middle">
                                <li class="product-item__meta-action"><a class="labtn-icon-quickview" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Quick View" data-product-id="{{$pro['id']}}" data-bs-toggle="modal" data-bs-target="#quickViewModal{{$pro['id']}}"></a></li>
{{--                                <li class="product-item__meta-action"><a class="labtn-icon-cart" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Select options" data-bs-toggle="modal" data-product-id="{{$pro['id']}}" data-bs-target="#modalCart1{{$pro['id']}}"></a></li>--}}
{{--                                <li class="product-item__meta-action"><a class="labtn-icon-wishlist" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist" data-bs-toggle="modal" data-bs-target="#modalWishlist"></a></li>--}}
{{--                                <li class="product-item__meta-action"><a class="labtn-icon-compare" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to compare" data-bs-toggle="modal" data-bs-target="#modalCompare"></a></li>--}}
                            </ul>
                        </div>
                        <div class="product-item__content px-0 pt-9 pb-4 px-0">
                            <h5 class="product-item__title fs-5"><a href="{{route('cakedetail', $pro['id'])}}">{{$pro['name']}}</a></h5>
                            <div class="product-item__rating">
                                <div class="product-item__star-rating" style="width: 100%;"></div>
                            </div>
                            <span class="product-item__price fs-4">₦{{number_format(intval($pro['price'] *1))}}</span>
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

        </div>
    </div>
    <!-- Product Section End -->

    <!-- Features Section Strat -->
    <div class="features-section section-padding-01">
        <div class="container custom-container">
            <div class="row gy-6">
                <div class="col-md-4 col-sm-6">
                    <!-- Features Card Item Start -->
                    <div class="features-card-item-02 text-center">
                        <div class="features-card-item-02__icon">
                            <div class="svg-icon mx-auto" style="background-image: url(assets/images/shape/shape-03.png);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" fill="none" viewBox="0 0 40 41">
                                    <path fill="currentColor" d="M36.85 17.731c-.383-.354-.965-.888-1.036-1.152-.08-.299.148-1.049.316-1.597.345-1.133.737-2.419.082-3.546-.663-1.14-1.983-1.44-3.147-1.703-.551-.125-1.306-.296-1.513-.503-.208-.207-.378-.963-.504-1.514-.264-1.165-.562-2.485-1.704-3.147a2.743 2.743 0 0 0-1.393-.351c-.727 0-1.452.22-2.152.434-.532.162-1.082.33-1.447.33a.582.582 0 0 1-.149-.015c-.266-.072-.8-.652-1.153-1.036-.818-.889-1.745-1.895-3.088-1.9h-.007c-1.34 0-2.268 1-3.087 1.884-.353.381-.887.957-1.148 1.026a.603.603 0 0 1-.143.014c-.364 0-.915-.172-1.448-.338-.705-.22-1.433-.446-2.163-.446a2.72 2.72 0 0 0-1.377.345c-1.144.659-1.443 1.98-1.706 3.145-.124.549-.294 1.302-.5 1.507-.203.203-.955.373-1.504.497-1.165.264-2.486.563-3.145 1.706-.652 1.129-.252 2.41.1 3.542.17.546.404 1.292.326 1.588-.069.26-.645.795-1.025 1.147-.841.78-1.888 1.75-1.884 3.096.003 1.343 1.01 2.27 1.899 3.087.384.354.964.888 1.036 1.153.08.298-.149 1.048-.316 1.595-.345 1.135-.738 2.421-.082 3.55.662 1.14 1.982 1.438 3.146 1.702.551.125 1.307.296 1.513.503.209.208.38.963.504 1.514.264 1.165.563 2.486 1.704 3.147.401.234.871.352 1.394.352.726 0 1.452-.221 2.153-.435.532-.163 1.083-.33 1.448-.33.082 0 .129.01.149.015.263.07.798.652 1.152 1.036.817.889 1.743 1.896 3.088 1.898 1.347 0 2.276-1.001 3.094-1.883.353-.381.887-.957 1.149-1.027a.578.578 0 0 1 .14-.014c.363 0 .915.172 1.448.339.705.22 1.434.448 2.165.448.515 0 .977-.116 1.375-.346 1.144-.66 1.443-1.981 1.706-3.145.124-.55.294-1.302.5-1.507.204-.203.956-.375 1.506-.498 1.164-.264 2.485-.562 3.143-1.706.651-1.129.252-2.41-.1-3.54-.17-.546-.403-1.293-.325-1.591.07-.26.645-.794 1.026-1.147.841-.78 1.888-1.75 1.885-3.094-.005-1.344-1.012-2.27-1.9-3.089zm-2.219 7.01c-.37 1.394 1.253 3.608.55 4.827-.713 1.238-3.447.943-4.451 1.946-1.003 1.002-.708 3.737-1.945 4.452a1.486 1.486 0 0 1-.75.178c-1.086 0-2.512-.786-3.614-.786-.161 0-.315.016-.46.055-1.345.356-2.46 2.868-3.917 2.868h-.004c-1.462-.003-2.567-2.527-3.917-2.892a1.828 1.828 0 0 0-.474-.057c-1.1-.001-2.517.765-3.601.765-.283 0-.542-.052-.768-.183-1.239-.72-.943-3.456-1.95-4.464-1.006-1.007-3.744-.712-4.463-1.95-.71-1.223.9-3.447.524-4.842-.363-1.349-2.888-2.456-2.891-3.917-.005-1.461 2.512-2.574 2.867-3.92.369-1.392-1.254-3.607-.55-4.826.712-1.237 3.447-.942 4.45-1.944 1.003-1.004.708-3.74 1.945-4.452.222-.128.477-.178.754-.178 1.085 0 2.508.783 3.61.783.162 0 .317-.016.463-.055 1.344-.354 2.458-2.868 3.916-2.868h.003c1.463.005 2.568 2.528 3.918 2.892.15.04.31.058.476.058 1.099 0 2.515-.764 3.599-.764.282 0 .541.052.767.182 1.24.72.943 3.457 1.95 4.465 1.008 1.006 3.744.71 4.464 1.95.71 1.221-.9 3.447-.523 4.84.364 1.35 2.888 2.457 2.892 3.92.003 1.458-2.514 2.573-2.87 3.917z"></path>
                                    <path fill="currentColor" d="M27.574 28.073a11.615 11.615 0 0 1-4.82 1.914c-1.693.25-3.424.127-5.034-.375-1.613-.492-3.086-1.355-4.35-2.465-1.258-1.106-2.317-2.483-2.972-4.11-.656-1.615-.895-3.468-.556-5.252.326-1.787 1.223-3.468 2.498-4.766 1.266-1.292 2.951-2.117 4.688-2.273a7.883 7.883 0 0 1 4.863 1.094c.69.417 1.317.931 1.86 1.527a5.773 5.773 0 0 1 1.169 1.972 5.62 5.62 0 0 1-.294 4.336 5.72 5.72 0 0 1-1.347 1.707c-.48.398-1.11.73-1.76.859-1.312.308-2.764-.086-3.775-1.045-.93-.838-1.257-2.378-.67-3.636a3.37 3.37 0 0 1 .593-.883c.217-.24.48-.436.774-.572a2.793 2.793 0 0 1 2.077-.091c.357.13.686.326.969.58.269.239.492.57.62.94.27.74.162 1.675-.385 2.41l.222.221c.817-.604 1.317-1.716 1.182-2.843a3.44 3.44 0 0 0-.617-1.602 4.158 4.158 0 0 0-1.275-1.154 4.432 4.432 0 0 0-3.477-.437 4.595 4.595 0 0 0-1.67.87c-.463.38-.86.834-1.177 1.343a5.747 5.747 0 0 0-.857 3.533A5.938 5.938 0 0 0 15.53 23.3c.797.912 1.86 1.598 3.022 1.99a7.16 7.16 0 0 0 3.643.232c1.214-.254 2.35-.785 3.307-1.638a8.267 8.267 0 0 0 2.059-2.83 8.524 8.524 0 0 0 .078-6.774c-.887-2.15-2.675-3.748-4.652-4.609-1.993-.881-4.233-1.01-6.247-.5a10.108 10.108 0 0 0-5.13 3.167 13.014 13.014 0 0 0-2.816 5.202c-.532 1.924-.65 4.003-.222 6.04.425 2.027 1.423 4.004 2.925 5.524 2.987 3.081 7.675 4.263 11.74 3.212a11.765 11.765 0 0 0 5.369-3 11.983 11.983 0 0 0 3.083-5.042l-.28-.14c-1.09 1.568-2.36 2.93-3.835 3.94z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="features-card-item-02__content mx-auto">
                            <h4 class="features-card-item-02__title">Affordable Cakes</h4>
                            <p>Our cakes are affordable, delicious and excellent.</p>
                        </div>
                    </div>
                    <!-- Features Card Item End -->
                </div>
                <div class="col-md-4 col-sm-6">
                    <!-- Features Card Item Start -->
                    <div class="features-card-item-02 text-center">
                        <div class="features-card-item-02__icon">
                            <div class="svg-icon mx-auto" style="background-image: url(assets/images/shape/shape-04.png);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" fill="none" viewBox="0 0 40 41">
                                    <path fill="currentColor" d="M33.75 14.531c0-.172-.009-.342-.026-.51-.27-7-6.034-12.615-13.099-12.615h-1.25c-7.065 0-12.828 5.615-13.1 12.615a5.107 5.107 0 0 0-.025.51c0 .065.01.128.03.19l4.345 13.658v6.152c0 .225.12.431.315.543l8.75 5a.624.624 0 0 0 .62 0l8.75-5a.624.624 0 0 0 .315-.543V28.38l4.346-13.658a.627.627 0 0 0 .029-.19zm-5.361 12.824l-5.616-3.209 2.21-9.473a.628.628 0 0 0 .017-.142 3.754 3.754 0 0 1 3.75-3.75c2.04 0 3.7 1.638 3.746 3.666l-4.107 12.908zm-4.639 4.503l1.25-.714v1.751l-1.25.625v-1.662zm-2.816.17l1.543-6.612 5.013 2.865-6.556 3.747zm-9.323-4.673L7.504 14.447a3.752 3.752 0 0 1 3.746-3.666 3.754 3.754 0 0 1 3.75 3.75c0 .048.006.096.016.142l2.21 9.473-5.615 3.209zm7.045-2.586L20 24.001l1.344.768L20 30.531l-1.344-5.762zm1.969-1.85V10.837a3.753 3.753 0 0 1 3.124 3.625l-2.108 9.037-1.016-.58zm-1.25 0l-1.016.58-2.108-9.036a3.753 3.753 0 0 1 3.124-3.625v12.08zm-1.852 2.497l1.543 6.612-6.556-3.747 5.013-2.865zm1.852-22.76h1.25c5.164 0 9.559 3.32 11.19 7.933A4.972 4.972 0 0 0 28.75 9.53a5.004 5.004 0 0 0-4.375 2.582A5.004 5.004 0 0 0 20 9.53a5.003 5.003 0 0 0-4.375 2.585A5.003 5.003 0 0 0 11.25 9.53a4.972 4.972 0 0 0-3.064 1.058c1.63-4.613 6.025-7.933 11.189-7.933zm-7.5 26.702l7.5 4.286v4.81l-7.5-4.285v-4.81zm8.75 9.096v-4.81l1.875-1.072v1.96a.627.627 0 0 0 .904.559l2.5-1.25a.626.626 0 0 0 .346-.56V30.43l1.875-1.07v4.81l-7.5 4.285z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="features-card-item-02__content mx-auto">
                            <h4 class="features-card-item-02__title">Free Fireworks!</h4>
                            <p>We always add free fireworks to any cake you order from us.</p>
                        </div>
                    </div>
                    <!-- Features Card Item End -->
                </div>
                <div class="col-md-4 col-sm-6">
                    <!-- Features Card Item Start -->
                    <div class="features-card-item-02 text-center">
                        <div class="features-card-item-02__icon">
                            <div class="svg-icon mx-auto" style="background-image: url(assets/images/shape/shape-05.png);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" fill="none" viewBox="0 0 40 41">
                                    <path fill="currentColor" d="M36.85 17.731c-.383-.354-.965-.888-1.036-1.152-.08-.299.148-1.049.316-1.597.345-1.133.737-2.419.082-3.546-.663-1.14-1.983-1.44-3.147-1.703-.551-.125-1.306-.296-1.513-.503-.208-.207-.378-.963-.504-1.514-.264-1.165-.562-2.485-1.704-3.147a2.743 2.743 0 0 0-1.393-.351c-.727 0-1.452.22-2.152.434-.532.162-1.082.33-1.447.33a.582.582 0 0 1-.149-.015c-.266-.072-.8-.652-1.153-1.036-.818-.889-1.745-1.895-3.088-1.9h-.007c-1.34 0-2.268 1-3.087 1.884-.353.381-.887.957-1.148 1.026a.603.603 0 0 1-.143.014c-.364 0-.915-.172-1.448-.338-.705-.22-1.433-.446-2.163-.446a2.72 2.72 0 0 0-1.377.345c-1.144.659-1.443 1.98-1.706 3.145-.124.549-.294 1.302-.5 1.507-.203.203-.955.373-1.504.497-1.165.264-2.486.563-3.145 1.706-.652 1.129-.252 2.41.1 3.542.17.546.404 1.292.326 1.588-.069.26-.645.795-1.025 1.147-.841.78-1.888 1.75-1.884 3.096.003 1.343 1.01 2.27 1.899 3.087.384.354.964.888 1.036 1.153.08.298-.149 1.048-.316 1.595-.345 1.135-.738 2.421-.082 3.55.662 1.14 1.982 1.438 3.146 1.702.551.125 1.307.296 1.513.503.209.208.38.963.504 1.514.264 1.165.563 2.486 1.704 3.147.401.234.871.352 1.394.352.726 0 1.452-.221 2.153-.435.532-.163 1.083-.33 1.448-.33.082 0 .129.01.149.015.263.07.798.652 1.152 1.036.817.889 1.743 1.896 3.088 1.898 1.347 0 2.276-1.001 3.094-1.883.353-.381.887-.957 1.149-1.027a.578.578 0 0 1 .14-.014c.363 0 .915.172 1.448.339.705.22 1.434.448 2.165.448.515 0 .977-.116 1.375-.346 1.144-.66 1.443-1.981 1.706-3.145.124-.55.294-1.302.5-1.507.204-.203.956-.375 1.506-.498 1.164-.264 2.485-.562 3.143-1.706.651-1.129.252-2.41-.1-3.54-.17-.546-.403-1.293-.325-1.591.07-.26.645-.794 1.026-1.147.841-.78 1.888-1.75 1.885-3.094-.005-1.344-1.012-2.27-1.9-3.089zm-2.219 7.01c-.37 1.394 1.253 3.608.55 4.827-.713 1.238-3.447.943-4.451 1.946-1.003 1.002-.708 3.737-1.945 4.452a1.486 1.486 0 0 1-.75.178c-1.086 0-2.512-.786-3.614-.786-.161 0-.315.016-.46.055-1.345.356-2.46 2.868-3.917 2.868h-.004c-1.462-.003-2.567-2.527-3.917-2.892a1.828 1.828 0 0 0-.474-.057c-1.1-.001-2.517.765-3.601.765-.283 0-.542-.052-.768-.183-1.239-.72-.943-3.456-1.95-4.464-1.006-1.007-3.744-.712-4.463-1.95-.71-1.223.9-3.447.524-4.842-.363-1.349-2.888-2.456-2.891-3.917-.005-1.461 2.512-2.574 2.867-3.92.369-1.392-1.254-3.607-.55-4.826.712-1.237 3.447-.942 4.45-1.944 1.003-1.004.708-3.74 1.945-4.452.222-.128.477-.178.754-.178 1.085 0 2.508.783 3.61.783.162 0 .317-.016.463-.055 1.344-.354 2.458-2.868 3.916-2.868h.003c1.463.005 2.568 2.528 3.918 2.892.15.04.31.058.476.058 1.099 0 2.515-.764 3.599-.764.282 0 .541.052.767.182 1.24.72.943 3.457 1.95 4.465 1.008 1.006 3.744.71 4.464 1.95.71 1.221-.9 3.447-.523 4.84.364 1.35 2.888 2.457 2.892 3.92.003 1.458-2.514 2.573-2.87 3.917z"></path>
                                    <path fill="currentColor" d="M27.574 28.073a11.615 11.615 0 0 1-4.82 1.914c-1.693.25-3.424.127-5.034-.375-1.613-.492-3.086-1.355-4.35-2.465-1.258-1.106-2.317-2.483-2.972-4.11-.656-1.615-.895-3.468-.556-5.252.326-1.787 1.223-3.468 2.498-4.766 1.266-1.292 2.951-2.117 4.688-2.273a7.883 7.883 0 0 1 4.863 1.094c.69.417 1.317.931 1.86 1.527a5.773 5.773 0 0 1 1.169 1.972 5.62 5.62 0 0 1-.294 4.336 5.72 5.72 0 0 1-1.347 1.707c-.48.398-1.11.73-1.76.859-1.312.308-2.764-.086-3.775-1.045-.93-.838-1.257-2.378-.67-3.636a3.37 3.37 0 0 1 .593-.883c.217-.24.48-.436.774-.572a2.793 2.793 0 0 1 2.077-.091c.357.13.686.326.969.58.269.239.492.57.62.94.27.74.162 1.675-.385 2.41l.222.221c.817-.604 1.317-1.716 1.182-2.843a3.44 3.44 0 0 0-.617-1.602 4.158 4.158 0 0 0-1.275-1.154 4.432 4.432 0 0 0-3.477-.437 4.595 4.595 0 0 0-1.67.87c-.463.38-.86.834-1.177 1.343a5.747 5.747 0 0 0-.857 3.533A5.938 5.938 0 0 0 15.53 23.3c.797.912 1.86 1.598 3.022 1.99a7.16 7.16 0 0 0 3.643.232c1.214-.254 2.35-.785 3.307-1.638a8.267 8.267 0 0 0 2.059-2.83 8.524 8.524 0 0 0 .078-6.774c-.887-2.15-2.675-3.748-4.652-4.609-1.993-.881-4.233-1.01-6.247-.5a10.108 10.108 0 0 0-5.13 3.167 13.014 13.014 0 0 0-2.816 5.202c-.532 1.924-.65 4.003-.222 6.04.425 2.027 1.423 4.004 2.925 5.524 2.987 3.081 7.675 4.263 11.74 3.212a11.765 11.765 0 0 0 5.369-3 11.983 11.983 0 0 0 3.083-5.042l-.28-.14c-1.09 1.568-2.36 2.93-3.835 3.94z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="features-card-item-02__content mx-auto">
                            <h4 class="features-card-item-02__title">Fastest Free Shipping</h4>
                            <p>We deliver even at the shortest notice</p>
                        </div>
                    </div>
                    <!-- Features Card Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section End -->

    <!-- Newsletter Section Strat -->
    <div class="newsletter-section" style="background-image: url(assets/images/newsletter-bg.jpg);">
        <div class="container">

            <!-- Newsletter Section Strat -->
            <div class="newsletter text-center">
                <h2 class="newsletter__title text-white">Stay in touch & get 10% off</h2>

                <div class="newsletter__form">
                    <form action="#">
                        <input class="newsletter__field" type="text" placeholder="Your email address">
                        <button class="newsletter__btn">Subscribe</button>
                    </form>
                </div>
            </div>
            <!-- Newsletter Section End -->

        </div>
    </div>
    <!-- Newsletter Section End -->

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


    {{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('.labtn-icon-quickview').click(function(e){--}}
{{--                e.preventDefault();--}}
{{--                var productId = $(this).data('product-id');--}}
{{--                var modalBody = $('#quickViewModal'+productId).find('.modal-body');--}}

{{--                // Make AJAX request to fetch product details--}}
{{--                $.ajax({--}}
{{--                    url: '/product/' + productId, // Replace this with your API endpoint to fetch product details--}}
{{--                    method: 'GET',--}}
{{--                    success: function(response){--}}
{{--                        // Populate modal with product details--}}
{{--                        modalBody.html(`<div class="row">--}}
{{--                                            <div class="col-lg-6 offset-lg-0 col-md-10 offset-md-1">--}}
{{--                                                <div class="product-details-img d-flex overflow-hidden flex-row">--}}
{{--                                                    <div class="single-product-vertical-tab swiper-container order-2">--}}

{{--                                                        <div class="swiper-wrapper">--}}
{{--                                                            <a class="swiper-slide h-auto" href="#/">--}}
{{--                                                                <img class="w-100" src=${response.image} alt="Product">--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}

{{--                                                        <!-- Next Previous Button Start -->--}}
{{--                                                        <div class="swiper-button-vertical-next swiper-button-next"><i class="lastudioicon-arrow-right"></i></div>--}}
{{--                                                        <div class="swiper-button-vertical-prev swiper-button-prev"><i class="lastudioicon-arrow-left"></i></div>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="product-thumb-vertical overflow-hidden swiper-container order-1">--}}

{{--                                                        <div class="swiper-wrapper">--}}
{{--                                                            <div class="swiper-slide">--}}
{{--                                                                <img src=${response.image} alt=${response.image}/>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}

{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="col-lg-6">--}}
{{--                                                <div class="product-summery position-relative">--}}
{{--                                                    <div class="product-head mb-3">--}}
{{--                                                        <span class="product-head-price">₦${response.price}</span>--}}

{{--                                                    </div>--}}
{{--                                                    <p class="desc-content">${response.description}</p>--}}
{{--                                                    <div class="product-color mb-2">--}}
{{--                                                        <label for="colorBy">Color</label>--}}
{{--                                                        <div class="select-wrapper">--}}
{{--                                                            <select name="color" id="colorBy">--}}
{{--                                                                <option value="manual">Chose an option</option>--}}
{{--                                                                <option value="blue">Blue</option>--}}
{{--                                                                <option value="red">Red</option>--}}
{{--                                                                <option value="green">Green</option>--}}
{{--                                                                <option value="black">Black</option>--}}
{{--                                                                <option value="yellow">Yellow</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div><div class="product-color mb-2">--}}
{{--                                                        <label for="colorBy">Flavour</label>--}}
{{--                                                        <div class="select-wrapper">--}}
{{--                                                            <select name="Flavour" id="colorBy">--}}
{{--                                                                <option value="manual">Chose an option</option>--}}
{{--                                                                <option value="blue">Vanilla Only</option>--}}
{{--                                                                <option value="red">Chocolate Only</option>--}}
{{--                                                                <option value="green">Vanilla & Chogolate</option>--}}
{{--                                                                <option value="black">Vetuer Only</option>--}}
{{--                                                                <option value="yellow">Red Vetuer & Chocolate</option>--}}
{{--                                                                <option value="yellow">Vanilla & Red Vetuer</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="product-color mb-2">--}}
{{--<label >Text to Appear on the Cake</label>--}}
{{--<input type="text" name="message" class="form-control" />--}}
{{--</div>--}}
{{--                                                    <div class="product-size mb-5">--}}
{{--                                                        <label for="sizeBy">Size</label>--}}
{{--                                                        <div class="select-wrapper">--}}
{{--                                                            <select name="size" id="sizeBy">--}}
{{--                                                                <option value="manual">Chose an option</option>--}}
{{--                                                                <option value="large">Large</option>--}}
{{--                                                                <option value="medium">Medium</option>--}}
{{--                                                                <option value="small">Small</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div> <div class="product-size mb-5">--}}
{{--                                                        <label for="sizeBy">Layers</label>--}}
{{--                                                        <div class="select-wrapper">--}}
{{--                                                            <select name="size" id="sizeBy">--}}
{{--                                                                <option value="manual">Chose an option</option>--}}
{{--                                                                <option value="large">Layer 1</option>--}}
{{--                                                                <option value="medium">Layer 2</option>--}}
{{--                                                                <option value="small">Layer 3</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <ul class="product-cta">--}}
{{--                                                        <li>--}}
{{--                                                            <div class="quantity">--}}
{{--                                                                <div class="cart-plus-minus"></div>--}}
{{--                                                            </div>--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            <div class="cart-btn">--}}
{{--                                                                <div class="add-to_cart">--}}
{{--                                                                    <a class="btn btn-dark btn-hover-primary" href="/addcart1/${response.id}" >Add to cart</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--                                                            <div class="actions">--}}
{{--                                                                <a href="#" title="Compare" class="action compare"><i class="lastudioicon-heart-2"></i></a>--}}
{{--                                                                <a href="#" title="Wishlist" class="action wishlist"><i class="lastudioicon-ic_compare_arrows_24px"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                    <ul class="product-meta">--}}
{{--                                                        <li class="product-meta-wrapper">--}}
{{--                                                            <span class="product-meta-detail">${response.name}</span>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="product-meta-wrapper">--}}
{{--                                                            <span class="product-meta-name">category:</span>--}}
{{--                                                            <span class="product-meta-detail">--}}
{{--                                            <a href="#">${response.category}, </a>--}}
{{--                                            <a href="#">New</a>--}}
{{--                                        </span>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="product-meta-wrapper">--}}
{{--                                                            <span class="product-meta-name">Tags:</span>--}}
{{--                                                            <span class="product-meta-detail">--}}
{{--                                            <a href="#">Cake 1</a>--}}
{{--                                        </span>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>`--}}
{{--                        );--}}
{{--                    },--}}
{{--                    error: function(xhr, status, error){--}}
{{--                        console.error(error);--}}
{{--                        modalBody.html('<p>Error loading product details.</p>');--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

    <script>
        $(document).ready(function(){
            $('.labtn-icon-cart').click(function(e){
                e.preventDefault();
                var productId = $(this).data('product-id');
                var modalBody = $('#modalCart1'+productId).find('.modal-body');

                // Make AJAX request to fetch product details
                $.ajax({
                    url: '/addcart/' + productId, // Replace this with your API endpoint to fetch product details
                    method: 'GET',
                    success: function(response){
                        // Populate modal with product details
                        modalBody.html(`
                                <i class="dlicon files_check"></i> ${response.message}
                    `);
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                        modalBody.html('<p>Please Kindly Login/Register.</p>');
                    }
                });
            });
        });
    </script>

@endsection
