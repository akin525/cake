@extends('layouts.header')
@section('tittle')
    @if($product != null)
    {{$product->name}}
    @endif
@endsection
@section('content')
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
    <style>
        .hidden {
            display: none;
        }
    </style>
    <style>
        .price-container {
            display: flex;
            align-items: center;
        }

        .product-head-price,
        .no-border-input {
            font-size: 20px;
        }

        .no-border-input {
            border: none;
            margin-left: 5px; /* Optional: Adds some space between the currency symbol and the input */
        }

        .product-attributes {
            margin-bottom: 20px;
        }

        .product-attribute {
            margin-bottom: 20px;
        }

        .radio-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check-input {
            margin-right: 5px;
        }

        .form-check-label {
            margin: 0;
            font-weight: 400; /* Adjust the weight to match your typography */
        }

        /* Optional: Add some spacing around the attribute label */
        .product-attribute label.cormorant-upright-bold {
            display: block;
            margin-bottom: 10px;
            font-weight: bold; /* Adjust the weight to match your typography */
        }

        /* Optional: Customize the radio button appearance */
        .form-check-input[type="radio"] {
            width: 18px;
            height: 18px;
        }

        .form-check-label {
            font-size: 14px; /* Adjust the size to match your typography */
        }

    </style>

    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" style="background-color: #F2A71B;">
        <div class="container" style="background-color: #F2A71B;">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="merriweather-bold capitalize text-white" style="text-transform: uppercase">
                            @if($product != null && $product->categories->count() > 0)
                                <li class="cormorant-upright-regular" style="font-family: Holipop, sans-serif; text-transform: uppercase">
                                    Category Tittle:
                                    @foreach($product->categories as $category)
                                        <span>{{ $category->name }}</span>@if(!$loop->last), @endif
                                    @endforeach
                                </li>
                            @endif
                        </h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{url('/')}}" style="text-transform: uppercase">Home</a></li>
                            <li class="cormorant-upright-regular" style="font-family: Holipop, sans-serif; text-transform: uppercase" >
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
                        <h5 class="cormorant-upright-bold capitalize" style="font-size: 25px; color: #EF9B00; text-transform: uppercase">{{$product->name}}</h5>

                        <div class="product-head mb-3">
                            <!-- Price Start -->



                            <input type="hidden" id="defaultAmount"
                                   value="{{$product->price}}">

                            <!-- Rating Start -->
                            <div class="review-rating">
                <span class="review-rating-bg">
                    <span class="review-rating-active" style="width: 90%"></span>
                </span>
                                <a href="#" class="review-rating-text">(1 Review)</a>
                            </div>
                            <!-- Rating End -->
                        </div>
                        <!-- Product Head End -->
                        <!-- Description Start -->
                        <div class="cormorant-upright-regular" style="font-size: 15px">{!! $product->description !!}</div>
                        <!-- Description End -->
                        <form method="post" action="{{route('addcart1')}}">
                            @csrf




                            <div class="price-container">
                                <span class="product-head-price">₦</span>
                                <input type="text" id="totalAmount12" class="no-border-input" name="amount" value="{{ $product->price }}" readonly/>
                            </div>

                            <style>
                                .attribute-options {
                                    display: flex;
                                    flex-wrap: wrap;
                                    gap: 10px;
                                }

                                .attribute-box {
                                    display: inline-block;
                                    width: 110%;
                                    height: 50px;
                                    text-align: center;
                                    line-height: 50px;
                                    border: 2px solid transparent;
                                    cursor: pointer;
                                    border-radius: 4px;
                                    border-color: #000000;

                                     /*background-color: #c19d56;  Ash color*/
                                    box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.1);
                                }


                                .attribute-box:hover,
                                input[type="radio"]:checked + .attribute-box {
                                    border-color: #ef9b00;
                                }

                                .text-white {
                                    color: #000000; /* Optional: Ensures text color is white */
                                }
                            </style>
                            @php
                                $attributeValues = [];
                                $attributesOnly = [];
                                $combinations = [];

                                if ($product->variations) {
                                    if ($product->variations->isNotEmpty()) {
                                        foreach ($product->variations as $variation) {
                                            $combinationKey = [];
                                            foreach ($variation->options as $option) {
                                                $attributeValues[$option->name][] = $option->value;
                                                $combinationKey[] = $option->value;
                                            }
                                            $combinations[implode('|', $combinationKey)] = $variation->price;
                                        }
                                    }
                                }

                                // Check if attributes only (without variations) exist and are not null
                                if ($product->attributes) {
                                    if ($product->attributes->isNotEmpty()) {
                                        foreach ($product->attributes as $attribute) {
                                            $attributesOnly[$attribute->name][] = $attribute->value;
                                        }
                                    }
                                }
                            @endphp

                            @if(!empty($attributeValues) || !empty($attributesOnly))
                                @foreach($attributeValues as $attributeName => $values)
                                    @php
                                        $uniqueValues = array_unique($values);
                                    @endphp
                                    <div class="product-attribute mb-5">
                                        <label for="{{ Str::slug($attributeName) }}" class="cormorant-upright-bold">{{ ucfirst($attributeName) }}</label>
                                        <div class="attribute-options">
                                            @foreach ($uniqueValues as $value)
                                                <label>
                                                    <input type="radio" name="attributes[{{ $attributeName }}]" value="{{ $value }}" style="display: none;" required>
                                                    <div class="attribute-box cormorant-upright-regular">{{ $value }}</div>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($attributesOnly as $attributeName => $values)
                                    @php
                                        $uniqueValues = array_unique($values);
                                    @endphp
                                    <div class="product-attribute mb-5">
                                        <label for="{{ Str::slug($attributeName) }}" class="cormorant-upright-bold">{{ ucfirst($attributeName) }}</label>
                                        <div class="attribute-options">
                                            @foreach ($uniqueValues as $value)
                                                <label>
                                                    <input type="radio" name="attributes[{{ $attributeName }}]" value="{{ $value }}" style="display: none;" required>
                                                    <div class="attribute-box cormorant-upright-regular">{{ $value }}</div>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>---</p>
                            @endif

                            <script>
                                const combinations = @json($combinations);
                            </script>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const attributeInputs = document.querySelectorAll('input[name^="attributes"]');
                                    const priceDisplay = document.querySelector("#priceDisplay"); // Assuming you have an element with this ID for displaying price
                                    const totalAmount = document.querySelector("#totalAmount"); // Assuming you have an element with this ID for displaying price

                                    function updatePrice() {
                                        let selectedOptions = [];
                                        attributeInputs.forEach(input => {
                                            if (input.checked) {
                                                selectedOptions.push(input.value);
                                            }
                                        });

                                        const combinationKey = selectedOptions.join('|');
                                        const price = combinations[combinationKey] || "Price not available";

                                        if (priceDisplay) {
                                            priceDisplay.innerText = price; // Update the price display element
                                            totalAmount.document.value=price;
                                        }
                                    }

                                    attributeInputs.forEach(input => {
                                        input.addEventListener("change", updatePrice);
                                    });
                                });

                            </script>
{{--                            <p id="priceDisplay">Select options to see the price</p>--}}

                            <input type="hidden" id="productBasePrice" value="{{ $product->price }}">

                            <!-- Store combinations and prices -->
                            @foreach($combinations as $combination => $price)
                                <input type="hidden" data-combination="{{ $combination }}" value="{{ $price }}">
                            @endforeach

                            <button id="resetButton" type="button" class="btn btn-secondary mt-3 cormorant-upright-regular">Clear Options</button>

