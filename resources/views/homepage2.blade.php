@extends('layouts.header')
@section('tittle', 'Home')
@section('content')
    <!-- Slider Section Strat -->
    <div class="slider-section-eight slider-active overflow-hidden">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- Single Slider Start -->
                <div class="swiper-slide single-slider-08 animation-style-08 movearea" style="background-image: url(cake.jpg); background-size: contain; background-position: center; background-repeat: no-repeat;">
                    <div class="image movex">
{{--                        <img class="img-center" src="{{asset('ct2.png')}}" alt="Slider-Image">--}}
                    </div>
                    <div class="slider-content-08 container">
                        <div class="row">
                            <div class="col-12 text-center">
{{--                                <span class="slider-content-08__subtitle">We deal with</span>--}}
{{--                                <h2 class="slider-content-08__title text-global-color-12">Quality.</h2>--}}
                                <a class="slider-content-08__btn btn slider-btn-01" href="{{route('cakes')}}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider End -->
                <!-- Single Slider Start -->
                <div class="swiper-slide single-slider-08 animation-style-08 movearea" style="background-image: url(assets/images/slider/slider-bg-8-2.jpg);">
                    <div class="image movex">
                        <img class="img-center" src="assets/images/slider/slider-8-shape2.png" alt="Slider-Image">
                    </div>
                    <div class="slider-content-08 container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <span class="slider-content-08__subtitle">Taste the</span>
                                <h2 class="slider-content-08__title text-white">Charms</h2>
                                <a class="slider-content-08__btn btn slider-btn-01" href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider End -->
            </div>
            <div class="swiper-pagination swiper-pagination-two container"></div>
        </div>
    </div>
    <!-- Slider Section End -->


    <!-- Category Section Start -->
    <div class="category-four category-four_bg section-padding-03" data-bg-image="assets/images/bg/category-four-bg.jpg">
        <div class="container custom-container-five">
            <div class="row row-cols-2 row-cols-lg-4 category-four_wrapper mb-n60">
                <div class="col mb-60">
                    <!-- Single Category Four Start -->
                    <div class="category-four_box">
                        <span class="category-four_border"></span>
                        <a href="{{url('cakes')}}" class="category-four_thumb">
                            <img width="100" src="{{asset('cc.jpeg')}}" alt="Category-Image">
                        </a>
                        <div class="category-four_content">
                            <a href="{{url('cakes')}}" class="category-four_name">All Cakes</a>
                        </div>
                    </div>
                    <!-- Single Category Four End -->
                </div>
                <div class="col mb-60">
                    <!-- Single Category Four Start -->
                    <div class="category-four_box">
                        <span class="category-four_border"></span>
                        <a href="{{url('category/Cake%20for%20Him')}}" class="category-four_thumb">
                            <img src="{{asset('ca.jpeg')}}" alt="Category-Image">
                        </a>
                        <div class="category-four_content">
                            <a href="{{url('category/Cake%20for%20Him')}}" class="category-four_name">Cake For Him</a>
                        </div>
                    </div>
                    <!-- Single Category Four End -->
                </div>
                <div class="col mb-60">
                    <!-- Single Category Four Start -->
                    <div class="category-four_box">
                        <span class="category-four_border"></span>
                        <a href="{{url('category/Cake%20For%20Her')}}" class="category-four_thumb">
                            <img src="https://ekocakes.com/wp-content/uploads/2024/01/IMG_0837-600x608.jpg" alt="Category-Image">
                        </a>
                        <div class="category-four_content">
                            <a href="{{url('category/Cake%20For%20Her')}}" class="category-four_name">Cake For Her</a>
                        </div>
                    </div>
                    <!-- Single Category Four End -->
                </div>
                <div class="col mb-60">
                    <!-- Single Category Four Start -->
                    <div class="category-four_box">
                        <span class="category-four_border"></span>
                        <a href="{{url('ready')}}" class="category-four_thumb">
                            <img src="https://ekocakes.com/wp-content/uploads/2024/01/IMG_0703-600x591.jpg" alt="Category-Image">
                        </a>
                        <div class="category-four_content">
                            <a href="{{url('ready')}}" class="category-four_name">Ready To Go</a>
                        </div>
                    </div>
                    <!-- Single Category Four End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Category Section End -->

    <!-- Product Section Start -->
    <div class="section-padding-03 bg-gray-100 position-relative">
        <div class="container custom-container-five">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Section Title Strat -->
                    <div class="section-title-08 mb-100 z-4 position-relative">
                        <h5 class="section-title-08__title">The Best Cakes</h5>
                        <img src="assets/images/shape/title-shape.png" alt="Shape-Image">
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 mb-n30">
                @forelse($product as $pro)
                <div class="col mb-30 z-4">
                    <!-- Product Item Start -->
                    <div class="product-item product-item-09 text-center">
                        <div class="product-item__content">
                            <h5 class="product-item__title"><a href="{{route('cakedetail', $pro['id'])}}">{{$pro['name']}}</a></h5>
                            <span class="product-item__price ">₦{{number_format(intval($pro['price'] *1))}}</span>
                        </div>
                        <div class="product-item__image">
                            <a class="item-img" href="#">
                                <img src="{{url($pro['image'])}}" alt="Product">
                            </a>
                            <ul class="product-item__meta meta-bottom">
                                <li class="product-item__meta-action meta-dark">
                                    <a class="labtn-icon-quickview" href="#/" data-bs-tooltip="tooltip" data-bs-placement="top" title="Quick View" data-product-id="{{$pro['id']}}" data-bs-toggle="modal" data-bs-target="#quickViewModal{{$pro['id']}}"></a>
                                </li>
                            </ul>
                            <br>
                            <br>
                            <a href="{{route('cakedetail', $pro['id'])}}" class="product-item__btn" data-bs-toggle="modal" data-bs-target="#modalCart">Add to cart</a>
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
                <div class="more-btn_three">
                    <div class="more-btn_three__content">
                        <span class="more-btn-text">#bakerfresh</span>
                        <a href="{{route('cakes')}}" class="more-btn-text text-dark-three">More Cakes</a>
                    </div>
                    <span class="more-btn_three__border"></span>
                </div>
            </div>
        </div>
        <div class="product-shape-one">
            <img src="assets/images/shape/shape-07.png" alt="Shape-Image">
        </div>
        <div class="product-shape-two">
            <img src="assets/images/shape/shape-08.png" alt="Shape-Image">
        </div>
        <div class="product-shape-three">
            <img src="assets/images/shape/shape-09.png" alt="Shape-Image">
        </div>
    </div>
    <!-- Product Section End -->


    <!-- Contact form section Start -->
    <div class="section-padding-03 contact-section contact-section_bg" data-bg-image="assets/images/bg/contact-bg.jpg">
        <div class="container custom-container-five">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="contact-section_content">
                        <h2 class="contact-section__title">Our Contact</h2>
                        <ul class="contact-section_list">
                            <li>
                                <span class="contact-section_list__icon"><i class="lastudioicon lastudioicon-phone-2"></i></span>
                                <span class="contact-section_list__text">Phone Number : <span>08162300183</span></span>
                            </li>
                            <li>
                                <span class="contact-section_list__icon"><i class="lastudioicon lastudioicon-pin-3-2"></i></span>
                                <span class="contact-section_list__text">Address : <span>Gbagada 100234 Lagos</span></span>
                            </li>
                            <li>
                                <span class="contact-section_list__icon"><i class="lastudioicon lastudioicon-mail"></i></span>
                                <span class="contact-section_list__text">Email Adress : <span>info@admin.com</span></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-section_formbg" data-bg-image="assets/images/bg/contact-form-bg.jpg">
                        <h2 class="contact-section_form__title">Get in touch.</h2>
                        <form class="contact-section_form" id="contact-form" action="http://whizthemes.com/mail-php/raju/arden/mail.php" method="post">
                            <div class="row">
                                <div class="col-md-6 form-p">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="con_name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 form-p">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="con_email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 form-p">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="con_phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-6 form-p">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="con_address" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-md-12 form-p">
                                    <div class="form-group">
                                        <textarea class="form-control text-area" name="con_message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 form-p">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-theme" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Message Notification -->
                        <div class="form-message"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-section_shape">
            <img src="{{asset('ct2.png')}}" alt="Shape-Image">
        </div>
    </div>
    <!-- Contact form section End -->





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
