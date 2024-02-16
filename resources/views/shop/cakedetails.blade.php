@extends('layouts.header')
@section('tittle')
    @if($product != null)
    {{$product->name}}
    @endif
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="{{asset('assets/images/bg/breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Product Details</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>
                                @if($product != null)
                                {{$product->name}}
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Single Product Section Start -->
    @isset($product)
    <div class="section section-margin-top section-padding-03">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 offset-lg-0 col-md-10 offset-md-1">

                    <!-- Product Details Image Start -->
                    <div class="product-details-img d-flex overflow-hidden flex-row">

                        <!-- Single Product Image Start -->
                        <div class="single-product-vertical-tab swiper-container order-2">

                            <div class="swiper-wrapper popup-gallery" id="popup-gallery">
                                <a class="swiper-slide h-auto" href="{{url($product->image)}}">
                                    <img class="w-100" src="{{url($product->image)}}" alt="Product">
                                </a>
                            </div>

                            <!-- Swiper Pagination Start -->
                            <!-- <div class="swiper-pagination d-none"></div> -->
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <div class="swiper-button-vertical-next swiper-button-next"><i class="lastudioicon-arrow-right"></i></div>
                            <div class="swiper-button-vertical-prev swiper-button-prev"><i class="lastudioicon-arrow-left"></i></div>
                            <!-- Next Previous Button End -->

                        </div>
                        <!-- Single Product Image End -->

                        <!-- Single Product Thumb Start -->
                        <div class="product-thumb-vertical overflow-hidden swiper-container order-1">

                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{url($product->image)}}" alt="Product">
                                </div>
                            </div>

                            <!-- Swiper Pagination Start -->
                            <!-- <div class="swiper-pagination d-none"></div> -->
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <!--
                                <div class="swiper-button-vertical-next  swiper-button-next"><i class="lastudioicon-right-arrow"></i></div>
                                <div class="swiper-button-vertical-prev swiper-button-prev"><i class="lastudioicon-left-arrow"></i></div>
                            -->
                            <!-- Next Previous Button End -->

                        </div>
                        <!-- Single Product Thumb End -->

                    </div>
                    <!-- Product Details Image End -->

                </div>
                <div class="col-lg-6">

                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative">

                        <!-- Product Head Start -->
                        <div class="product-head mb-3">

                            <!-- Price Start -->
                            <span class="product-head-price">₦{{number_format(intval($product->price *1))}}</span>
                            <!-- Price End -->

                            <!-- Rating Start -->
                            <div class="review-rating">
                                <span class="review-rating-bg">
                                    <span class="review-rating-active" style="width: 90%"></span>
                                </span>
                                <a href="#/" class="review-rating-text">(1 Review)</a>
                            </div>
                            <!-- Rating End -->

                        </div>
                        <!-- Product Head End -->

                        <!-- Description Start -->
                        <p class="desc-content">{!! $product->description !!}</p>
                        <!-- Description End -->
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
                        </div><div class="product-color mb-2">
                            <label for="colorBy">Flavour</label>
                            <div class="select-wrapper">
                                <select name="Flavour" id="colorBy">
                                    <option value="manual">Chose an option</option>
                                    <option value="blue">Vanilla Only</option>
                                    <option value="red">Chocolate Only</option>
                                    <option value="green">Vanilla & Chogolate</option>
                                    <option value="black">Vetuer Only</option>
                                    <option value="yellow">Red Vetuer & Chocolate</option>
                                    <option value="yellow">Vanilla & Red Vetuer</option>
                                </select>
                            </div>
                        </div>
                        <div class="product-color mb-2">
                            <label >Text to Appear on the Cake</label>
                            <input type="text" name="message" class="form-control" />
                        </div>
                        <div class="product-size mb-5">
                            <label for="sizeBy">Size</label>
                            <div class="select-wrapper">
                                <select name="size" id="sizeBy">
                                    <option value="manual">Chose an option</option>
                                    <option value="large">Large</option>
                                    <option value="medium">Medium</option>
                                    <option value="small">Small</option>
                                </select>
                            </div>
                        </div> <div class="product-size mb-5">
                            <label for="sizeBy">Layers</label>
                            <div class="select-wrapper">
                                <select name="size" id="sizeBy">
                                    <option value="manual">Chose an option</option>
                                    <option value="large">Layer 1</option>
                                    <option value="medium">Layer 2</option>
                                    <option value="small">Layer 3</option>
                                </select>
                            </div>
                        </div>
                        <!-- Product Quantity, Cart Button, Wishlist and Compare Start -->
                        <ul class="product-cta">
                            <li>
                                <!-- Quantity Start -->
                                <div class="quantity">
                                    <div class="cart-plus-minus"></div>
                                </div>
                                <!-- Quantity End -->
                            </li>
                            <li>
                                <!-- Cart Button Start -->
                                <div class="cart-btn">
                                    <div class="add-to_cart">
                                        <a class="btn btn-dark btn-hover-primary labtn-icon-quickview" href="#"
                                           data-bs-toggle="modal" data-product-id="{{$product['id']}}"
                                           data-bs-target="#modalCart1{{$product['id']}}">
                                            Add to cart
                                        </a>
                                    </div>
                                </div>
                                <!-- Cart Button End -->
                            </li>
                            <li>
                                <!-- Action Button Start -->
                                <div class="actions">
                                    <a href="#/" title="Wishlist" class="action compare" data-bs-toggle="modal" data-bs-target="#modalWishlist"><i class="lastudioicon-heart-2"></i></a>
                                    <a href="#/" title="Compare" class="action wishlist" data-bs-toggle="modal" data-bs-target="#modalCompare"><i class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                </div>
                                <!-- Action Button End -->
                            </li>
                        </ul>
                        <!-- Product Quantity, Cart Button, Wishlist and Compare End -->

                        <!-- Product Meta Start -->
                        <ul class="product-meta">
                            <li class="product-meta-wrapper">
                                <span class="product-meta-name">SKU:</span>
                                <span class="product-meta-detail">REF. LA-199</span>
                            </li>
                            <li class="product-meta-wrapper">
                                <span class="product-meta-name">category:</span>
                                <span class="product-meta-detail">
                                    <a href="#">Cake, </a>
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
                        <!-- Product Meta End -->

                        <!-- Product Shear Start -->
                        <div class="product-share">
                            <a href="#"><i class="lastudioicon-b-facebook"></i></a>
                            <a href="#"><i class="lastudioicon-b-twitter"></i></a>
                            <a href="#"><i class="lastudioicon-b-pinterest"></i></a>
                            <a href="#"><i class="lastudioicon-b-instagram"></i></a>
                        </div>
                        <!-- Product Shear End -->

                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>

            <div class="row section-margin">
                <!-- Single Product Tab Start -->
                <div class="col-lg-12 single-product-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews (1)</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="product-desc-row">
                                <div class="product-desc-img">
                                    <img src="{{asset('assets/images/product/product-tab.jpg')}}" alt="Image">
                                </div>
                                <div class="product-desc-content">
                                    <h5 class="product-desc-title">We Love Cake</h5>
                                    <p class="product-desc-text">{{$product->description}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                            <div class="size-tab table-responsive-lg">
                                <table class="table border mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="cun-name"><span>Color</span></td>
                                        <td>Blue, Gray, Green, Red, Yellow</td>
                                    </tr>
                                    <tr>
                                        <td class="cun-name"><span>Size</span></td>
                                        <td>Large, Medium, Small</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Start Single Content -->
                            <div class="review">

                                <!-- Review Top Start -->
                                <div class="review-top d-flex mb-4 align-items-center">

                                    <!-- Review Thumb Start -->
                                    <div class="review_thumb">
                                        <img alt="review images" src="assets/images/avatar/testimoial-1.png">
                                    </div>
                                    <!-- Review Thumb End -->

                                    <!-- Review Details Start -->
                                    <div class="review_details ms-3">
                                        <!-- Rating Start -->
                                        <div class="review-rating mb-2">
                                            <span class="review-rating-bg">
                                                <span class="review-rating-active" style="width: 90%"></span>
                                            </span>
                                        </div>
                                        <!-- Rating End -->
                                        <!-- Review Title & Date Start -->
                                        <div class="review-title-date d-flex">
                                            <h5 class="title me-1">Admin - </h5>
                                            <span>January 19, 2021</span>
                                        </div>
                                        <!-- Review Title & Date End -->
                                        <p>Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et.</p>
                                    </div>
                                    <!-- Review Details End -->

                                </div>
                                <!-- Review Top End -->

                                <!-- Comments ans Replay Start -->
                                <div class="comments-area comments-reply-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-custom">
                                            <h5 class="title mb-2">Add a review</h5>
                                            <p class="comments-area_text">Your email address will not be published. Required fields are marked *</p>
                                            <!-- Comment form Start -->
                                            <form action="#" class="comments-area_form">
                                                <div class="row">

                                                    <!-- Input Name Start -->
                                                    <div class="col-md-6 mb-3">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input class="comments-area_input" type="text" required="required" name="Name">
                                                    </div>
                                                    <!-- Input Name End -->

                                                    <!-- Input Email Start -->
                                                    <div class="col-md-6 mb-3">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input class="comments-area_input" type="text" required="required" name="email">
                                                    </div>
                                                    <!-- Input Email End -->

                                                </div>
                                                <!-- Comment Texarea Start -->
                                                <div class="mb-3">
                                                    <label>Comment</label>
                                                    <textarea class="comments-area_textarea" required="required"></textarea>
                                                </div>
                                                <!-- Comment Texarea End -->

                                                <!-- Comment Submit Button Start -->
                                                <div class="comment-form-submit">
                                                    <button class="btn btn-dark btn-hover-primary">Submit</button>
                                                </div>
                                                <!-- Comment Submit Button End -->

                                            </form>
                                            <!-- Comment form End -->

                                        </div>
                                    </div>
                                </div>
                                <!-- Comments ans Replay End -->

                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- Single Product Tab End -->
            </div>

        </div>
    </div>

    @endisset
    <!-- Single Product Section End -->

    <!-- Product Section Strat -->
    <div class="section-padding-03 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Strat -->
                    <div class="section-title">
                        <h2 class="section-title__title">Related Product</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <!-- Product Active Strat -->
            <div class="product-active">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @forelse($product1 as $pro)
                        <div class="swiper-slide">
                            <!-- Product Item Start -->
                            <div class="product-item text-center">
                                <div class="product-item__badge">Hot</div>
                                <div class="product-item__image border w-100">
                                    <a href="{{route('cakedetail', $pro['id'])}}"><img width="350" height="350" src="{{$pro['image']}}" alt="Product"></a>
                                    <ul class="product-item__meta">
{{--                                        <li class="product-item__meta-action">--}}
{{--                                            <a class="shadow-1 labtn-icon-cart" href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Cart" data-bs-toggle="modal" data-product-id="{{$pro['id']}}" data-bs-target="#modalCart{{$pro['id']}}"></a>--}}
{{--                                        </li>--}}
                                        <li class="product-item__meta-action">
                                            <a class="shadow-1 labtn-icon-wishlist" href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist" data-bs-toggle="modal" data-bs-target="#modalWishlist"></a>
                                        </li>
                                        <li class="product-item__meta-action">
                                            <a class="shadow-1 labtn-icon-compare" href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to compare" data-bs-toggle="modal" data-bs-target="#modalCompare"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-item__content pt-5">
                                    <h5 class="product-item__title"><a href="{{route('cakedetail', $pro['id'])}}">{{$pro['name']}}</a></h5>
                                    <span class="product-item__price ">₦{{number_format(intval($pro['price'] *1))}}</span>
                                </div>
                            </div>
                            <!-- Product Item End -->
                        </div>
                        @empty
                            <h2 class="text-center">Product Not found</h2>
                        @endforelse
                    </div>

                    <div class="swiper-button-next"><i class="lastudioicon-arrow-right"></i></div>
                    <div class="swiper-button-prev"><i class="lastudioicon-arrow-left"></i></div>
                </div>
            </div>
            <!-- Product Active End -->

        </div>
    </div>
    <!-- Product Section End -->

    <div class="quickview-product-modal modal fade" id="modalCart1{{$product['id']}}"
          tabindex="-1" aria-labelledby="quickViewModalLabel{{$product['id']}}" aria-hidden="true">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.labtn-icon-quickview').click(function(e){
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
