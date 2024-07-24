@extends('admin.layouts.sidebar')
@section('tittle', 'Order-Details')
@section('content')
    <div class="row mb-9 align-items-center justify-content-between">
        <div class="col-sm-6 mb-8 mb-sm-0">
            <h2 class="fs-4 mb-0">Order List</h2>
            <p class="mb-0">{{$product->name}}</p>
        </div>
    </div>

    <div class="card rounded-4">
        <header class="card-header bg-transparent p-7">
            <div class="row align-items-center">
                <div class="col-md-6 mb-lg-0 mb-6">
                    <span class="d-inline-block"><i class="far fa-calendar me-3"></i>{{$order->created_at}}</span>
                    <br>
                    <small class="text-muted">Order ID: {{$order->order_id}}</small>
                </div>
                <form method="post" action="#" class="col-md-6 ml-auto d-flex justify-content-md-end flex-wrap">
                    @csrf
                    <div class="mw-210 me-5 my-3">
                        <select class="form-select" name="status">
                            <option>Change status</option>
                            <option>Awaiting payment</option>
                            <option>Confirmed</option>
                            <option>Shipped</option>
                            <option>Delivered</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary my-3" >Save</button>
                    <a class="btn btn-dark print ms-5 my-3" href="#"><i class="far fa-print"></i></a>
                </form>
            </div>
        </header>
        <div class="card-body p-7">
            <div class="row mb-8 mt-4 order-info-wrap">
                <div class="col-md-4 mb-md-0 mb-7">
                    <div class="d-flex flex-nowrap">
                        <div class="icon-wrap">
<span class="rounded-circle px-6 py-5 bg-green-light me-6 text-green d-inline-block">
<i class="fas fa-user px-1"></i>
</span>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-4">Customer</h6>
                            <p class="mb-4">
                                {{$order->name}}<br>
                                {{$address->email}}<br>
                                {{$address->phone}}
                            </p>
                            <a href="#" class="btn-link-custom">View profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-md-0 mb-7">
                    <div class="d-flex flex-nowrap">
                        <div class="icon-wrap">
<span class="rounded-circle p-5 bg-green-light me-6 text-green d-inline-block">
<i class="fas fa-truck px-2"></i>
</span>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-4">Order info</h6>
                            <p class="mb-4">
                                Shipping: {{$address->address_line1}}<br>
                                Pay method: paystack <br>
                                Status: @if($order->status == 0)
                                    <span class="badge badge-soft-warning"> Pending </span> @else
                                    <span class="badge badge-soft-success">Delivered </span> @endif
                            </p>
                            <a href="#" class="btn-link-custom">Download info</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-nowrap">
                        <div class="icon-wrap">
<span class="rounded-circle p-5 bg-green-light me-6 text-green d-inline-block">
<i class="fas fa-truck px-2"></i>
</span>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-4">Deliver to</h6>
                            <p class="mb-4">
                                City: {{$address->city}} <br>{{$address->address_line1}} <br>
                                {{$address->country}}
                            </p>
                            <a href="#" class="btn-link-custom">View profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Color</th>
                                <th>Layer</th>
                                <th>Flavour</th>
                                <th>Topper</th>
                                <th>Card</th>
                                <th>Quantity</th>
                                <th class="text-end">Total</th>
                            </tr>
                            </thead>
                            <tbody><tr>
                                <td>
                                    <div class="d-flex align-items-center flex-nowrap">
                                        <a href="#" title="Flowers cotton dress">
                                            <img src="#" data-src="{{url($order->image)}}" alt="Flowers cotton dress" class="lazy-image" width="60" height="80">
                                        </a>
                                        <a href="#" title="Flowers cotton dress" class="ms-6">
                                            <p class="fw-semibold text-body-emphasis mb-0">{{$product->name}}</p>
                                        </a>
                                    </div>
                                </td>
                                <td>₦{{ number_format(intval($order->price * 1)) }}</td>
                                <td>{{$order->color}}</td>
                                <td>{{$order->layer}}</td>
                                <td>{{$order->flavour}}</td>
                                <td>{{$order->topper}}</td>
                                <td>{{$order->card}}</td>
                                <td>{{$order->card}}</td>
                                <td>1</td>
                                <td class="text-end">₦{{ number_format(intval($order->price * 1)) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