{{--                            <script>--}}
{{--                                $(document).ready(function() {--}}
{{--                                    // Initialize the base price--}}
{{--                                    let basePrice = parseFloat($('#productBasePrice').val()) || 0;--}}

{{--                                    // Function to update the total amount based on selected variations--}}
{{--                                    function updateTotalAmount() {--}}
{{--                                        let selectedOptions = [];--}}
{{--                                        $('input[type="radio"]:checked').each(function() {--}}
{{--                                            selectedOptions.push($(this).val()); // Get the selected value--}}
{{--                                        });--}}

{{--                                        // Sort selected options to match the exact order used in admin settings--}}
{{--                                        selectedOptions.sort();--}}

{{--                                        // Build a unique key for the selected combination--}}
{{--                                        let selectedKey = selectedOptions.join('|');--}}

{{--                                        console.log("Generated combination key: " + selectedKey);--}}

{{--                                        // Retrieve the price for the selected combination from the stored data--}}
{{--                                        let selectedPrice = $('input[type="hidden"][data-combination="' + selectedKey + '"]').val();--}}
{{--                                        selectedPrice = parseFloat(selectedPrice) || basePrice; // Use base price if no match found--}}

{{--                                        if(selectedPrice !== basePrice) {--}}
{{--                                            console.log("Match found! Price updated to: " + selectedPrice);--}}
{{--                                        } else {--}}
{{--                                            console.log("No match found. Using base price: " + basePrice);--}}
{{--                                        }--}}

{{--                                        // Update the total price display--}}
{{--                                        $('#totalAmount').val(selectedPrice.toFixed(2)); // Assuming an element to display the total amount--}}
{{--                                    }--}}

{{--                                    // Bind the updateTotalAmount function to the change event of radio buttons--}}
{{--                                    $('input[type="radio"]').on('change', updateTotalAmount);--}}

{{--                                    // Clear selections and reset price to base price--}}
{{--                                    $('#resetButton').on('click', function() {--}}
{{--                                        $('input[type="radio"]').prop('checked', false); // Uncheck all radio buttons--}}
{{--                                        $('#totalAmount').val(basePrice.toFixed(2)); // Reset to base price--}}
{{--                                        console.log("All options cleared. Total amount reset to base price: " + basePrice);--}}
{{--                                    });--}}

{{--                                    // Initial update--}}
{{--                                    updateTotalAmount();--}}
{{--                                });--}}

{{--                            </script>--}}





                            <input type="hidden" id="tPrice" value="0">
                            @if($product->text == 1)
                            <br/>
                            <div class="product-size">
                                <label for="layersBy" class="cormorant-upright-bold" ><span>Text to Appear on the Cake</span></label>
                            </div>
                            <input type="text" name="topperText" id="topperText" class="form-control cormorant-upright-light text-center"  />

                            <div class="cormorant-upright-regular">Please write a short message you would like to see on the cake</div>
                            @endif
                            <br/>
                            @if($product->topper == 1)
                            <div class="product-color">
                                <label for="topperBy" class="cormorant-upright-bold" ><span>Topper</span></label>
                        </div>
                            <select name="topper" id="topperBy"   class="form-control cormorant-upright-light">
                                <option value="0">Choose an option</option>
                                @if($product->category != "Ready To Go")
                                @foreach($topper as $tb)
                                <option value="{{$tb->amount}}" data-wapf-price="{{$tb->amount}}" data-wapf-pricetype="fixed">{{$tb->name}} (+{{number_format(intval($tb->amount))}})</option>
                                    @endforeach
                                @else
                                    @foreach($rtg as $tb)
                                        <option value="{{$tb->amount}}" data-wapf-price="{{$tb->amount}}" data-wapf-pricetype="fixed">{{$tb->name}} (+{{number_format(intval($tb->amount))}})</option>
                                    @endforeach
                                @endif
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

                            @if($product->color == 1)
                            <div class="product-size">
                                <label for="baseColor" class="cormorant-upright-bold">
                                    <span>Base Colour of Cake</span>
                                </label>
                            </div>
                            <select name="baseColor" class="form-control cormorant-upright-light" id="baseColor">
                                <option value="inHouse">Original color of the cake</option>
                                <option value="choose">Choose an option</option>
                            </select>

                            <br/>
                            <br/>
                            <style>
                                .color-options {
                                    display: flex;
                                    flex-wrap: wrap;
                                    gap: 10px;
                                }

                                .color-box {
                                    display: inline-block;
                                    width: 80px;
                                    height: 50px;
                                    text-align: center;
                                    line-height: 50px;
                                    border: 2px solid transparent;
                                    cursor: pointer;
                                    border-radius: 4px;
                                }

                                .color-box:hover,
                                input[type="radio"]:checked + .color-box {
                                    border-color: #ef9b00;
                                }

                            </style>
                            <div id="colorOptions" style="display: none;">
                                <div class="color-options">
                                    <label>
                                        <input type="radio" name="color" value="white" style="display: none;">
                                        <span class="color-box" style="background-color: white;">White</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="color" value="black" style="display: none;">
                                        <span class="color-box" style="background-color: black; color: white;">Black</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="color" value="blue" style="display: none;">
                                        <span class="color-box" style="background-color: blue;">Blue</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="color" value="purple" style="display: none;">
                                        <span class="color-box" style="background-color: purple;">Purple</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="color" value="green" style="display: none;">
                                        <span class="color-box" style="background-color: green;">Green</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="color" value="orange" style="display: none;">
                                        <span class="color-box" style="background-color: orange;">Orange</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="color" value="brown" style="display: none;">
                                        <span class="color-box" style="background-color: brown; color: white;">Brown</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="color" value="pink" style="display: none;">
                                        <span class="color-box" style="background-color: pink;">Pink</span>
                                    </label>
{{--                                    <label>--}}
{{--                                        <input type="radio" name="color" value="custom" style="display: none;">--}}
{{--                                        <span class="color-box" style="background-color: lightgray;">Custom Color</span>--}}
{{--                                    </label>--}}
                                </div>

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
                            @endif

                            <input type="hidden" name="id" value="{{$product->id}}">

                            @if($product->card == 1)
                                <div class="product-color mb-2">
                                    <label for="ekoCakesCard" class="cormorant-upright-bold">Add Eko Cakes Greeting Card?</label>
                                </div>
                                <select name="card" class="form-control cormorant-upright-light" id="ekoCakesCard">
                                    <option value="no" data-wapf-price="0">Choose an option</option>
                                    <option value="no" data-wapf-price="0" data-wapf-pricetype="fixed">No, please</option>
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
                                <h6 class="cormorant-upright-bold" >
                                    Additional Information
                                </h6><br/>
                                <input type="text"   name="addition"  class="form-control cormorant-upright-light text-center" style="font-size: 21px;"/>
                            </div>

                            <br/>
                            <div class="">
                                <div class="cormorant-upright-regular" >
                                    {!! $addalert->message !!}

                                </div>
                            </div>
                            <br/>
                            <br/>
                            @if(!empty($items) && $items->count())
                                <h6 class="cormorant-upright-bold">Add-Ons</h6>
                                <div class="attribute-options">
                                    @foreach($items as $item)
                                        <input type="radio" id="item{{ $item->id }}" name="option" value="{{ $item->price }}" data-wapf-price="{{ $item->price }}" data-wapf-pricetype="fixed" style="display: none;">
                                        <label for="item{{ $item->id }}" class="attribute-box">
                                            <span class="cormorant-upright-regular">{{ $item->product }} (₦{{ $item->price }})</span>

                                        </label>
                                    @endforeach
                                </div>
                            <br/>
                            <br/>
                                <button id="unselectButton" type="button" class="btn btn-secondary mt-3">Unselect Add-Ons</button>
                            @endif

                            <script>
                                document.querySelectorAll('.attribute-box').forEach(function (label) {
                                    label.addEventListener('click', function() {
                                        var radio = document.getElementById(this.getAttribute('for'));
                                        if (radio) {
                                            radio.checked = true; // Manually check the radio button

                                            var itemnumber = parseFloat(radio.value); // Get the selected item price

                                            var defaultAmount = parseFloat(document.getElementById('totalAmount').value.replace('', '').replace(',', ''));
                                            var totalAmount = defaultAmount; // Initialize total amount with current total

                                            var previousLayerPrice = parseFloat(document.getElementById('tPrice').value); // Get previous layer price
                                            totalAmount -= previousLayerPrice; // Subtract previous layer price from total amount
                                            totalAmount += itemnumber; // Add new item price to total amount

                                            document.getElementById('tPrice').value = itemnumber; // Store current layer price for next calculation
                                            document.getElementById('totalAmount').value = totalAmount.toFixed(2); // Update the total amount display
                                        }
                                    });
                                });

                                // Unselect button functionality
                                document.getElementById('unselectButton').addEventListener('click', function() {
                                    document.querySelectorAll('input[name="option"]').forEach(function (radio) {
                                        radio.checked = false; // Uncheck all radio buttons
                                    });

                                    var defaultPrice = 0; // Assume the default price is 0 or replace with actual base price
                                    var currentAmount = parseFloat(document.getElementById('totalAmount').value.replace('', '').replace(',', ''));
                                    var previousLayerPrice = parseFloat(document.getElementById('tPrice').value); // Get previous layer price

                                    var totalAmount = currentAmount - previousLayerPrice + defaultPrice; // Revert to the base price

                                    document.getElementById('tPrice').value = defaultPrice; // Reset to default price
                                    document.getElementById('totalAmount').value = totalAmount.toFixed(2); // Update the total amount display
                                });
                            </script>



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

                            </script>
{{--                            <script>--}}
{{--                                $(document).ready(function () {--}}
{{--                                    // Initialize base price--}}
{{--                                    let basePrice = parseFloat($('#totalAmount').val()) || 0;--}}

{{--                                    // Function to update the total amount--}}
{{--                                    function updateTotalAmount() {--}}
{{--                                        let totalAmount = basePrice;--}}
{{--                                        console.log("Base price: " + totalAmount);--}}

{{--                                        // Iterate over each select element to add the price of selected options--}}
{{--                                        $('select').each(function () {--}}
{{--                                            var selectedOption = $(this).find('option:selected');--}}
{{--                                            var price = parseFloat(selectedOption.data('wapf-price')) || parseFloat(selectedOption.data('price')) || 0; // Get the price from data attribute--}}
{{--                                            console.log("Selected option: " + selectedOption.text() + " Price: " + price);--}}

{{--                                            // Only add price if it's not the default option--}}
{{--                                            if (selectedOption.val()) {--}}
{{--                                                totalAmount += price; // Add to the total amount--}}
{{--                                            }--}}
{{--                                        });--}}

{{--                                        $('#totalAmount').val(totalAmount.toFixed(2)); // Update the total amount display--}}
{{--                                        console.log("Total amount: " + totalAmount);--}}
{{--                                    }--}}

{{--                                    // Bind the updateTotalAmount function to the change event of the select elements--}}
{{--                                    $('select').on('change', updateTotalAmount);--}}

{{--                                    // Initial update--}}
{{--                                    updateTotalAmount();--}}

{{--                                    // Function to handle visibility of topper text input based on selected topper option--}}
{{--                                    function handleTopperVisibility() {--}}
{{--                                        const selectedTopper = $('#topperBy').val();--}}
{{--                                        if (selectedTopper === 'select') {--}}
{{--                                            $('#topperTextSection').show();--}}
{{--                                        } else {--}}
{{--                                            $('#topperTextSection').hide();--}}
{{--                                            $('#topperText').val(''); // Clear the text input when not visible--}}
{{--                                        }--}}
{{--                                    }--}}

{{--                                    // Function to handle visibility of Eko Cakes card message input based on selected option--}}
{{--                                    function handleEkoCakesCard() {--}}
{{--                                        const selectedOption = $('#ekoCakesCard').val();--}}
{{--                                        if (selectedOption === 'yes') {--}}
{{--                                            $('#ekoCakesMessageSection').show();--}}
{{--                                        } else {--}}
{{--                                            $('#ekoCakesMessageSection').hide();--}}
{{--                                            $('#ekoCakesMessage').val(''); // Clear the text input when not visible--}}
{{--                                        }--}}
{{--                                    }--}}

{{--                                    $('#ekoCakesCard').on('change', function () {--}}
{{--                                        handleEkoCakesCard();--}}
{{--                                    });--}}

{{--                                    // Ensure initial visibility state is correct--}}
{{--                                    handleTopperVisibility();--}}
{{--                                    handleEkoCakesCard();--}}

{{--                                    // Ensure the topper input visibility changes based on selection--}}
{{--                                    $('#topperBy').change(function () {--}}
{{--                                        var selectedOption = $(this).find(':selected');--}}
{{--                                        var price = selectedOption.data('wapf-price');--}}

{{--                                        if (price == '4000') {--}}
{{--                                            $('#topperInput').show(); // Show the input box if Customized Topper is selected--}}
{{--                                        } else {--}}
{{--                                            $('#topperInput').hide(); // Hide the input box for other options--}}
{{--                                        }--}}
{{--                                    });--}}

{{--                                    // Ensure custom color input visibility changes based on selection--}}
{{--                                    document.getElementById('baseColor').addEventListener('change', function () {--}}
{{--                                        var selectedOption = this.value;--}}
{{--                                        var colorOptions = document.getElementById('colorOptions');--}}

{{--                                        if (selectedOption === 'choose') {--}}
{{--                                            colorOptions.style.display = 'block';--}}
{{--                                        } else {--}}
{{--                                            colorOptions.style.display = 'none';--}}
{{--                                        }--}}
{{--                                    });--}}

{{--                                    document.getElementById('color').addEventListener('change', function () {--}}
{{--                                        var customColorInput = document.getElementById('customColor');--}}
{{--                                        if (this.value === 'custom') {--}}
{{--                                            customColorInput.classList.remove('hidden');--}}
{{--                                        } else {--}}
{{--                                            customColorInput.classList.add('hidden');--}}
{{--                                        }--}}
{{--                                    });--}}
{{--                                });--}}
{{--                            </script>--}}


                            <br/>
                        <ul class="product-cta">

                            <li>

                                <h6 class="cormorant-upright-semibold">Total Price</h6>
                                <span class="product-head-price"  style="font-size: 20px ">₦</span>
                                <input type="text" id="totalAmount" class="no-border-input" name="amount">
                                <!-- Cart Button Start -->
                                <div class="cart-btn">
                                    <div class="add-to_cart">
                                        <button type="submit" class="btn btn-dark btn-hover-primary labtn-icon-quickview" style="background-color: #EF9B00; color: black;" >
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
                            <a class="nav-link active cormorant-upright-bold" style="font-size: 15px" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab cormorant-upright-bold" style="font-size: 15px" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Additional information</a>
                        </li>

                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="product-desc-row">
                                <div class="product-desc-img ">
                                    <img width="100" src="{{asset('assets/images/eko.png')}}" alt="Image">
                                </div>
                                <div class="product-desc-content">
                                    <h5 class="cormorant-upright-bold" style="font-size: 16px">We Love Cake</h5>
                                    <h6 class="product-desc-text cormorant-upright-regular" style="font-size: 12px">{!! $product->description !!}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                            <div class="size-tab table-responsive-lg">
                                <table class="table border mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="cun-name"><span>Color</span></td>
                                        <td>Blue, Gray, Green, Red, #EF9B00</td>
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
                        <h2 class="sam" style="font-size: 15px">Related Product</h2>
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
                                        <li class="product-item__meta-action">
                                            <a class="shadow-1 labtn-icon-wishlist" href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist" data-bs-toggle="modal" data-bs-target="#modalWishlist"></a>
                                        </li>
                                        <li class="product-item__meta-action">
                                            <a class="shadow-1 labtn-icon-compare" href="#" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to compare" data-bs-toggle="modal" data-bs-target="#modalCompare"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-item__content pt-5">
                                    <h5 class="cormorant-upright-bold " style="font-size: 24px; text-transform: uppercase"><a href="{{route('cakedetail', $pro['id'])}}">{{$pro['name']}}</a></h5>
                                    <span class="cormorant-upright-regular " style="font-size: 20px; ">₦{{number_format(intval($pro['price'] *1))}}</span>
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








{{--    <script>--}}
{{--        function updatePrice(selectElementId, totalAmountId, previousPriceId) {--}}
{{--            document.getElementById(selectElementId).addEventListener('change', function() {--}}
{{--                var selectedOption = this.options[this.selectedIndex];--}}
{{--                var selectedPrice = parseFloat(selectedOption.getAttribute('data-wapf-price')) || parseFloat(this.value) || 0;--}}

{{--                var totalAmountElement = document.getElementById(totalAmountId);--}}
{{--                var totalAmount = parseFloat(totalAmountElement.value.replace(',', '')) || 0;--}}

{{--                var previousPriceElement = document.getElementById(previousPriceId);--}}
{{--                var previousPrice = parseFloat(previousPriceElement.value) || 0;--}}

{{--                totalAmount -= previousPrice;--}}
{{--                totalAmount += selectedPrice;--}}

{{--                previousPriceElement.value = selectedPrice;--}}
{{--                totalAmountElement.value = totalAmount.toFixed(2);--}}
{{--            });--}}
{{--        }--}}

{{--        // Create hidden inputs to store previous prices--}}
{{--        var previousPricesHtml = `--}}
{{--        <input type="hidden" id="previousPrice_ekoCakesCard" value="0">--}}
{{--        <input type="hidden" id="previousPrice_topperBy" value="0">--}}
{{--        <input type="hidden" id="previousPrice_opt" value="0">--}}
{{--        <input type="hidden" id="previousPrice_item" value="0">--}}
{{--    `;--}}
{{--        document.body.insertAdjacentHTML('beforeend', previousPricesHtml);--}}

{{--        // Apply the function to all relevant select elements--}}
{{--        updatePrice('ekoCakesCard', 'totalAmount', 'previousPrice_ekoCakesCard');--}}
{{--        updatePrice('topperBy', 'totalAmount', 'previousPrice_topperBy');--}}
{{--        updatePrice('opt', 'totalAmount', 'previousPrice_opt');--}}
{{--        updatePrice('item', 'totalAmount', 'previousPrice_item');--}}
{{--    </script>--}}



<script>
    $(document).ready(function() {
        // Initialize the base price
        let basePrice = parseFloat($('#productBasePrice').val()) || 0;

        // Function to update the total amount based on selected variations and attributes
        function updateTotalAmount() {
            let totalAmount = basePrice;
            let selectedOptions = [];

            // Add prices from selected radio buttons
            $('input[type="radio"]:checked').each(function() {
                selectedOptions.push($(this).val()); // Get the selected value
            });

            // Sort selected options to match the exact order used in admin settings
            selectedOptions.sort();
            let selectedKey = selectedOptions.join('|');

            // Retrieve the price for the selected combination from the stored data
            let selectedPrice = $('input[type="hidden"][data-combination="' + selectedKey + '"]').val();
            selectedPrice = parseFloat(selectedPrice) || basePrice; // Use base price if no match found

            if (selectedPrice !== basePrice) {
                totalAmount = selectedPrice;
            }

            // Add prices from selected dropdowns
            $('select').each(function() {
                let selectedOption = $(this).find('option:selected');
                let price = parseFloat(selectedOption.data('wapf-price')) || 0;
                if (selectedOption.val()) {
                    totalAmount += price;
                }
            });

            // Update the total price display
            $('#totalAmount').val(totalAmount.toFixed(2));
            console.log("Total amount: " + totalAmount);
        }

        // Bind the updateTotalAmount function to the change events
        $('input[type="radio"], select').on('change', updateTotalAmount);

        // Initial update
        updateTotalAmount();

        // Clear selections and reset price to base price
        $('#resetButton').on('click', function() {
            $('input[type="radio"]').prop('checked', false); // Uncheck all radio buttons
            $('select').prop('selectedIndex', 0); // Reset dropdowns to default
            $('#totalAmount').val(basePrice.toFixed(2)); // Reset to base price
            console.log("All options cleared. Total amount reset to base price: " + basePrice);
        });

        // Handle visibility of custom inputs based on selections
        function handleVisibility() {
            const selectedTopper = $('#topperBy').val();
            if (selectedTopper === 'select') {
                $('#topperTextSection').show();
            } else {
                $('#topperTextSection').hide().val(''); // Hide and clear the input
            }

            const selectedEkoCakesCard = $('#ekoCakesCard').val();
            if (selectedEkoCakesCard === 'yes') {
                $('#ekoCakesMessageSection').show();
            } else {
                $('#ekoCakesMessageSection').hide().val(''); // Hide and clear the input
            }

            const selectedBaseColor = $('#baseColor').val();
            if (selectedBaseColor === 'choose') {
                $('#colorOptions').show();
            } else {
                $('#colorOptions').hide();
            }

            const selectedColor = $('#color').val();
            if (selectedColor === 'custom') {
                $('#customColor').removeClass('hidden');
            } else {
                $('#customColor').addClass('hidden');
            }
        }

        // Bind visibility handlers to change events
        $('#topperBy, #ekoCakesCard, #baseColor, #color').on('change', handleVisibility);

        // Ensure initial visibility state is correct
        handleVisibility();
    });

</script>
@endsection
