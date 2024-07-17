@extends('layouts.header')
@section('tittle', 'Home')
@section('content')
    <!-- Hero Slider start -->
    <div class="hero-slider-box">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="hero-slider hero-slider-two">
                        <div class="single-slide" style="background-image: url({{url($page->slider)}})">
                            <!-- Hero Content One Start -->
                            <div class="hero-content-one container">
                                <div class="row">
                                    <div class="col">
                                        <div class="slider-text-info">
                                            <h1>Sweet bite for you</h1>
                                            <h1>Delicious</h1>
{{--                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat</p>--}}
                                            <a href="#" class="btn slider-btn uppercase"><span><i class="fa fa-plus"></i> Shop Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Hero Content One End -->
                        </div>
                        <div class="single-slide" style="background-image:url({{url($page->slider)}})">
                            <!-- Hero Content One Start -->
                            <div class="hero-content-one container">
                                <div class="row">
                                    <div class="col">
                                        <div class="slider-text-info">
                                            <h1>Sweet bite for you</h1>
                                            <h1>Delicious</h1>
{{--                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat</p>--}}
                                            <a href="#" class="btn slider-btn uppercase"><span><i class="fa fa-plus"></i> SHOP NOW</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Hero Content One End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider end -->



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
