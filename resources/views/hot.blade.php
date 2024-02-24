<!-- Product Section Start -->
<div class="section-padding-03 custom-container-four pt-0">
    <div class="product-row">
        <div class="product-wrapper ps-md-5 ps-lg-6 ps-xl-8 ps-xxl-11 order-2 ">
            <!-- Section Title Strat -->
            <div class="section-title-05">
                <h5 class="section-title-05__title"><span>What’s Hot</span></h5>
                <a href="{{route('cakes')}}" class="read-more"><span>show more</span><i class="lastudioicon lastudioicon-right-arrow"></i></a>
            </div>
            <!-- Section Title End -->

            <div class="product-active-three">
                <div class="swiper">
                    <div class="swiper-wrapper">

                        <!-- swiper-slide start -->
                        @forelse($hot as $hots)
                        <div class="swiper-slide">
                            <!-- Product Item Start -->
                            <div class="product-item product-item-05 border text-center">
                                <div class="product-item__image">
                                    <a href="{{route('cakes')}}"><img width="250" height="250" src="{{url($hots['image'])}}" alt="Product"></a>
                                </div>
                                <div class="product-item__content">
                                    <h5 class="product-item__title"><a href="{{route('cakedetail', $hots['id'])}}">{{$hots['name']}}</a></h5>
                                    <span class="product-item__price">₦{{number_format(intval($hots['price'] *1))}}</span>
                                </div>
                                <ul class="product-item__meta">
{{--                                    <li class="product-item__meta-action"><a class="labtn-icon-quickview" href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View" data-product-id="{{$hots['id']}}" data-bs-toggle="modal" data-bs-target="#quickViewModal{{$hots['id']}}"></a></li>--}}
                                    <li class="product-item__meta-action"><a class="labtn-icon-cart" href="{{route('addcart1', $hots['id'])}}"></a></li>
                                    <li class="product-item__meta-action"><a class="labtn-icon-wishlist" href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist" data-bs-toggle="modal" data-bs-target="#modalWishlist"></a></li>
                                    <li class="product-item__meta-action"><a class="labtn-icon-compare" href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to compare" aria-label="Add to compare" data-bs-toggle="modal" data-bs-target="#modalCompare"></a></li>
                                </ul>
                            </div>
                            <!-- Product Item End -->
                        </div>
                        <!-- swiper-slide end-->
{{--                            <div class="quickview-product-modal modal fade" id="quickViewModal{{$hots['id']}}" tabindex="-1" aria-labelledby="quickViewModalLabel{{$hots['id']}}" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered mw-100">--}}
{{--                                    <div class="container">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                                                <i class="lastudioicon lastudioicon-e-remove"></i>--}}
{{--                                            </button>--}}
{{--                                            <div class="modal-body">--}}


{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        @empty
                            <p class="text-center">No Product Available On Store</p>
                        @endforelse
                    </div>
                </div>
                <div class="swiper-button-next"><i class="lastudioicon-arrow-right"></i></div>
                <div class="swiper-button-prev"><i class="lastudioicon-arrow-left"></i></div>
            </div>

        </div>
        <div class="boxbanner-wrapper order-1">
            <!-- Ad Banner Start -->
            <a href="{{route('cakes')}}" class="boxbanner-bg boxbanner" data-bg-image="{{asset('ca.jpeg')}}">
                <div class="boxbanner-two">
                    <span class="boxbanner-title">a new cookie</span>
                    <span class="boxbanner-discount-two">from Eko-Cake</span>
                </div>
                <div class="boxbanner-btn-area">
                    <span class="boxbanner-btn">Store Location <i class="lastudioicon lastudioicon-right-arrow"></i></span>
                </div>
            </a>
            <!-- Ad Banner End -->
        </div>
    </div>
</div>
<!-- Product Section End -->
