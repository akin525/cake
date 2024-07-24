@extends('layouts.header')
@section('tittle', 'Home')
@section('content')
    <style>
        .head{
            color: #000000;
            /*margin: 0;*/
            font-family: "Great Vibes", cursive;
            font-size: 50px;
            line-height: .8em;
            /*color: #c19d56;*/
            font-style: normal;
            margin-bottom: 15px;
        }
        .sam{
            font-family: Montserrat, sans-serif;
            font-style: normal;
            font-weight: 600;
            text-transform: uppercase; vertical-align: baseline;  font-size: 30px; line-height: 1.18em;
            letter-spacing: .1em;
        }
        .cormorant-upright-light {
            font-family: "Cormorant Upright", serif;
            font-weight: 300;
            font-style: normal;
        }

        .cormorant-upright-regular {
            font-family: "Cormorant Upright", serif;
            font-weight: 400;
            font-style: normal;
        }

        .cormorant-upright-medium {
            font-family: "Cormorant Upright", serif;
            font-weight: 500;
            font-style: normal;
        }

        .cormorant-upright-semibold {
            font-family: "Cormorant Upright", serif;
            font-weight: 600;
            font-style: normal;
        }

        .merriweather-bold {
            font-family: "Cormorant Upright", serif;
            font-weight: 500;
            font-style: normal;
        }

    </style>

    <!-- Slider Section Strat -->
    <div class="custom-container-three container-fluid">
        <div class="container-three-inner">
            <div class="slider-section slider-active overflow-hidden">
                <div class="swiper">
                    <div class="swiper-wrapper">

                        <!-- Single Slider Start -->
                        <div class=" swiper-slide single-slider-05 animation-style-05 image-container" style="background-image: url({{url($page->slider)}});  background-size: contain; background-position: center; background-repeat: no-repeat;">
                            <!-- Slider Content Start -->
                            <div class="slider-content-05">
                                {{--                                <h1 class="slider-content-05__title">Sweet classics.</h1>--}}
                                {{--                                <span class="slider-content-05__subtitle">Génial</span>--}}
                                <a class="slider-content-05__btn btn slider-btn-01 cormorant-upright-bold" style="background-color: white" href="{{route('cakes')}}">Shop Now</a>
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
                                <a class="slider-content-05__btn btn slider-btn-01 cormorant-upright-bold" style="background-color: #ffffff " href="{{route('cakes')}}">Shop Now</a>
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
{{--                    <div class="slider-arrow-two">--}}
{{--                        <div class="swiper-button-next"><i class="lastudioicon-left-arrow"></i></div>--}}
{{--                        <div class="swiper-button-prev"><i class="lastudioicon-right-arrow"></i></div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

    <br/>
    <h5 class="merriweather-bold text-center" style="color: black; font-size: 20px">We know that making cake is art</h5>
{{--    <h3 class="text-center merriweather-light-italic" style="color: #eda939">Making cake is art</h3>--}}
    <hr/>
    <h6 class="text-center merriweather-bold" style="color: black; font-size: 14px" > VIEW OUR CATEGORIES</h6>
{{--    <h5  style="font-family: Great Vibes, cursive;--}}
{{--    font-weight: 400;--}}
{{--    font-style: normal;">PLEASE VIEW OUR PRODUCTS BELOW--}}
{{--    </h5>--}}


    <!-- Category Section Start -->
    <div class="category-four category-four_bg section-padding-03" data-bg-image="" style="background-color: #f6f6f6">
        <div class="container custom-container-five">
            <div class="row row-cols-2 row-cols-lg-4 category-four_wrapper mb-n60">
                @foreach($category as $cat)
                <div class="col mb-60">
                    <!-- Single Category Four Start -->
                    <div class="category-four_box">
                        <span class="category-four_border"></span>
                        <a href="{{url('category', $cat['id'])}}" class="category-four_thumb">
                            @if($cat['image'] != null)
                            <img width="100" src="{{url($cat['image'])}}" alt="Category-Image">
                            @else
                            <img width="100" src="{{asset('cc.jpeg')}}" alt="Category-Image">
                            @endif
                        </a>
                        <div class="category-four_content" style="font: 12px cormorant, serif">
                            <a href="{{ route('category', $cat->id) }}" class="category-four_name cormorant-upright-bold">{{ $cat->name }}</a>
                        </div>

                    </div>
                    <!-- Single Category Four End -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Category Section End -->

    <!-- Product Section Start -->
    <div class="section-padding-03  position-relative" style="background-color: white">
        <div class="container custom-container-five">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Section Title Strat -->
                    <div class="section-title-08 mb-100 z-4 position-relative">
                        <h6 class="merriweather-bold text-capitalize" style="font-size: 18px"><b>BROWSE OUR CAKES</b></h6>
{{--                        <img src="assets/images/shape/title-shape.png" alt="Shape-Image">--}}
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 mb-n30 card-body">
                @forelse($product as $pro)
                <div class="col mb-30 z-4 card-body" >
                    <!-- Product Item Start -->
                    <div class="product-item product-item-09 text-center" style="border-radius: 50px; background-color: #ffffff; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);">
                        <div class="product-item__content">
                            <h3 class="merriweather-bold capitalize" style="font-size: 15px"><b> <a href="{{route('cakedetail', $pro['id'])}}">{{$pro['name']}}</a></b></h3>
                            @if($pro['ramount'] != null)
                                <span class="merriweather-bold fs-4">₦{{number_format(intval($pro['ramount'] *1))}}</span>-
                                <span class="merriweather-bold fs-4">₦{{number_format(intval($pro['tamount'] *1))}}</span>
                            @else
                                <span class="merriweather-bold fs-4">₦{{number_format(intval($pro['price'] *1))}}</span>
                            @endif
                        </div>
                        <div class="product-item__image ">
                            <a class="item-img image-container" href="{{route('cakedetail', $pro['id'])}}">
                                <img src="{{url($pro['image'])}}" alt="Product">
                            </a>
                            <ul class="product-item__meta meta-bottom">
                                <style>
                                    .round-head-button {
                                        padding: 10px 20px;
                                        border: none; /* Remove default border */
                                        border-radius: 20px 20px 0 0; /* Top left and top right rounded corners */
                                        font-size: 16px; /* Button text size */
                                        cursor: pointer; /* Pointer cursor on hover */
                                        transition: background-color 0.3s; /* Smooth background color transition */
                                    }


                                </style>
                                <li class="product-item__meta-action meta-dark">
                                    <a class="labtn-icon-quickview " href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Quick View" data-product-id="{{$pro['id']}}" data-bs-toggle="modal" data-bs-target="#quickViewModal{{$pro['id']}}"></a>
                                </li>
                            </ul>
                            <br>
                            <br>
                            <a href="{{route('cakedetail', $pro['id'])}}" class="product-item__btn cormorant-upright-regular " style="font-size: 14px; border-radius: 50px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);" >Add to cart</a>
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
                    <p class="text-center" style="font: 24px cormorant, serif">No Product Available On Store</p>
                @endforelse

            </div>
{{--            <div class="row">--}}
{{--                <div class="more-btn_three">--}}
{{--                    <div class="more-btn_three__content">--}}
{{--                        <span class="more-btn-text" style="font: 24px cormorant, serif">#Eko Cakes</span>--}}
{{--                        <a href="{{route('cakes')}}" class="more-btn-text text-dark-three" style="font: 24px cormorant, serif">More Cakes</a>--}}
{{--                    </div>--}}
{{--                    <span class="more-btn_three__border"></span>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
{{--        <div class="product-shape-one">--}}
{{--            <img src="assets/images/shape/shape-07.png" alt="Shape-Image">--}}
{{--        </div>--}}
{{--        <div class="product-shape-two">--}}
{{--            <img src="assets/images/shape/shape-08.png" alt="Shape-Image">--}}
{{--        </div>--}}
{{--        <div class="product-shape-three">--}}
{{--            <img src="assets/images/shape/shape-09.png" alt="Shape-Image">--}}
{{--        </div>--}}
    </div>
    <!-- Product Section End -->




    <!-- Contact form section Start -->
    <div class="section-padding-03 contact-section contact-section_bg" data-bg-image="" >
        <div class="container custom-container-five">
            <div class="row align-items-center">
                <div class="">
                    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
                        <div class="loading-spinner"></div>
                    </div>
                    <div class="contact-section_formbg" data-bg-image="">
                        <h2 class="merriweather-bold" style="font-size: 18px; font: normal normal normal 14px/1 LaStudioIcons">GET IN TOUCH</h2>
                        <form class="contact-section_form cormorant-upright-regular"  id="mes" method="post" style="background-color: white">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-p">
                                    <div class="form-group">
                                        <input  style="font: 21px" class="form-control merriweather-regular" type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 form-p">
                                    <div class="form-group">
                                        <input style="font: 21px" class="form-control merriweather-regular" type="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 form-p">
                                    <div class="form-group">
                                        <input style="font: 21px" class="form-control merriweather-regular" type="text" name="number" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-6 form-p">
                                    <div class="form-group">
                                        <input style="font: 21px" class="form-control merriweather-regular" type="text" name="address" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-md-12 form-p">
                                    <div class="form-group">
                                        <textarea style="font: 21px" class="form-control merriweather-regular text-area" name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 form-p">
                                    <div class="form-group mb-0" style="font-size: 5px">
                                        <button class="btn btn-black" type="submit" style="font-size: 10px; border-radius: 50px">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Message Notification -->
                        <div class="form-message"></div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {


                        // Send the AJAX request
                        $('#mes').submit(function(e) {
                            e.preventDefault();

                            var formData = $(this).serialize();

                            $('#loadingSpinner').show();

                            $.ajax({
                                url: "{{ route('mes') }}",
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


                {{--                <div class="text-center">--}}
{{--                    <div class="contact-section_content">--}}
{{--                        <h4 class="contact-section__title merriweather-black" style="font-size: 25px">Our Contact</h4>--}}
{{--                        <ul class="contact-section_list">--}}
{{--                            <li>--}}
{{--                                <span class="contact-section_list__icon"><i class="lastudioicon lastudioicon-phone-2"></i></span>--}}
{{--                                <span class="contact-section_list__text merriweather-regular" style="font-size: 15px">Phone Number : <span class="cormorant-upright-regular" style="font-size: 15px">08162300183</span></span>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <span class="contact-section_list__icon"><i class="lastudioicon lastudioicon-pin-3-2"></i></span>--}}
{{--                                <span class="contact-section_list__text merriweather-regular" style="font-size: 15px">Address : <span class="cormorant-upright-regular" style="font-size: 15px">Gbagada 100234 Lagos</span></span>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <span class="contact-section_list__icon"><i class="lastudioicon lastudioicon-mail"></i></span>--}}
{{--                                <span class="contact-section_list__text merriweather-regular" style="font-size: 15px">Email Address : <span class="cormorant-upright-regular" style="font-size: 15px">info@admin.com</span></span>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="contact-section_shape">
{{--            <img src="{{asset('ct2.png')}}" alt="Shape-Image">--}}
        </div>
    </div>
    <!-- Contact form section End -->

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
