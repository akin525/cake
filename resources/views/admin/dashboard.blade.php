@extends('admin.layouts.sidebar')
@section('tittle', 'Admin Dashboard')
@section('content')
    <div class="row mb-9 align-items-center">
        <div class="col-sm-6 mb-8 mb-sm-0">
            <h2 class="fs-4 mb-0">Dashboard</h2>
            <p class="mb-0">Whole data about your business here</p>
        </div>
        <div class="col-sm-6 d-flex flex-wrap justify-content-sm-end">
            <a href="#" class="btn btn-primary">
                <svg class="icon mt-n3">
                    <use xlink:href="#file-plus"></use>
                </svg>
                <span class="d-inline-block ml-1">Create report</span>
            </a>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6 col-xxl-3 mb-7">
            <div class="card rounded-4">
                <div class="card-body p-7">
                    <canvas id="transactionChart1" width="800" height="600"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xxl-3 mb-7">
            <div class="card rounded-4">
                <div class="card-body p-7">
                    <canvas id="transactionChart" width="800" height="600"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xxl-3 mb-7">
            <div class="card rounded-4">
                <div class="card-body p-7">
                    <div class="d-flex">
                        <div class="me-6">
<span class="square d-flex align-items-center justify-content-center fs-5 badge rounded-circle text-green bg-green-light" style="--square-size: 48px">
<svg class="icon">
<use xlink:href="#circle-dollar"></use>
</svg>
</span>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-4 card-title">Revenue</h6>
                            <span class="fs-4 d-block font-weight-500 text-primary lh-12">₦{{number_format(intval($totalrevenue *1),2)}}</span>
                            <span class="fs-14px">Shipping fees are not included.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xxl-3 mb-7">
            <div class="card rounded-4">
                <div class="card-body p-7">
                    <div class="d-flex">
                        <div class="me-6">
<span class="square d-flex align-items-center justify-content-center fs-5 badge rounded-circle text-success bg-success-light" style="--square-size: 48px">
<i class="fas fa-truck"></i>
</span>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-4 card-title">Orders</h6>
                            <span class="fs-4 d-block font-weight-500 text-primary lh-12">{{number_format(intval($orders *1))}}</span>
                            <span class="fs-14px">Excluding orders in transit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xxl-3 mb-7">
            <div class="card rounded-4">
                <div class="card-body p-7">
                    <div class="d-flex">
                        <div class="me-6">
<span class="square d-flex align-items-center justify-content-center fs-5 badge rounded-circle text-warning bg-warning-light" style="--square-size: 48px">
<i class="fas fa-qrcode"></i>
</span>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-4 card-title">Products</h6>
                            <span class="fs-4 d-block font-weight-500 text-primary lh-12">{{number_format(intval($products *1))}}</span>
                            <span class="fs-14px">In 19 Categories</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xxl-3 mb-7">
            <div class="card rounded-4">
                <div class="card-body p-7">
                    <div class="d-flex">
                        <div class="me-6">
<span class="square d-flex align-items-center justify-content-center fs-5 badge rounded-circle text-info bg-info-light" style="--square-size: 48px">
<i class="fas fa-shopping-bag"></i>
</span>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-4 card-title">Monthly Earning</h6>
                            <span class="fs-4 d-block font-weight-500 text-primary lh-12">₦{{number_format(intval($monthly *1),2)}}</span>
                            <span class="fs-14px">Based in your local time.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        fetch('/transactions')
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('transactionChart').getContext('2d');

                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: 'All Payments',
                            data: data.amounts,
                            backgroundColor: 'rgb(4,108,181)',
                            borderColor: 'rgb(4,108,181)',
                            borderWidth: 1,
                            fill: 'origin' // Fill the area below the line

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('/transactions1')
            .then(response => response.json())
            .then(data => {
                var ctx = document.getElementById('transactionChart1').getContext('2d');

                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: 'Orders Charts',
                            data: data.amounts,
                            backgroundColor: 'rgb(4,108,181)',
                            borderColor: 'rgb(4,108,181)',
                            borderWidth: 1,
                            fill: 'origin' // Fill the area below the line

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
@endsection
