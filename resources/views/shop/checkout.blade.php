@extends('layouts.header')
@section('tittle', 'Checkout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
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

    <!-- Product Section Start -->
    <div class="shop-product-section section section-padding-03">
        <div class="container custom-container">
            <form class="checkout-form" method="post" action="{{route('check')}}">
                @csrf
                <div class="row g-8">

                    <div class="col-lg-7">

                        <!-- Billing Address -->
                        <div id="billing-form">
                            <h4 class="mb-4">Billing Address</h4>
                            <div class="row row-cols-sm-2 row-cols-1 g-4">
                                <div class="col">
                                    <label>Full Name*</label>
                                    <input class="form-field" name="name" value="{{Auth::user()->name}}" type="text" required>
                                    <input type="hidden" name="checkout" value="{{$checkout}}">

                                </div>
{{--                                <div class="col">--}}
{{--                                    <label>Last Name*</label>--}}
{{--                                    <input class="form-field" type="text">--}}
{{--                                </div>--}}
                                <div class="col">
                                    <label>Email Address*</label>
                                    <input class="form-field" id="email" name="email" type="email" value="{{Auth::user()->email}}" required>
                                </div>
                                <div class="col">
                                    <label>Phone no*</label>
                                    <input class="form-field" type="text"  name="phone" required>
                                </div>
{{--                                <div class="col-sm-12">--}}
{{--                                    <label>Company Name</label>--}}
{{--                                    <input class="form-field" type="text">--}}
{{--                                </div>--}}
                                <div class="col-sm-12">
                                    <label>Address*</label>
                                    <input class="form-field" type="text" name="address" placeholder="Address line 1" required>
                                </div>
                                <div class="col-sm-12">
                                    <input class="form-field" type="text" placeholder="Address line 2">
                                </div>
                                <div class="col">
                                    <label>Location</label>
                                    <div class="select-wrapper">
                                        <select class="form-field" name="country" required>
                                            <option value=Eko"">Eko(Lagos)</option>
                                            <option value="ibadan">Ibadan</option>
                                        </select>
                                    </div>
                                </div>
{{--                                <div class="col">--}}
{{--                                    <label>State*</label>--}}
{{--                                    <div class="select-wrapper">--}}
{{--                                        <select class="form-field" id="stateSelect" name="state" required>--}}
{{--                                            <option value="">Select State</option>--}}
{{--                                            @foreach($state as $st)--}}
{{--                                            <option value="{{$st['name']}}">{{$st['name']}}</option>--}}
{{--                                            @endforeach--}}

{{--                                        </select>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="col">
                                    <label>City/Town*</label>
                                    <div class="select-wrapper">
                                        <input type="text" class="form-field" name="city" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <label>Zip Code*</label>
                                    <input class="form-field" type="text" name="postal_code" required>
                                </div>
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

                    </div>

                    <div class="col-lg-5">

                        <!-- Checkout Summary Start -->
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
                                    <td>{{$cat['name']}}</td>
                                    <td>₦{{number_format(intval($cat['amount'] *1))}}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td>Empty</td>
                                        <td>₦0.00</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="border-top">Grand Total</th>
                                    <th class="border-top">₦{{number_format(intval($checkout *1))}}</th>
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

                </div>
            </form>
        </div>
    </div>
    <script src="https://js.paystack.co/v1/inline.js"></script>

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




@endsection
