@extends('layouts.header')
@section('tittle', 'Dashboard')
@section('content')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb" data-bg-image="assets/images/bg/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">My Account</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->



    <!-- My Account Section Start -->
    <div class="section section-padding-03">
        <div class="container custom-container">
            <div class="row g-lg-10 g-6">

                <!-- My Account Tab List Start -->
                <div class="col-lg-4 col-12">
                    <ul class="my-account-tab-list nav">
                        <li><a href="#dashboad" class="active" data-bs-toggle="tab"><i class="lastudioicon-home-2"></i> Dashboard</a></li>
                        <li><a href="#orders" data-bs-toggle="tab"><i class="dlicon files_notebook"></i> Orders</a></li>
                        <li><a href="#download" data-bs-toggle="tab"><i class="dlicon shopping_mobile-cart"></i> Cart</a></li>
                        <li><a href="#address" data-bs-toggle="tab"><i class="dlicon location_map-big"></i> address</a></li>
                        <li><a href="#account-info" data-bs-toggle="tab"><i class="dlicon users_single-01"></i> Account Details</a></li>
                        <li><a href="#"><i class="dlicon arrows-1_log-out"></i> Logout</a></li>
                    </ul>
                </div>
                <!-- My Account Tab List End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-8 col-12">
                    <div class="tab-content">

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="dashboad">
                            <div class="myaccount-content dashboad">
                                <div class="alert alert-light">Hello <b>{{Auth::user()->name}}</b></div>
                                <p>From your account dashboard you can view your <u>recent orders</u>, manage your <u>shipping and billing addresses</u>, and <u>edit your password and account details</u>.</p>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="orders">
                            <div class="myaccount-content order">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($order as $orders)
                                        <tr>
                                            <td>{{$orders['id']}}</td>
                                            <td>{{$orders['created_at']}}</td>
                                            <td>{{$orders['status']}}</td>
                                            <td>₦{{number_format(intval($orders['amount'] *1))}}</td>
                                            <td><a href="#"><b>View</b></a></td>
                                        </tr>
                                        @empty
                                        <h3><b>Orders Empty</b></h3>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="download">
                            <div class="myaccount-content download">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="title text-start">Product</th>
                                            <th class="price">Price</th>
                                            <th class="quantity">Quantity</th>
                                            <th class="total">Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($cart as $cat)
                                            <tr>
{{--                                                <th class="cart-remove">--}}
{{--                                                    <button class="remove-btn" id="cancelcart" data-id="{{$cat['id']}}"><i class="lastudioicon lastudioicon-e-remove"></i></button>--}}
{{--                                                </th>--}}
                                                <th class="cart-thumb">
                                                    <a href="{{route('cakedetail',$cat['id'])}}">
                                                        <img width="50" src="{{url($cat['image'])}}" alt="Croissant Italy Cake">
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
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="address">
                            <div class="myaccount-content address">
                                <div class="alert alert-light">The following addresses will be used on the checkout page by default.</div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h4 class="title">Billing Address <a href="#" class="edit-link">edit</a></h4>
                                        @if(!empty($address))
                                        <address>
                                            <p class="name"><strong>{{Auth::user()->name}}</strong></p>
                                            <p class="mb-3">{{$address->address_line1}} <br>
                                                {{$address->city}} {{$address->state}}</p>
                                            <p>Mobile: {{$address->phone}}</p>
                                        </address>
                                            @else
                                            <h4><b>No Billing Address</b></h4>
                                            @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h4 class="title">Shipping Address <a href="#" class="edit-link">edit</a></h4>
                                        @if(!empty($address))
                                            <address>
                                                <p class="name"><strong>{{Auth::user()->name}}</strong></p>
                                                <p class="mb-3">{{$address->address_line1}} <br>
                                                    {{$address->city}} {{$address->state}}</p>
                                                <p>Mobile: {{$address->phone}}</p>
                                            </address>
                                            @else
                                                <h4><b>No Shipping Address</b></h4>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="account-info">
                            <div class="myaccount-content account-details">
                                <div class="account-details-form">
                                    <form action="#">
                                        <div class="row g-4">
                                            <div class="col-md-6 col-12">
                                                <div class="single-input-item">
                                                    <label for="first-name">First Name <abbr class="required">*</abbr></label>
                                                    <input class="form-field" type="text" id="first-name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="single-input-item">
                                                    <label for="last-name">Last Name <abbr class="required">*</abbr></label>
                                                    <input class="form-field" type="text" id="last-name">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="display-name">Display Name <abbr class="required">*</abbr></label>
                                                <input class="form-field" type="text" id="display-name">
                                                <p class="small mt-1">This will be how your name will be displayed in the account section and in reviews</p>
                                            </div>
                                            <div class="col-12">
                                                <label for="email">Email Addres <abbr class="required">*</abbr></label>
                                                <input class="form-field" type="email" id="email">
                                            </div>
                                            <div class="col-12">
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="row g-4">
                                                        <div class="col-12">
                                                            <label for="current-pwd">Current password (leave blank to leave unchanged)</label>
                                                            <input class="form-field" type="password" id="current-pwd">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="new-pwd">New password (leave blank to leave unchanged)</label>
                                                            <input class="form-field" type="password" id="new-pwd">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="confirm-pwd">Confirm new password</label>
                                                            <input class="form-field" type="password" id="confirm-pwd">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-dark btn-primary-hover">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- Single Tab Content End -->

                    </div>
                </div> <!-- My Account Tab Content End -->

            </div>
        </div>
    </div>
    <!-- My Account Section End -->

@endsection
