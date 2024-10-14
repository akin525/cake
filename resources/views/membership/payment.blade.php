@extends('layouts.sidebar')
@section('tittle', 'My-Ads')
@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Payment</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Payment</li>
                            <li class="breadcrumb-item active" aria-current="page">My-Payment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="card card-body">

        <div class="row">
            <div class="col-12">
                <div class="box bg-gradient-success-dark overflow-hidden pull-up">
                    <div class="box-body pr-0 pl-lg-50 pl-15 py-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-8">
                                <h1 class="font-size-40 text-white">My Payment</h1>
                                <p class="text-white mb-0 font-size-20">
                                    <i> All Pay For</i>
                                </p>
                            </div>
                            <div class="col-12 col-lg-4"><img src="https://eduadmin-template.multipurposethemes.com/bs4/images/svg-icon/color-svg/custom-15.svg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="productorder" class="table table-hover no-wrap product-order" data-page-size="10">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Refid</th>
                                    <th>Narration</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payment as $ads)
                                <tr>
                                    <td>{{$ads['name']}}</td>
                                    <td>₦{{number_format(intval($ads->amount *1))}}</td>
                                    <td>{{$ads['payment_method']}}</td>
                                    <td>{{$ads['transaction_id']}}</td>
                                    <td>{{$ads['narration']}}</td>
                                    <td>
                                        @if($ads['status']=='1')
                                            <span class="badge badge-pill badge-success">Running</span>
                                        @else
                                            <span class="badge badge-pill badge-warning">Pending</span>
                                            @endif
                                    </td>
                                    <td><a href="javascript:void(0)" class="text-info mr-10" data-toggle="tooltip" data-original-title="Edit">
                                            <i class="ti-marker-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="text-danger" data-original-title="Delete" data-toggle="tooltip">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
