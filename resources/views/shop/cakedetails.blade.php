@extends('layouts.header')
@section('tittle')
    @if($product != null)
    {{$product->name}}
    @endif
@endsection
@section('content')

    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="{{asset('assets/images/bg/breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="merriweather-bold text-white">Product Details</h1>
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

            <div class="row card-body" style="background-color: #ffffff; ">

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



                        </div>


                    </div>
                    <!-- Product Details Image End -->

                </div>
                <div class="col-lg-6">
                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative card-body">
                        <!-- Product Head Start -->
                        <h5 class="merriweather-bold capitalize" style="font-size: 15px">{{$product->name}}</h5>

                        <div class="product-head mb-3">
                            <!-- Price Start -->
                            <style>
                                .no-border-input {
                                    border: none;
                                    background: none;
                                    font-size: 30px;
                                    width: auto; /* Optionally adjust the width as needed */
                                }
                                .checkbox-container {
                                    display: flex;
                                    flex-direction: row;
                                }
                                .checkbox-container label {
                                    margin-right: 10px;
                                }
                            </style>


                            <input type="hidden" id="defaultAmount"
                                   value="{{$product->price}}">

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
                        <p class=" cormorant-upright-light" style="font-size: 21px">{!! $product->description !!}</p>
                        <!-- Description End -->
                        <form method="post" action="{{route('addcart1')}}">
                            @csrf

                            <style>
                                /* Style for the select */
                                .custom-select {
                                    appearance: none; /* Remove default styles */
                                    -webkit-appearance: none; /* For Safari/Chrome */
                                    -moz-appearance: none; /* For Firefox */
                                    background-color: #f1f1f1;
                                    border: 1px solid #ccc;
                                    padding: 8px 20px 8px 10px;
                                    border-radius: 20px; /* Adjust the border-radius to get desired curve */
                                    width: 200px;
                                    outline: none; /* Remove focus outline */
                                }

                                /* Style for the arrow icon */
                                .custom-select::after {
                                    content: '\25BC'; /* Unicode character for down arrow */
                                    position: absolute;
                                    top: 50%;
                                    right: 10px;
                                    transform: translateY(-50%);
                                    pointer-events: none; /* Ensure arrow doesn't interfere with select */
                                }

                                /* Style for hover and focus states */
                                .custom-select:hover, .custom-select:focus {
                                    background-color: #e0e0e0;
                                }
                            </style>



                                @php
                                    $values = isset($size) && isset($size->value) ? explode(' | ', $size->value) : [];

                                    $values1 = isset($layer) && isset($layer->value) ? explode(' | ', $layer->value) : [];

                                    $values2 = isset($flavor) && isset($flavor->value) ? explode(' | ', $flavor->value) : [];

                                    $values3 = isset($product) && isset($product->item) ? explode(' | ', $product->item) : [];
                                @endphp
                            @if($size != null)
                            <div class="product-size mb-5">
                                <label for="layersBy" class="cormorant-upright-bold"  >Size in Inches</label>
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
                                    <select name="size" id="layersBy1" class="custom-select cormorant-upright-light" required>
                                        <option>Choose an option</option>
                                        @foreach ($values as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                @endif
                            @if($layer != null)
                            <div class="product-size mb-5">
                                <label for="layersBy" class="cormorant-upright-bold" >Layers:</label>
                                <div class="select-wrapper">
                                    <select name="layers" id="layerSelect" class="form-control cormorant-upright-light " style="pointer-events: auto;" required>
                                        <option>Choose an option</option>
                                        @foreach ($values1 as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if($flavor != null)
                            <div class="product-color mb-2" >
                            <label for="flavourBy" class="cormorant-upright-bold">Flavour</label>
                            <div class="select-wrapper">
                                <select name="flavor" id="flavorSelect" class="form-control cormorant-upright-light tag" style="pointer-events: auto;" required>
                                    <option>Choose an option</option>
                                    @foreach ($values2 as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            @endif





                            <input type="hidden" id="tPrice" value="0">
                            <br/>
                            <div class="product-size">
                                <label for="layersBy" class="cormorant-upright-bold" ><span>Text to Appear on the Cake</span></label>
                            </div>
                            <input type="text" name="topperText" id="topperText" class="form-control cormorant-upright-light text-center"  />

                            <div class="cormorant-upright-regular">Please write a short message you would like to see <br/>on the cake</div>

                            <br/>
                            @if($product->topper == 1)
                            <div class="product-color">
                                <label for="topperBy" class="cormorant-upright-bold" ><span>Topper</span></label>
                        </div>
                            <select name="topper" id="topperBy"   class="form-control cormorant-upright-light">
                                <option value="0">Choose an option</option>
                                <option value="4000" data-wapf-price="4000" data-wapf-pricetype="fixed">Customized Topper (+₦4,000.00)</option>
                                <option value="1000" data-wapf-price="1000" data-wapf-pricetype="fixed">In-House Happy Birthday Topper (+₦1,000.00)</option>
                            </select>


                            <div class="cormorant-upright-regular">Please write a short message you would like to see on the Topper. e.g. Mummy at 60, Happy Birthday Baby</div>

                            @endif
                            <br/>
                            <div class="" id="topperInput" style="display: none;">
                                <h6 class="cormorant-upright-bold" >Topper Text</h6>
                                <input type="text" name="topperText" id="topperText" class="form-control cormorant-upright-light text-center"  />
                                <br/>
                                <br/>

                            </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#topperBy').change(function() {
                                            var selectedOption = $(this).find(':selected');
                                            var price = selectedOption.data('wapf-price');

                                            if (price == '4000') {
                                                $('#topperInput').show(); // Show the input box if Customized Topper is selected
                                            } else {
                                                $('#topperInput').hide(); // Hide the input box for other options
                                            }
                                        });
                                    });
                                </script>
                            <style>
                                .hidden {
                                    display: none;
                                }
                            </style>

                            <div class="product-size">
                                <label for="baseColor" class="cormorant-upright-bold">
                                    <span>Base Colour of Cake</span>
                                </label>
                            </div>
                            <select name="baseColor" class="form-control cormorant-upright-light" id="baseColor">
                                <option value=""></option>
                                <option value="choose">Choose an option</option>
                                <option value="inHouse">In-house colour</option>
                            </select>

                            <br/>
                            <br/>
                            <div id="colorOptions" style="display: none;">
                                <select name="color" class="form-control cormorant-upright-light" id="color">
                                    <option value="">Pick a color</option>
                                    <option value="white" style="color: white;">White</option>
                                    <option value="black" style="color: black;">Black</option>
                                    <option value="blue" style="color: blue;">Blue</option>
                                    <option value="purple" style="color: purple;">Purple</option>
                                    <option value="green" style="color: green;">Green</option>
                                    <option value="orange" style="color: orange;">Orange</option>
                                    <option value="brown" style="color: brown;">Brown</option>
                                    <option value="pink" style="color: pink;">Pink</option>
                                    <option value="custom">Custom Color</option>
                                </select>
                            </div>

                            <script>
                                document.getElementById('baseColor').addEventListener('change', function() {
                                    var selectedOption = this.value;
                                    var colorOptions = document.getElementById('colorOptions');

                                    if (selectedOption === 'choose') {
                                        colorOptions.style.display = 'block';
                                    } else {
                                        colorOptions.style.display = 'none';
                                    }
                                });

                            </script>
                            <br/>
                            <input type="text" id="customColor" name="color"  class="hidden form-control " placeholder="Enter custom color"/>
                            <script>
                                document.getElementById('color').addEventListener('change', function() {
                                    var customColorInput = document.getElementById('customColor');
                                    if (this.value === 'custom') {
                                        customColorInput.classList.remove('hidden');
                                    } else {
                                        customColorInput.classList.add('hidden');
                                    }
                                });
                            </script>

                            <div class="cormorant-upright-regular">Would you like the Cake in a different colour? Please specify preferred colour and shade. We will try our best to meet your colour preference</div>

                            <input type="hidden" name="id" value="{{$product->id}}">

                            @if($product->card == 1)
                                <div class="product-color mb-2">
                            <label for="ekoCakesCard" class="cormorant-upright-bold" >Add Eko Cakes Greeting Card?</label>

                        </div>
                            <select name="card"  class="form-control  cormorant-upright-light " style="pointer-events: auto;" id="ekoCakesCard" >
                            <option value="no" data-wapf-price="0" >Choose an option</option>
                            <option value="no" data-wapf-price="0" >No, please</option>
                            <option value="yes" data-wapf-price="1500" data-wapf-pricetype="fixed">Yes, please (+₦1,500.00)</option>
                            </select>
                            <br/>
                            @endif
                        <div  id="ekoCakesMessageSection" >
                            <label for="ekoCakesMessage" class="cormorant-upright-bold" >Eko Cakes Card Message</label>
                            <br/>
                            <input type="text" name="ekoCakesMessage" id="ekoCakesMessage" class="cormorant-upright-light form-control" style="font-size: 21px;" />
                        </div>
                            <div class="">
                                <h6 class="cormorant-upright-regular" >
                                    Additional Information
                                </h6><br/>
                                <input type="text"   name="addition"  class="form-control cormorant-upright-light text-center" style="font-size: 21px;"/>
                            </div>

                            <br/>
                            <div class="">
                                <h6 class="cormorant-upright-regular" >
                                    {!! $addalert->message !!}

                                </h6>
                            </div>
                            <br/>
                            <br/>
                            @if(!empty($items) && $items->count())
                                <h6 class="cormorant-upright-bold">Special Product</h6>

                                <select name="option" class="form-control cormorant-upright-light"  style="pointer-events: auto;" id="opt">
                                    <option value="0" data-wapf-price="0">Choose an option</option>
                                    @foreach($items as $item)
                                        <option value="{{ $item->price }}" data-wapf-price="{{ $item->price }}" data-wapf-pricetype="fixed">{{ $item->product }} (₦{{ $item->price }})</option>
                                    @endforeach
                                </select>
                            @endif

                            <br/>
                            <br/>

                            <script>
                                $(document).ready(function () {
                                    // Function to update flavor options based on selected layers


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

                                    $('#ekoCakesCard').on('change', function () {
                                        handleEkoCakesCard();
                                    });

                                    handleTopperVisibility();
                                    handleEkoCakesCard();
                                });

                                document.getElementById('ekoCakesCard').addEventListener('change', function() {
                                    var selectElement = this;
                                    var selectedOption = selectElement.options[selectElement.selectedIndex];
                                    var selectedPrice = parseFloat(selectedOption.getAttribute('data-wapf-price'));

                                    var previousLayerPrice = parseInt(document.getElementById('tPrice').value); // Get previous layer price
                                    var to = parseInt(document.getElementById('totalp').value); // Get previous layer price
                                    totalAmount -= previousLayerPrice; // Subtract previous layer price from total amount
                                    totalAmount -= to; // Subtract previous layer price from total amount
                                    document.getElementById('tPrice').value = selectedPrice; // Store current layer price for next calculation
                                    document.getElementById('totalp').value = selectedPrice; // Store current layer price for next calculation

                                    // Update total amount
                                    var totalAmountElement = document.getElementById('totalAmount');
                                    var currentTotal = parseFloat(totalAmountElement.value.replace('', '').replace(',', ''));
                                    var newTotal = currentTotal + selectedPrice;
                                    totalAmountElement.value = newTotal.toFixed(2);
                                });

                            </script>


                            <br/>
                        <ul class="product-cta">

                            <li>

                                <h6 class="cormorant-upright-semibold">Total Price</h6>
                                <span class="product-head-price"  style="font-size: 20px ">₦</span>
                                <input type="text" id="totalAmount" class="no-border-input" name="amount"  style="font-size: 20px "
                                       value="{{$product->price}}">
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
                            <a class="nav-link active merriweather-bold" style="font-size: 15px" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab merriweather-bold" style="font-size: 15px" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Additional information</a>
                        </li>

                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="product-desc-row">
                                <div class="product-desc-img ">
                                    <img width="200" src="{{asset('assets/images/eko.png')}}" alt="Image">
                                </div>
                                <div class="product-desc-content">
                                    <h5 class="merriweather-light-italic">We Love Cake</h5>
                                    <p class="product-desc-text cormorant-upright-bold">{!! $product->description !!}</p>
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
{{--                                <div class="product-item__badge ">Hot</div>--}}
                                <div class="product-item__image border w-100">
                                    <a href="{{route('cakedetail', $pro['id'])}}"><img width="350" height="350" src="{{url($pro['image'])}}" alt="Product"></a>
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
                                    <h5 class="merriweather-bold" style="font-size: 20px"><a href="{{route('cakedetail', $pro['id'])}}">{{$pro['name']}}</a></h5>
                                    <span class="merriweather-bold" style="font-size: 20px; ">₦{{number_format(intval($pro['price'] *1))}}</span>
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
        $(document).ready(function() {
            $('#flavorSelect').change(function() {
                var sizeValue = $('#layersBy1').val(); // Get the selected size value
                var layersValue = $('#layerSelect').val(); // Get the selected layers value
                var flavorValue = $(this).val(); // Get the selected flavor value

                // Show the loading spinner
                // $('#loadingSpinner').show();

                // Send the selected values to the '/getsize' route
                $.ajax({
                    url: '{{ url('getsize') }}',
                    type: 'GET',
                    data: {
                        size: sizeValue,
                        layers: layersValue,
                        flavor: flavorValue
                    },
                    success: function(response) {
                        // $('#loadingSpinner').hide();

                        // Handle the successful response
                        var sizePrice = parseInt(response); // Get the selected layer price
                        // var defaultAmount = parseInt(document.getElementById('defaultAmount').value);
                        var defaultAmount = 0;
                        var totalAmount = defaultAmount + sizePrice; // Calculate the total amount

                        console.log(totalAmount);
                        console.log(defaultAmount);
                        console.log(sizePrice);
                        document.getElementById('totalAmount').value = totalAmount; // Update the total amount display

                    },
                    error: function(xhr) {
                        // Handle any errors
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#layersBy1').change(function() {
                var sizeValue = $(this).val(); // Get the selected size value
                var layersValue = $('#layerSelect').val(); // Get the selected layers value
                var flavorValue = $('#flavorSelect').val(); // Get the selected flavor value

                // Show the loading spinner
                // $('#loadingSpinner').show();

                // Send the selected values to the '/getsize' route
                $.ajax({
                    url: '{{ url('getsize') }}',
                    type: 'GET',
                    data: {
                        size: sizeValue,
                        layers: layersValue,
                        flavor: flavorValue
                    },
                    success: function(response) {
                        // $('#loadingSpinner').hide();

                        // Handle the successful response
                        var sizePrice = parseInt(response); // Get the selected layer price
                        // var defaultAmount = parseInt(document.getElementById('defaultAmount').value);
                        var defaultAmount = 0;
                        var totalAmount = defaultAmount + sizePrice; // Calculate the total amount

                        console.log(totalAmount);
                        console.log(defaultAmount);
                        console.log(sizePrice);
                        document.getElementById('totalAmount').value = totalAmount; // Update the total amount display

                    },
                    error: function(xhr) {
                        // Handle any errors
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#layerSelect').change(function() {
                var sizeValue = $('#layersBy1').val(); // Get the selected size value
                var layersValue = $(this).val(); // Get the selected layers value
                var flavorValue = $('#flavorSelect').val(); // Get the selected flavor value

                // Show the loading spinner
                // $('#loadingSpinner').show();

                // Send the selected values to the '/getsize' route
                $.ajax({
                    url: '{{ url('getsize') }}',
                    type: 'GET',
                    data: {
                        size: sizeValue,
                        layers: layersValue,
                        flavor: flavorValue
                    },
                    success: function(response) {
                        // $('#loadingSpinner').hide();

                        // Handle the successful response
                        var sizePrice = parseInt(response); // Get the selected layer price
                        // var defaultAmount = parseInt(document.getElementById('defaultAmount').value);
                        var defaultAmount = 0;
                        var totalAmount = defaultAmount + sizePrice; // Calculate the total amount

                        console.log(totalAmount);
                        console.log(defaultAmount);
                        console.log(sizePrice);
                        document.getElementById('totalAmount').value = totalAmount; // Update the total amount display

                    },
                    error: function(xhr) {
                        // Handle any errors
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        // topperBy


        document.getElementById('topperBy').addEventListener('change', function() {
            var toppernumber = parseInt(this.value); // Get the selected layer price
            var defaultAmount = parseInt(document.getElementById('totalAmount').value);
            var totalAmount = defaultAmount + toppernumber; // Calculate the total amount

            var previousLayerPrice = parseInt(document.getElementById('tPrice').value); // Get previous layer price
            totalAmount -= previousLayerPrice; // Subtract previous layer price from total amount
            document.getElementById('tPrice').value = toppernumber; // Store current layer price for next calculation


            document.getElementById('totalAmount').value = totalAmount; // Update the total amount display
        });

        document.getElementById('opt').addEventListener('change', function() {
            var optnumber = parseInt(this.value); // Get the selected layer price
            var defaultAmount = parseInt(document.getElementById('totalAmount').value);
            var totalAmount = defaultAmount + optnumber; // Calculate the total amount

            var previousLayerPrice = parseInt(document.getElementById('tPrice').value); // Get previous layer price
            totalAmount -= previousLayerPrice; // Subtract previous layer price from total amount
            document.getElementById('tPrice').value = optnumber; // Store current layer price for next calculation


            document.getElementById('totalAmount').value = totalAmount; // Update the total amount display
        });
        document.getElementById('item').addEventListener('change', function() {
            var itemnumber = parseInt(this.value); // Get the selected layer price
            var defaultAmount = parseInt(document.getElementById('totalAmount').value);
            var totalAmount = defaultAmount + itemnumber; // Calculate the total amount

            var previousLayerPrice = parseInt(document.getElementById('tPrice').value); // Get previous layer price
            totalAmount -= previousLayerPrice; // Subtract previous layer price from total amount
            document.getElementById('tPrice').value = itemnumber; // Store current layer price for next calculation


            document.getElementById('totalAmount').value = totalAmount; // Update the total amount display
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
