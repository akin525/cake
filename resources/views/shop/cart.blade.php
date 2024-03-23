@extends('layouts.header')
@section('tittle', 'Cart')
@section('content')

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
                                <th></th>
                                <th></th>
                                <th class="title text-start" style="font: 21px cormorant, serif">Product</th>
                                <th class="price" style="font: 21px cormorant, serif">Price</th>
                                <th class="quantity" style="font: 21px cormorant, serif">Quantity</th>
                                <th class="total" style="font: 21px cormorant, serif">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody class="border-top-0">
                            @forelse($cart as $cat)
                            <tr>
                                <th class="cart-remove">
                                    <button class="remove-btn" id="cancelcart" data-id="{{$cat['id']}}"><i class="lastudioicon lastudioicon-e-remove"></i></button>
                                </th>
                                <th class="cart-thumb">
                                    <a href="{{route('cakedetail',$cat['id'])}}">
                                        <img src="{{url($cat['image'])}}" alt="Croissant Italy Cake">
                                    </a>
                                </th>
                                <th class="text-start">
                                    <a href="{{route('cakedetail',$cat['id'])}}">{{$cat['name']}}</a>
                                </th>
                                <td>₦{{$cat['amount']}}</td>
                                <td class="text-center cart-quantity">
                                    <!-- Quantity Start -->
                                    <div class="quantity">
                                        <div class="cart-plus-minus border-0 mx-auto"></div>
                                    </div>
                                    <!-- Quantity End -->
                                </td>
                                <td>₦{{$cat['amount']}}</td>
                            </tr>
                            @empty
                                <h2 class="text-center"> No Product Added yet</h2>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Table For Tablet & Up Devices End -->

                    <!-- Cart Table For Mobile Devices Start -->
                    <div class="cart-products-mobile d-md-none">
                        @foreach($cart as $cat)
                        <div class="cart-product-mobile">
                            <div class="cart-product-mobile-thumb">
                                <a href="{{route('cakedetail', $cat['id'])}}" class="cart-product-mobile-image"><img src="{{url($cat['image'])}}" alt="{{url($cat['image'])}}" width="90" height="103"></a>
                                <button class="cart-product-mobile-remove" id="cancelcart" data-id="{{$cat['id']}}"><i class="lastudioicon lastudioicon-e-remove"></i></button>
                            </div>
                            <div class="cart-product-mobile-content">
                                <h5 class="cart-product-mobile-title"><a href="{{route('cakedetail', $cat['id'])}}">{{$cat['name']}}</a></h5>
                                <span class="cart-product-mobile-quantity">1 x ₦{{$cat['amount']}}</span>
                                <span class="cart-product-mobile-total"><b>Total:₦{{$cat['amount']}}</b> </span>
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
                        <div class="col-auto"><a href="{{route('cakes')}}" class="btn btn-outline-dark btn-primary-hover rounded-0">Continue Shopping</a></div>
                        <div class="col-auto d-flex flex-wrap gap-3">
                            <button class="btn btn-outline-dark btn-primary-hover rounded-0" id="clearcart">Clear Cart</button>
                        </div>
                    </div>
                    <!-- Cart Action Buttons End -->

                </div>

                <!-- Cart Totals Start -->
                <div class="col-lg-4 col-12 mb-30">
                    <div class="cart-totals">
                        <div class="cart-totals-inner">
                            <h4 class="title">Cart totals</h4>
                            <table class="table bg-transparent">
                                <tbody>
                                <tr class="subtotal">
                                    <th class="sub-title">Subtotal</th>
                                    <td class="amount"><span >₦{{number_format(intval($cartsum *1))}}</span></td>
                                </tr>
                                <tr class="total">
                                    <th class="sub-title">Total</th>
                                    <td class="amount"><strong>₦{{number_format(intval($cartsum *1))}}</strong></td>
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
            $('#cancelcart').click(function() {
                var idValue = $(this).data('id'); // Get the ID value from data attribute

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
                    url: '/cancelcart/' + idValue,
                    type: 'GET',
                    data: { id: idValue }, // Pass the ID value in the request
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
