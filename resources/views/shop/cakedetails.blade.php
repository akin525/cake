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
                        <h1 class="section-title-10__subtitle text-white">Product Details</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="cormorant-upright-regular" style="font-family: Holipop, sans-serif">
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

            <div class="row" style="background-color: #ffffff; ">

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
                        <h5 class="sam">{{$product->name}}</h5>

                        <div class="product-head mb-3">
                            <!-- Price Start -->

                            <span class="product-head-price" style="font-size: 30px ">₦{{ number_format(intval($product->price * 1)) }}</span>
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
                        <p class="desc-content cormorant-upright-regular" style="font-size: 21px">{!! $product->description !!}</p>
                        <!-- Description End -->
                        <form method="post" action="{{route('addcart1')}}">
                            @csrf

                            <div class="product-size mb-5">
                                <label for="layersBy" class="cormorant-upright-bold" style="font-size: 21px" >Size in Inches</label>
                                <style>
                                    .bo{
                                        background-color: transparent;
                                        border: 1px solid #e3e3e3;
                                        border-radius: 0;
                                        box-sizing: border-box;
                                        color: inherit;
                                        cursor: pointer;
                                        display: block;
                                        font-family: inherit;
                                        font-size: inherit;
                                        height: 58px;
                                        line-height: 56px;
                                        padding: 0;
                                        user-select: none;
                                        -webkit-user-select: none;
                                    }
                                    .tag {
                                        background-color: #f0f0f0;
                                        padding: 4px 8px;
                                        border-radius: 4px;
                                    }
                                </style>
                                <div class="select-wrapper">
                                    <select name="size" id="layersBy" class="bo cormorant-upright-light tag" style="font-size: 21px;">
                                        <option>Choose an option</option>
                                        @foreach($size as $la)
                                            <option value="{{$la['name']}}">{{$la['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
{{--                        <div class="product-size mb-5">--}}
{{--                                <label for="color" class="cormorant-upright-bold" style="font-size: 21px">Input Color:</label>--}}
{{--                                <div class="color-options">--}}
{{--                                    <input type="text"  placeholder="Enter your color choice" name="color"  class="bo cormorant-upright-light tag" style="font-size: 21px;"/>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                            <div class="product-size mb-5">
                                <label for="layersBy" class="cormorant-upright-bold" style="font-size: 21px">Layers:</label>
                                <div class="select-wrapper">
                                    <select name="layers" id="layersBy" class="bo cormorant-upright-light tag" style="font-size: 21px;">
                                        <option>Choose an option</option>
                                    @foreach($layer as $la)
                                        <option value="{{$la['name']}}">{{$la['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="alert alert-warning">
                                <h4 class="cormorant-upright-regular" style="font-size: 21px"><b>
                                        Note: Selecting flavour will always base on the layer chosen by you!
                                    </b></h4>
                            </div>
                            <div class="product-color mb-2">
                            <label for="flavourBy" class="cormorant-upright-bold" style="font-size: 21px" >Flavour</label>
                            <div class="select-wrapper">
                                <select name="flavor" id="flavourBy11" class="bo cormorant-upright-light tag" style="font-size: 21px;">
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
{{--                            <div class="">--}}
{{--                                <h3 class="cormorant-upright-bold" style="font-size: 21px">--}}
{{--                                Text to Appear on the Cake--}}
{{--                                </h3><br/>--}}
{{--                                <input type="text"  placeholder="Enter your cake text" name="text"  class="bo cormorant-upright-light text-center" style="font-size: 21px;"/>--}}
{{--                            </div>--}}
{{--                            <div class="alert alert-warning">--}}
{{--                                <h4 class="cormorant-upright-regular" style="font-size: 21px"><b>--}}
{{--                                        Please write a short message you would like to see on the cake--}}
{{--                                    </b></h4>--}}
{{--                            </div>--}}
                            <br/>
                            <div class="product-color mb-2">
                            <label for="topperBy" class="cormorant-upright-bold" style="font-size: 21px">Topper</label>
                            <div class="select-wrapper">
                                <select name="topper" id="topperBy" style="font: 21px cormorant, serif">
                                    <option value="manual">Choose an option</option>
                                    <option value="none">Inner Topper</option>
                                    <option value="select">Outer  Topper</option>
                                </select>
                            </div>
                        </div>
                            <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="" id="topperTextSection" style="display: none;">
                            <h3 class="cormorant-upright-bold" style="font-size: 21px">Topper Text</h3>
                            <input type="text" name="topperText" id="topperText" class="bo cormorant-upright-light text-center" style="font-size: 21px;" />
                            <br/>
                            <div class="alert alert-warning">
                                <h4 class="cormorant-upright-regular" style="font-size: 21px"><b>
                                        Please write a short message you would like to see on the Topper. E.g. I love you baby. Daddy Rocks @ 40
                                    </b></h4>
                            </div>
                        </div>
                        <div class="product-color mb-2">
                            <label for="ekoCakesCard" class="cormorant-upright-bold" style="font-size: 21px">Add Eko Cakes Greeting Card?</label>
                            <div class="select-wrapper">
                                <select name="ekoCakesCard" id="ekoCakesCard" class=" cormorant-upright-light text-center" style="font-size: 21px;">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="product-color mb-2" id="ekoCakesMessageSection" style="display: none;">
                            <label for="ekoCakesMessage" class="cormorant-upright-bold" style="font-size: 21px">Eko Cakes Card Message</label>
                            <input type="text" name="ekoCakesMessage" id="ekoCakesMessage" class="cormorant-upright-light text-center" style="font-size: 21px;" />
                        </div>

                                                    <div class="">
                                                        <h3 class="cormorant-upright-bold" style="font-size: 21px">
                                                            Additional Information
                                                        </h3><br/>
                                                        <input type="text"   name="addition"  class="form-control cormorant-upright-light text-center" style="font-size: 21px;"/>
                                                    </div>

                            <br/>
                            <div class="alert alert-warning">
                                <h4 class="cormorant-upright-regular" style="font-size: 21px"><b>
                                        Please write any additional information you would like us to know here. E.g. Gender of recipient, delivery notes, e.t.c
                                    </b></h4>
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
                        <ul  class="product-met cormorant-upright-bold" style="font-size: 21px">
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
                            <a class="nav-link active sam" style="font-size: 21px" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab sam" style="font-size: 21px" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Additional information</a>
                        </li>

                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="product-desc-row">
                                <div class="product-desc-img ">
                                    <img width="200" src="{{asset('assets/images/eko.png')}}" alt="Image">
                                </div>
                                <div class="product-desc-content">
                                    <h5 class="section-title-10__subtitle">We Love Cake</h5>
                                    <p class="product-desc-text cormorant-upright-bold">{{$product->description}}</p>
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
                        <h2 class="sam" style="font-size: 25px">Related Product</h2>
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
                                <div class="product-item__badge ">Hot</div>
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
                                    <h5 class="sam" style="font-size: 21px"><a href="{{route('cakedetail', $pro['id'])}}">{{$pro['name']}}</a></h5>
                                    <span class="cormorant-upright-regular" style="font-size: 30px">₦{{number_format(intval($pro['price'] *1))}}</span>
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
