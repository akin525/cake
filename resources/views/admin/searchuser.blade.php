@extends('admin.layouts.sidebar')
@section('tittle', 'Search Users')
@section('content')
<div class="row mb-9 align-items-center justify-content-between">
    <div class="col-sm-6 mb-8 mb-sm-0">
        <h2 class="fs-4 mb-0">Search Customer</h2>
    </div>
</div>

<div class="card mb-4 rounded-4 p-7">
    <form action="{{route('admin/search')}}" method="post">
        @csrf
    <div class="card-header bg-transparent px-0 pt-0 pb-7">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-4 col-12 mr-auto mb-md-0 mb-6">
                <input type="text" name="name" placeholder="Enter Customer Name" class="form-control bg-input border-0">
            </div>
            <div class="col-md-8">
                <div class="row justify-content-end flex-nowrap d-flex">
                    <div class="col-lg-3 col-md-6 col-6">
                        <button type="submit" class="btn btn-primary">
                            <i class="far faq-search"></i>
                            <span class="d-inline-block ml-1">Search</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    @isset($user)
        @forelse($user as $users)
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
                            <h3 class="fs-4 mb-0">{{$users->name}}</h3>
                        </div>

                    </div>
                    <hr class="my-7">
                    <div class="row">
{{--                        <div class="col-md-12 col-lg-4 col-xl-2 mb-8 mb-lg-0">--}}
{{--                            <article class="border p-6 rounded">--}}
{{--                                <p class="mb-0 text-muted">All Order:</p>--}}
{{--                                <h5 class="text-success">{{$orderc}}</h5>--}}
{{--                                <p class="mb-0 text-muted">Payments:</p>--}}
{{--                                <h5 class="text-success mb-0">₦{{number_format(intval($payments *1),2)}}</h5>--}}
{{--                            </article>--}}
{{--                        </div>--}}
                        <div class="col-sm-6 col-lg-4 col-xl-3 mb-sm-0 mb-7">
                            <h6 class="fs-18px mb-4">Contacts</h6>
                            <p class="mb-0">
                                {{$users->name}} <br>
                                {{$users->email}}<br>
                                {{$users->number ?? null}}
                            </p>
                        </div>
                        <div class="col-sm-6 col-xl-4 text-xl-right d-flex align-items-center mt-xl-0 mt-7 justify-content-xl-end">
                            <div class="mapbox position-relative d-inline-block">
                                <img src="{{asset('admin/assets/images/dashboard/map.jpg')}}" class="rounded" height="120" alt="map">
                                <span class="map-pin" style="top: 50px; left: 100px"></span>
                                <a href="{{route('admin/edituser', $users['id'])}}" class="btn btn-sm btn-primary position-absolute bottom-0 end-0 mb-6 me-6 fs-12px">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <p class="text-center text-danger"><b>No Result Found</b></p>
        @endforelse
    @endisset

</div>
@endsection

