@extends('layouts.header')
@section('tittle', 'Cart')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="{{asset('assets/images/bg/breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">Cart</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Shop Cart Section Start -->
    <div class="section section-padding-03" style="background-color: mintcream">
        <div class="container custom-container">
            <div class="row mb-n30">

                <div class="col-lg-8 col-12 mb-30">

                    <!-- Cart Table For Tablet & Up Devices Start -->
                    <div class="table-responsive">
                        <table class="cart-table table text-center align-middle mb-6 d-none d-md-table">
                            <thead>
                            <tr>
                                <th>Remove</th>
                                <th class="title text-start" style="font: 21px cormorant, serif">Product</th>
                                <th class="price" style="font: 21px cormorant, serif">Price</th>
                                <th class="quantity" style="font: 21px cormorant, serif">Quantity</th>
                                <th class="total" style="font: 21px cormorant, serif">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody class="border-top-0">
{{--                            @if(empty($cat))--}}
{{--                                <p>Your cart is empty.</p>--}}
{{--                            @else--}}
@forelse($cart as $key => $cat)
    <tr>
        <th class="cart-remove">
            <!-- Removed the id attribute and replaced with class -->
            <form class="remove-item-form" data-id="{{ $key }}">
                @csrf
                <input type="hidden" name="id" value="{{ $key }}">
                <button type="submit" class="cart-product-mobile-remove">Remove
                    <i class="lastudioicon lastudioicon-e-remove"></i>
                </button>
            </form>
        </th>
        <th class="cart-thumb">
            <a href="{{ route('cakedetail', $cat['id']) }}">
                <img src="{{ url($cat['image']) }}" alt="{{ $cat['name'] }}">
            </a>
        </th>
        <th class="text-start">
            <a href="{{ route('cakedetail', $cat['id']) }}" style="font-size: 14px">{{ $cat['name'] }}</a>
        </th>
        <td style="font-size: 14px">₦{{ $cat['amount'] }}</td>
        <td class="text-center cart-quantity">
            <!-- Quantity Start -->
            <div class="quantity">
                <div class="cart-plus-minus border-0 mx-auto"></div>
            </div>
            <!-- Quantity End -->
        </td>
        <td style="font-size: 14px">₦{{ $cat['amount'] }}</td>
    </tr>
@empty
    <h2 class="text-center">No Product Added yet</h2>
@endforelse

                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Table For Tablet & Up Devices End -->

                    <!-- Cart Table For Mobile Devices Start -->
                    <div class="cart-products-mobile d-md-none">
                        @foreach($cart as $key => $cat)
                            <div class="cart-product-mobile">
                                <div class="cart-product-mobile-thumb">
                                    <a href="{{ route('cakedetail', $cat['id']) }}" class="cart-product-mobile-image">
                                        <img src="{{ url($cat['image']) }}" alt="{{ $cat['name'] }}" width="90" height="103">
                                    </a>
                                    <!-- Form for removing item from cart -->
                                    <form class="remove-item-form" data-id="{{ $cat['id'] }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $cat['id'] }}">
                                        <button type="submit" class="cart-product-mobile-remove">
                                            <i class="lastudioicon lastudioicon-e-remove"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="cart-product-mobile-content">
                                    <h5 class="cart-product-mobile-title">
                                        <a href="{{ route('cakedetail', $cat['id']) }}" style="font-size: 14px">{{ $cat['name'] }}</a>
                                    </h5>
                                    <span class="cart-product-mobile-quantity" style="font-size: 14px">1 x ₦{{ $cat['amount'] }}</span>
                                    <span class="cart-product-mobile-total"><b style="font-size: 14px">Total: ₦{{ $cat['amount'] }}</b></span>
                                    <!-- Quantity Start -->
                                    <div class="quantity">
                                        <div class="cart-plus-minus border-0"></div>
                                    </div>
                                    <!-- Quantity End -->
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- Cart Table For Mobile Devices End -->

                    <!-- Cart Action Buttons Start -->
                    <div class="row justify-content-between gap-3">
                        <div class="col-auto"><a href="{{route('cakes')}}" class="btn btn-outline-dark btn-primary-hover rounded-0" style="font-size: 14px">Continue Shopping</a></div>
                        <div class="col-auto d-flex flex-wrap gap-3">
                            <button class="btn btn-outline-dark btn-primary-hover rounded-0" id="clearcart" style="font-size: 14px">Clear Cart</button>
                        </div>
                    </div>
                    <!-- Cart Action Buttons End -->

                </div>

                <!-- Cart Totals Start -->
                <div class="col-lg-4 col-12 mb-30">
                    <div class="cart-totals">
                        <div class="cart-totals-inner">
                            <h4 class="title" style="font-size: 14px">Cart totals</h4>
                            <table class="table bg-transparent">
                                <tbody>
                                <tr class="subtotal">
                                    <th class="sub-title" style="font-size: 14px">Subtotal</th>
{{--                                    @if(empty($cat))--}}
{{--                                        <td class="amount"><span >₦{{number_format(intval(0 *1))}}</span></td>--}}
{{--                                    @else--}}
                                    <td class="amount"><span style="font-size: 14px">₦{{number_format(intval($cartsum *1))}}</span></td>
{{--                                    @endif--}}
                                </tr>
                                <tr class="total">
                                    <th class="sub-title" style="font-size: 14px">Total</th>
{{--                                    @if(empty($cat))--}}
{{--                                        <td class="amount"><span >₦{{number_format(intval(0 *1))}}</span></td>--}}
{{--                                    @else--}}
                                    <td class="amount"><strong style="font-size: 14px">₦{{number_format(intval($cartsum *1))}}</strong></td>
{{--                                    @endif--}}
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <a href="{{route('checkout')}}" class="btn btn-dark btn-hover-primary rounded-0 w-100">Proceed to checkout</a>
                    </div>
                </div>
                <!-- Cart Totals End -->

            </div>
        </div>
    </div>
    <!-- Shop Cart Section End -->
    <script>
        $(document).ready(function() {
            $('.remove-item-form').on('submit', function(e) {
                e.preventDefault(); // Prevent form submission

                var idValue = $(this).find('input[name="id"]').val(); // Get the ID from the hidden input

                // Show the loading toast notification
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'info',
                    title: 'Processing',
                    text: 'Please wait...',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 3000
                });

                // Send the selected value to the cancelcart route via AJAX
                $.ajax({
                    url: '{{ route('cancelcart') }}', // Ensure your route is correct
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token for security
                        id: idValue // Pass the product ID
                    },
                    success: function(response) {
                        // Handle the successful response
                        if (response.status === '1') {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 3000
                            }).then(() => {
                                location.reload(); // Reload the page to update the cart
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'info',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 3000
                            }).then(() => {
                                location.reload(); // Reload the page to update the cart
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Failed',
                            text: xhr.responseText,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#clearcart').click(function() {
                // Show the loading spinner
                Swal.fire({
                    title: 'Processing',
                    text: 'Please wait...',
                    icon: 'info',
                    allowOutsideClick: false,
                    showConfirmButton: false
                });

                // Send the selected value to the '/getOptions' route
                $.ajax({
                    url: '/clearcart/',
                    type: 'GET',
                    success: function(response) {
                        // Handle the successful response
                        if (response.status == '1') {
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
                        Swal.fire({
                            icon: 'error',
                            title: 'Fail',
                            text: xhr.responseText
                        });
                        // Handle any errors
                        console.log(xhr.responseText);
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
@endsection
