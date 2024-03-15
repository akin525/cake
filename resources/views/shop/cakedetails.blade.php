@extends('layouts.header')
@section('tittle')
    @if($product != null)
    {{$product->name}}
    @endif
@endsection
@section('content')
    <style>
        .size-selector {
            display: flex;
            align-items: center;
        }

        .size-selector label {
            margin-right: 10px;
        }

        .size-options {
            display: flex;
        }

        .size-options input[type="radio"] {
            display: none;
        }

        .size-options label {
            display: block;
            border: 1px solid #ccc;
            padding: 5px 10px;
            margin-right: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .size-options input[type="radio"]:checked + label {
            background-color: #ccc;
        }

        .color-selector {
            display: flex;
            align-items: center;
        }

        .color-selector label {
            margin-right: 10px;
        }

        .color-options {
            display: flex;
        }

        .color-options input[type="radio"] {
            display: none;
        }

        .color-options label {
            display: block;
            width: 30px;
            height: 30px;
            margin-right: 5px;
            cursor: pointer;
            border-radius: 50%;
            border: 1px solid #ccc;
        }

        .color-options input[type="radio"]:checked + label {
            border-color: #000; /* Change border color when selected */
        }
        .flavor-selector {
            display: flex;
            align-items: center;
        }

        .flavor-selector label {
            margin-right: 10px;
        }

        .flavor-options {
            display: flex;
        }

        .flavor-options input[type="radio"] {
            display: none;
        }

        .flavor-options label {
            display: inline-block;
            margin-right: 5px;
            cursor: pointer;
        }

        .flavor-options label img {
            width: 50px; /* Adjust image width as needed */
            height: 50px; /* Adjust image height as needed */
            border-radius: 50%; /* Rounded corners for circular images */
        }

        .flavor-options input[type="radio"]:checked + label {
            border: 2px solid #000; /* Add border when selected */
        }

    </style>
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
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

            <div class="row" style="border-radius: 40px; background-color: #ffffff; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);">

                <div class="col-lg-6 offset-lg-0 col-md-10 offset-md-1">

                    <!-- Product Details Image Start -->
                    <div class="product-details-img d-flex overflow-hidden flex-row">

                        <!-- Single Product Image Start -->
                        <div class="single-product-vertical-tab swiper-container order-2">

                            <div class="swiper-wrapper popup-gallery" id="popup-gallery">
                                <a class="swiper-slide h-auto image-container" href="{{url($product->image)}}">
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
                            <span class="product-head-price">₦{{ number_format(intval($product->price * 1)) }}</span>
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
                        <form method="post" action="{{route('addcart1')}}">
                            @csrf



                        <div class="product-color mb-2 ">
                            <div class="size-selector">
                                <label for="size">Select Size:</label>
                                <div class="size-options">
                                    <input type="radio" id="size-s" name="size" value="S">
                                    <label for="size-s">S</label>

                                    <input type="radio" id="size-m" name="size" value="M">
                                    <label for="size-m">M</label>

                                    <input type="radio" id="size-l" name="size" value="L">
                                    <label for="size-l">L</label>

                                    <input type="radio" id="size-xl" name="size" value="XL">
                                    <label for="size-xl">XL</label>

                                    <input type="radio" id="size-xxl" name="size" value="XXL">
                                    <label for="size-xxl">XXL</label>
                                </div>
                            </div>

                        </div>
                        <div class="">
                            <div class="color-selector">
                                <label for="color">Input Color:</label>
{{--                                <div class="color-options">--}}
{{--                                    @foreach($color as $co)--}}
{{--                                        <input type="radio" id="{{$co['label']}}" name="color" value="{{$co['label']}}" required>--}}
{{--                                        <label for="{{$co['label']}}" style="background-color: {{$co['name']}};"></label>--}}
{{--                                    @endforeach--}}


{{--                                </div>--}}
                                <input type="text" class="form-control" name="color" />
                            </div>

                        </div>
                            <br>
                            <div class="product-size mb-5">
                                <label for="layersBy">Layers</label>
                                <div class="select-wrapper">
                                    <select name="layers" id="layersBy">
                                        <option value="1">Layer 1</option>
                                        <option value="2">Layer 2</option>
                                        <option value="3">Layer 3</option>
                                    </select>
                                </div>
                            </div>
{{--                        <div class="product-color mb-2">--}}
{{--                            <div class="flavor-selector">--}}
{{--                                <label for="flavor">Select Flavor:</label>--}}
{{--                                <div class="flavor-options">--}}
{{--                                    <input type="radio" id="flavor-chocolate" name="flavor" value="Chocolate">--}}
{{--                                    <label for="flavor-chocolate"><img src="https://baqers.com/storage/flavors/18/9R4S9h9U69Le9Df3HmBUktCDgZp0sM1vi9FI3aYG.svg" alt="Chocolate"></label>--}}

{{--                                    <input type="radio" id="flavor-vanilla" name="flavor" value="Vanilla">--}}
{{--                                    <label for="flavor-vanilla"><img src="https://baqers.com/storage/flavors/2/cuZCxdDzI7PaDTM3vlS1ETgCR8Bt6Brf65aJFWW8.svg" alt="Vanilla"></label>--}}

{{--                                    <input type="radio" id="flavor-strawberry" name="flavor" value="Strawberry">--}}
{{--                                    <label for="flavor-strawberry"><img src="https://baqers.com/storage/flavors/7/g0rGxrqIzQvjKl21aVDlpBiI8otmfiH6frlqWuxT.svg" alt="Strawberry"></label>--}}

{{--                                    <input type="radio" id="flavor-mint" name="flavor" value="Red Velvet">--}}
{{--                                    <label for="flavor-mint"><img src="https://baqers.com/storage/flavors/13/x2bTzbPPfFlyocFFM77csdztaw1JjQCZWaaN9Jr5.svg" alt="Red Velvet"></label>--}}

{{--                                    <input type="radio" id="flavor-caramel" name="flavor" value="Coconut">--}}
{{--                                    <label for="flavor-caramel"><img src="https://baqers.com/storage/flavors/23/idCS85iSKvb89gOgQZH8hnFt3GPcWZC7QXX6BYbs.svg" alt="Coconut"></label>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                            <div class="product-color mb-2">
                            <label for="flavourBy">Flavour</label>
                            <div class="select-wrapper">
                                <select name="flavor" id="flavourBy">
                                    <option value="manual">Choose an option</option>
                                    <option value="vanilla">Vanilla Only</option>
                                    <option value="chocolate">Chocolate Only</option>
                                    <option value="vanilla_chocolate">Vanilla & Chocolate</option>
                                    <option value="vetuer">Vetuer Only</option>
                                    <option value="red_vetuer_chocolate">Red Vetuer & Chocolate</option>
                                    <option value="vanilla_red_vetuer">Vanilla & Red Vetuer</option>
                                </select>
                            </div>
                        </div>
                        <div class="product-color mb-2">
                            <label for="topperBy">Topper</label>
                            <div class="select-wrapper">
                                <select name="topper" id="topperBy">
                                    <option value="none">No Topper</option>
                                    <option value="select">Select a Topper</option>
                                </select>
                            </div>
                        </div>
                            <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="product-color mb-2" id="topperTextSection" style="display: none;">
                            <label for="topperText">Topper Text</label>
                            <input type="text" name="topperText" id="topperText" class="form-control" />
                        </div>
                        <div class="product-color mb-2">
                            <label for="ekoCakesCard">Eko Cakes Card</label>
                            <div class="select-wrapper">
                                <select name="ekoCakesCard" id="ekoCakesCard">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="product-color mb-2" id="ekoCakesMessageSection" style="display: none;">
                            <label for="ekoCakesMessage">Eko Cakes Card Message</label>
                            <input type="text" name="ekoCakesMessage" id="ekoCakesMessage" class="form-control" />
                        </div>
{{--                        <div class="product-size mb-5">--}}
{{--                            <label for="sizeBy">Size</label>--}}
{{--                            <div class="select-wrapper">--}}
{{--                                <select name="size" id="sizeBy">--}}
{{--                                    <option value="manual">Choose an option</option>--}}
{{--                                    <option value="large">Large</option>--}}
{{--                                    <option value="medium">Medium</option>--}}
{{--                                    <option value="small">Small</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <!-- Product Quantity, Cart Button, Wishlist and Compare Start -->
                        <ul class="product-cta">

                            <li>
                                <!-- Cart Button Start -->
                                <div class="cart-btn">
                                    <div class="add-to_cart">
                                        <button type="submit" class="btn btn-dark btn-hover-primary labtn-icon-quickview">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                                <!-- Cart Button End -->
                            </li>

                        </ul>
                        </form>

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
                                <div class="product-desc-img image-container">
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
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
                $('#layersBy').on('change', function () {
                    updateFlavourOptions();
                });
                $('#topperBy').on('change', function () {
                    handleTopperVisibility();
                });
                $('#ekoCakesCard').on('change', function () {
                    handleEkoCakesCard();
                });

                // Initial call to update flavor options, handle topper visibility, and handle Eko Cakes card visibility
                updateFlavourOptions();
                handleTopperVisibility();
                handleEkoCakesCard();
            });
        </script>


        <script>
            $(document).ready(function() {


                // Send the AJAX request
                $('#postcart').submit(function(e) {
                    e.preventDefault(); // Prevent the form from submitting traditionally

                    // Get the form data
                    var formData = $(this).serialize();

                    $('#loadingSpinner').show();

                            $.ajax({
                                url: "{{ route('addcart1') }}",
                                type: 'POST',
                                data: formData,
                                success: function(response) {
                                    // Handle the success response here
                                    $('#loadingSpinner').hide();

                                    console.log(response);
                                    // Update the page or perform any other actions based on the response

                                    if (response.status == 'success') {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success',
                                            text: response.message
                                        }).then(() => {
                                            location.reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'Pending',
                                            text: response.message
                                        });
                                        // Handle any other response status
                                    }

                                },
                                error: function(xhr) {
                                    $('#loadingSpinner').hide();
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'fail',
                                        text: xhr.responseText
                                    });
                                    // Handle any errors
                                    console.log(xhr.responseText);

                                }
                            });
                });
            });

        </script>

@endsection
