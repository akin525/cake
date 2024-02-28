@extends('admin.layouts.sidebar')
@section('tittle', 'All-Users')
@section('content')
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

<div class="row mb-9 align-items-center justify-content-between">
<div class="col-sm-6 mb-8 mb-sm-0">
<h2 class="fs-4 mb-0">All Customer</h2>
</div>
<div class="col-sm-6 d-flex flex-wrap justify-content-sm-end">
<a href="#" class="btn btn-primary">
<i class="far fa-plus"></i>
<span class="d-inline-block ml-1">Create new</span>
</a>
</div>
</div>


    <div class="card mb-4 rounded-4 p-7">
        <div class="card-header bg-transparent px-0 pt-0 pb-7">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4 col-12 mr-auto mb-md-0 mb-6">
                    <input type="text" placeholder="Search..." class="form-control bg-input border-0">
                </div>
                <div class="col-md-8">
                    <div class="row justify-content-end flex-nowrap d-flex">
                        <div class="col-lg-3 col-md-6 col-6">
                            <select class="form-select">
                                <option>Show 20</option>
                                <option>Show 30</option>
                                <option>Show 40</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <select class="form-select">
                                <option>Status: all</option>
                                <option>Active</option>
                                <option>Disabled</option>
                                <option>Show all</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body py-7 px-0">
            <div class="row">
                @forelse($user as $users)
                <div class="col-sm-6 col-lg-3 mb-9">
                    <div class="card card-user rounded-4">
                        <div class="card-header text-center">
                            <img class="img-avatar lazy-image text-center" src="#" data-src="{{asset('assets/images/eko.png')}}" alt="Marvin McKinney" width="112" height="112">
                        </div>
                        <div class="card-body text-center p-7">
                            <h5 class="card-title mt-12 fs-6 mb-6">{{$users['name']}}</h5>
                            <div class="card-text text-muted">
                                <p class="m-0">Seller ID: #{{$users['id']}}</p>
                                <p class="mb-0">{{$users['email']}}</p>
                            </div>
                            <a href="{{route('admin/edituser', $users['id'])}}" class="btn btn-sm btn-primary fs-14px mt-6">View details</a>
                        </div>
                    </div>
                </div>
                @empty
                <h4 class="text-center">No Customers Available</h4>
                @endforelse

{{--                {{$user->links()}}--}}
                </div>
        </div>
    </div>

@endsection
