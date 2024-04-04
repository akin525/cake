@extends('layouts.header')
@section('tittle', 'All-Cake')
@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            window.onload = function() {
                setTimeout(function() {
                    {{--var username = @json(Auth::user()->username);--}}
                    var message = "Dear Ekosians, please note a minimum of 24 hours is required for all categories except the Ready to Go category. Cakes under the Ready to go Category can be available between 1-6 hours after order is placed";

                    Swal.fire({
                        title: 'Note:',
                        html: message,
                        icon: 'info'
                    });
                }, 1000);
            };
        </script>
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="{{asset('assets/images/bg/breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="rowdies-bold text-white">All Cake</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Cakes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <marquee><b>
            Dear Ekosians, please note a minimum of 24 hours is required for all categories except the Ready to Go category. Cakes under the Ready to go Category can be available between 1-6 hours after order is placed
        </b></marquee>
    <!-- Product Section Start -->
    <div class="shop-product-section sidebar-right overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-8 section-padding-04">

                    <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-sm-2 row-cols-1 mb-n50">
                        @forelse($product as $pro)
                        <div class="col mb-50">
                            <!-- Product Item Start -->
                            <div class="product-item text-center" style="border-radius: 50px; background-color: #ffffff; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);">
                                <div class="product-item__badge">Hot</div>
                                <div class="product-item__image border w-100">
                                    <a href="{{route('cakedetail', $pro['id'])}}"><img width="350" height="350" src="{{$pro['image']}}" alt="Product"></a>
                                    <ul class="product-item__meta">
                                        <li class="product-item__meta-action">
                                            <a class="shadow-1 labtn-icon-quickview" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Quick View" data-product-id="{{$pro['id']}}" data-bs-toggle="modal" data-bs-target="#quickViewModal{{$pro['id']}}"></a>
                                        </li>
{{--                                        <li class="product-item__meta-action">--}}
{{--                                            <a class="shadow-1 labtn-icon-cart" href="{{route('addcart1', $pro['id'])}}"></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="product-item__meta-action">--}}
{{--                                            <a class="shadow-1 labtn-icon-wishlist" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist" data-bs-toggle="modal" data-bs-target="#modalWishlist"></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="product-item__meta-action">--}}
{{--                                            <a class="shadow-1 labtn-icon-compare" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to compare" data-bs-toggle="modal" data-bs-target="#modalCompare"></a>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                                <div class="product-item__content pt-5">
                                    <h5 class="rowdies-bold" style="font-size: 18px"><a href="{{route('cakedetail', $pro['id'])}}">{{$pro['name']}}</a></h5>
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

                        @empty
                            <p class="text-center">No Product Available On Store</p>
                        @endforelse
                    </div>
                    <!-- Product Section End -->
                    <!-- Shop bottom Bar Start -->
                    <div class="shop-bottombar">
                        <ul class="pagination">
                            {{$product->links()}}

                        </ul>
                    </div>
                    <!-- Shop bottom Bar End -->
                </div>
                <div class="col-md-4">
                    <div class="sidebars">
                        <div class="sidebars_inner">

                            <!-- Search Widget Start -->
                            <form action="#" class="sidebars_search">
                                <input type="text" placeholder="Search Here" class="sidebars_search__input">
                                <button class="sidebars_search__btn">
                                    <i class="lastudioicon-zoom-1"></i>
                                </button>
                            </form>
                            <!-- Search Widget End -->

                            <!-- Category Widget Start -->
                            <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Category</h3>
                                <ul class="sidebars_widget__category">
                                    @foreach($category as $cat)
                                        <li><a href="{{url('category', $cat['name'])}}">{{$cat['name']}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Category Widget End -->

                            <!-- Popular Product Widget Start -->
                            <div class="sidebars_widget">
                                <h3 class="sidebars_widget__title">Popular products</h3>
                                <ul class="sidebars_widget__product">
                                    @foreach($pop as $pu)
                                    <!-- Single Product Start -->
                                    <li class="single-product">
                                        <a href="{{route('cakedetail', $pu['id'])}}" class="single-product_thumb">
                                            <img width="50" src="{{$pu['image']}}" alt="Sidebar-Image">
                                        </a>
                                        <div class="single-product_content">
                                            <a href="#" class="single-product_content__title">{{$pu['name']}}</a>
                                            <span class="single-product_content__price">₦{{number_format(intval($pu['price'] *1))}}</span>
                                        </div>
                                    </li>
                                        @endforeach

                                </ul>
                            </div>
                            <!-- Popular Product Widget End -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="faq">
        <div class="container custom-container">
            <div class="row" id="exampleOne">

                <div class="">
                    <div class="faq-head align-content-center">
                        <h4 class="faq-head__title text-center rowdies-bold" style="font-size: 20px">FREQUENTLY ASKED QUESTIONS</h4>
                        <span class="faq-head__border"></span>
                    </div>
                </div>
                <div class="">
                    <div class="accordion">
                        @foreach($fq as $fa)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$fa['id']}}" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="rowdies-regular" style="font-size: 18px">{{$fa['heading']}}</span>
                                        <i class="lastudioicon lastudioicon-down-arrow"></i>
                                    </button>
                                </h2>
                                <div id="collapse{{$fa['id']}}" class="accordion-collapse collapse" data-bs-parent="#exampleOne">
                                    <div class="accordion-body cormorant-upright-bold" style="font-size: 21px">{!! $fa['content'] !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Product Section End -->
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
                                                                <option value="manual">Chose an option</option>
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
                                                            <div class="cart-btn">
                                                                <div class="add-to_cart">
                                                                    <a class="btn btn-dark btn-hover-primary" href="/cakedetail/${response.id}">More Option</a>
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
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                        modalBody.html('<p>Error loading product details.</p>');
                    }
                });
            });
        });
    </script>
@endsection
