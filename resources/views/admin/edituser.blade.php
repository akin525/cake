@extends('admin.layouts.sidebar')
@section('tittle', $user->name)
@section('content')
    <div class="card mb-5 rounded-4 card-brand">
        <div class="card-header p-15" style="background-color: #B88539"></div>
        <div class="card-body p-7">
            <div class="row">
                <div class="col-xl col-lg flex-grow-0 mb-xl-0 mb-7" style="flex-basis: 230px">
                    <div class="img-thumbnail shadow w-100 bg-body position-relative text-center mt-n20 py-3 px-4">
                        <img class="lazy-image img-fluid" src="#" data-src="{{asset('assets/images/eko.png')}}" alt="Logo Brand" width="180" height="180">
                    </div>
                </div>
                <div class="col-xl col-lg">
                    <h3 class="fs-4 mb-0">{{$user->name}}</h3>
                    <p>{{$address->address_line1 ?? null}}</p>
                </div>
                <div class="col-xl-4 text-xl-end">
                    <select class="form-control w-auto d-inline-block my-4">
                        <option>Actions</option>
                        <option>Disable shop</option>
                        <option>Analyze</option>
                        <option>Something</option>
                    </select>
                    <a href="#" class="btn btn-primary"> <span class="d-inline-block me-4"> View live</span> <i class="fas fa-external-link"></i> </a>
                </div>
            </div>
            <hr class="my-7">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-2 mb-8 mb-lg-0">
                    <article class="border p-6 rounded">
                        <p class="mb-0 text-muted">All Order:</p>
                        <h5 class="text-success">{{$orderc}}</h5>
                        <p class="mb-0 text-muted">Payments:</p>
                        <h5 class="text-success mb-0">₦{{number_format(intval($payments *1),2)}}</h5>
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 mb-sm-0 mb-7">
                    <h6 class="fs-18px mb-4">Contacts</h6>
                    <p class="mb-0">
                        {{$user->name}} <br>
                        {{$user->email}}<br>
                        {{$address->phone ?? null}}
                    </p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <h6 class="fs-18px mb-4">Address</h6>
                    <p class="mb-0">
                        Country: {{$address->country ?? null}} <br>
                        Address: {{$address->address_line1 ?? null}}<br>
                        Postal code: {{$address->postal_code ?? null}}
                    </p>
                </div>
                <div class="col-sm-6 col-xl-4 text-xl-right d-flex align-items-center mt-xl-0 mt-7 justify-content-xl-end">
                    <div class="mapbox position-relative d-inline-block">
                        <img src="{{asset('admin/assets/images/dashboard/map.jpg')}}" class="rounded" height="120" alt="map">
                        <span class="map-pin" style="top: 50px; left: 100px"></span>
                        <button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 mb-6 me-6 fs-12px">Large</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4 rounded-4">
        <div class="card-body p-7">
            <h2 class="card-title fs-4 mb-6">Orders by Customer</h2>
            <div class="row mx-n5">
                @forelse($order as $orders)
                <div class="col-sm-6 col-xl-custom px-5">
                    <div class="card rounded-xl card-product mb-7">
                        <a href="#" title="Facial cleanser">
                            <img src="#" data-src="{{$orders['image']}}" alt class="lazy-image card-img-top" width="270" height="360">
                        </a>
                        <div class="card-body p-6">
                            <a href="#" class="cart-title">{{$orders['name']}}</a>
                            <div class="price mb-4 text-primary fw-500">₦{{number_format(intval($orders['price'] *1),2)}}</div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center"><b>No Order for this customer</b></p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
