@extends('layouts.header')
@section('tittle', 'Checkout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
    <script>
        window.onload = function() {
            setTimeout(function() {
                {{--var username = @json(Auth::user()->username);--}}
                const message = {{$alert->message}}

                Swal.fire({
                    title: 'Note:',
                    html: {{$alert->message}},
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
                        <h1 class="breadcrumb_title">Checkout</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{url('/')}}">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>

    <!-- Product Section Start -->
    <div class="shop-product-section section section-padding-03">
{{--        <div class="container custom-container" style="border-radius: 50px; background-color: #ffffff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);">--}}
        <div class="container custom-container" >
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <form class="checkout-form" id="checkout" >
                @csrf
                <div class="row g-8">

                    <div class="col-lg-7">

                        <!-- Billing Address -->
                        <div id="billing-form">
                            <h4 class="mb-4 cormorant-upright-regular">Customer Details</h4>
                            <div class="row row-cols-sm-2 row-cols-1 g-4">
                                <div class="col">
                                    <h4 class="mb-4" style="font-size: 14px">Full Name*</h4>
                                    <input class="form-field" name="name"  type="text" required>
                                    <input type="hidden" name="checkout" value="{{$checkout}}">

                                </div>
                                {{--                                <div class="col">--}}
                                {{--                                    <label>Last Name*</label>--}}
                                {{--                                    <input class="form-field" type="text">--}}
                                {{--                                </div>--}}
                                <div class="col">
                                    <h4 class="mb-4" style="font-size: 14px">Email Address*</h4>
                                    <input class="form-field" id="email" name="email" type="email"  required>
                                </div>
                                <div class="col">
                                    <h4 class="mb-4" style="font-size: 14px">Phone no*</h4>
                                    <input class="form-field" type="text"  name="phone" required>
                                </div>
                                {{--                                <div class="col-sm-12">--}}
                                {{--                                    <label>Company Name</label>--}}
                                {{--                                    <input class="form-field" type="text">--}}
                                {{--                                </div>--}}
                                <div class="col-sm-12">
                                    <h4 class="mb-4" style="font-size: 14px">Street address</h4>
                                    <input class="form-field" type="text" name="address" placeholder="Street address" required>
                                </div>
                                <div class="col-sm-12">
                                    <input class="form-field" type="text" name="apartment" placeholder="Apartment, suite, unit, etc. (optional)">
                                </div>
                                <div class="col">
                                    <h4 class="mb-4" style="font-size: 14px">Location</h4>
                                    <div class="select-wrapper">
                                        <select class="form-field" name="country" required>
                                            <option value=Eko"">Eko(Lagos)</option>
                                            <option value="ibadan">Ibadan</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col">
                                <h4 class="mb-4" style="font-size: 14px">City/Town*</h4>
                                <div class="select-wrapper">
                                    <input type="text" class="form-field" name="city" required>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="mb-4" style="font-size: 14px">Delivery Date *</h4>
                                <input class="form-field" type="date" name="date" id="today" placeholder="Choose date" required>
                                <br/>
                                <br/>
                                <input type="text" class="form-field" name="date" id="formatted-date" readonly style="display: none;">
                            </div>
                            <br/>
                            <script>
                                document.getElementById('today').addEventListener('change', function() {
                                    var dateInput = this.value;
                                    var date = new Date(dateInput);
                                    var day = ("0" + date.getDate()).slice(-2);
                                    var month = ("0" + (date.getMonth() + 1)).slice(-2);
                                    var year = date.getFullYear().toString().slice(-2);
                                    var formattedDate = day + '/' + month + '/' + year;

                                    // Display the formatted date in the console (or update another input/display field)
                                    console.log(formattedDate);
                                    document.getElementById('formatted-date').value = formattedDate;
                                    document.getElementById('formatted-date').style.display = 'block'; // Show the formatted date field if needed
                                });
                            </script>

                            <h4 class="mb-4" style="font-size: 14px">Delivery Time *</h4>
                            <div class="col">
                                <h4 class="mb-4" style="font-size: 14px">Choose Delivery Time (optional)</h4>
                                <div class="select-wrapper">
                                    <select name="time" id="daypart" class="form-field" data-placeholder="">
                                        <option value="blank">Select a delivery time</option>
                                        <option value="08:30am - 12:00pm">08:30am - 12:00pm</option>
                                        <option value="12:00pm - 04:00pm">12:00pm - 04:00pm</option>
                                        <option value="4:00pm - 8:00pm">4:00pm - 8:00pm</option>
                                        <option value="8am to 4pm">8am to 4pm READY TO GO ONLY</option>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <script>
                                function getFormattedDate(date) {
                                    const year = date.getFullYear();
                                    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
                                    const day = String(date.getDate()).padStart(2, '0');
                                    return `${year}-${month}-${day}`;
                                }

                                function setMinDate() {
                                    var today = new Date();
                                    var day = String(today.getDate() + 1).padStart(2, '0'); // Set to tomorrow
                                    var month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                                    var year = today.getFullYear();

                                    var minDate = year + '-' + month + '-' + day;
                                    document.getElementById('today').setAttribute('min', minDate);
                                }

                                document.addEventListener("DOMContentLoaded", function() {
                                    setMinDate();
                                });

                                document.getElementById('daypart').addEventListener('change', function() {
                                    var selectedTime = document.getElementById('daypart').value;
                                    var dateInput = document.getElementById('today');
                                    var now = new Date();

                                    if (selectedTime === "8am to 4pm") {
                                        dateInput.setAttribute('min', getFormattedDate(now)); // Allow today's date
                                    } else {
                                        setMinDate(); // Revert to tomorrow's date as minimum
                                        dateInput.value = ""; // Clear the value if a different time is selected
                                    }

                                    console.log(getFormattedDate(now));
                                });
                            </script>

                            {{--                                <div class="col-sm-12 d-flex flex-wrap gap-6">--}}
                            {{--                                    <div class="form-check m-0">--}}
                            {{--                                        <input class="form-check-input" type="checkbox" id="create_account">--}}
                            {{--                                        <label class="form-check-label" for="create_account">Create an Acount?</label>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="form-check m-0">--}}
                            {{--                                        <input class="form-check-input" type="checkbox" id="shiping_address" data-toggle-shipping="#shipping-form">--}}
                            {{--                                        <label class="form-check-label" for="shiping_address">Ship to Different Address</label>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                        </div>

                    </div>


                    <div class="col-lg-7">

                        <!-- Billing Address -->
                        <div id="billing-form">
                            <h4 class="mb-4" style="font-size: 14px"">Recipient Details</h4>
                            <div class="row row-cols-sm-2 row-cols-1 g-4">
                                <div class="col">
                                    <h4 class="mb-4" style="font-size: 14px">Full Name*</h4>
                                    <input class="form-field" name="namec"  type="text" required>

                                </div>
                                <div class="col">
                                    <h4 class="mb-4" style="font-size: 14px">Email Address*</h4>
                                    <input class="form-field" id="email" name="emailc" type="email"  required>
                                </div>
                                <div class="col">
                                    <h4 class="mb-4" style="font-size: 14px">Phone no*</h4>
                                    <input class="form-field" type="text"  name="phonec" required>
                                </div>
                                <div class="col-sm-12">
                                    <h4 class="mb-4" style="font-size: 14px">Street address</h4>
                                    <input class="form-field" type="text" name="addressc" placeholder="Street address" required>
                                </div>
                                <div class="col">
                                    <h4 class="mb-4" style="font-size: 14px">Location</h4>
                                    <div class="select-wrapper">
                                        <select class="form-field" name="countryc" required>
                                            <option value=Eko"">Eko(Lagos)</option>
                                            <option value="ibadan">Ibadan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="mb-4" style="font-size: 14px">City/Town*</h4>
                                <div class="select-wrapper">
                                    <input type="text" class="form-field" name="cityc" required>
                                </div>
                            </div>

                            <br/>
                        </div>

                    </div>

                </div>

                <div class="col-lg-5">

                    {{--                        <!-- Checkout Summary Start -->--}}
                    <div class="checkout-box">

                        <h4 class="mb-4">Cart Total</h4>

                        <table class="checkout-summary-table table table-borderless">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cart as $cat)
                                <tr>
                                    <td>{{ $cat['name'] }}</td>
                                    <td>₦{{ number_format($cat['amount']) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No items in the cart</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="border-top">Grand Total</th>
                                <th class="border-top">₦{{ number_format($checkout) }}</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- Checkout Summary End -->

                    <!-- Payment Method Start -->
                    <div class="checkout-box">
                        <h4 class="mb-4">Payment Method</h4>
                        <input type="hidden" name="amount" value="{{$checkout}}">
                        {{--                                    <a href="#" class="btn btn-dark btn-primary-hover rounded-0 mt-6">Direct Bank Transfer</a>--}}
                        {{--                                    <a href="#" class="btn btn-dark btn-primary-hover rounded-0 mt-6">Cash on Delivery</a>--}}
                        <button type="submit" class="btn btn-dark btn-primary-hover rounded-0 mt-6" >Place Order</button>
                    </div>
                    <!-- Payment Method End -->

                </div>
            </form>

        </div>
    </div>


    <script>
        $(document).ready(function() {
            // Fetch country data
            $.ajax({
                url: "https://restcountries.com/v3.1/all",
                type: "GET",
                success: function(data) {
                    // Populate country select
                    $.each(data, function(index, country) {
                        $('#countrySelect').append('<option value="' + country.name.common + '">' + country.name.common + '</option>');
                    });
                }
            });

            // Handle country select change event
            $('#countrySelect').change(function() {
                var selectedCountry = $(this).val();
                // Fetch states for the selected country
                $.ajax({
                    url: "https://yourapi.com/getstates?country=" + selectedCountry,
                    type: "GET",
                    success: function(data) {
                        // Populate state select
                        $('#stateSelect').empty();
                        $('#stateSelect').append('<option value="">Select State</option>');
                        $.each(data, function(index, state) {
                            $('#stateSelect').append('<option value="' + state + '">' + state + '</option>');
                        });
                    }
                });
            });
        });

    </script>
    <script>
        function processPayment() {
            const selectedPaymentMethod = document.querySelector('input[name="payment-method"]:checked');
            if (selectedPaymentMethod && selectedPaymentMethod.id === 'payment_card') {
                payWithPaystack();
            } else {
                // Implement other payment methods or show error message
                alert('Please select Card Payment method.');
            }
        }

        function payWithPaystack() {
            let handler = PaystackPop.setup({
                key: 'pk_test_xxxxxxxxxx', // Replace with your public key
                email: document.getElementById("email").value,
                amount: document.getElementById("amount").value * 100,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                // label: "Optional string that replaces customer email"
                onClose: function(){
                    alert('Window closed.');
                },
                callback: function(response){
                    let message = 'Payment complete! Reference: ' + response.reference;
                    alert(message);
                }
            });

            handler.openIframe();
        }
    </script>


    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#checkout').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{ route('check') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle the success response here
                        // $('#loadingSpinner').hide();

                        console.log(response);
                        // Update the page or perform any other actions based on the response

                        if (response.status == 'success') {
                            window.location.href = response.url;
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Pending',
                                text: response.message
                            });
                            // Handle any other response status
                        }

                    },
                    // $('#loadingSpinner').hide();

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
