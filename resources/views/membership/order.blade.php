@extends('layouts.sidebar')
@section('tittle', 'My Orders')
@section('content')
    @foreach($orders as $order)
    <div class="col-12 col-lg-4">
        <div class="box ribbon-box">
            <div class="ribbon-two ribbon-two-primary"><span>Order</span></div>
            <div class="box-header no-border p-0">
                <a href="#">
                    <img class="img-fluid" width="150" src="{{url($order->image)}}" alt=""/>
                </a>
            </div>
            <div class="box-body">
                <div class="text-center">
                    <h3 class="my-10"><a href="#">{{$order->name}}</a></h3>
                    <h6 class="user-info mt-0 mb-10 text-fade">₦{{number_format(intval($order['price'] *1))}}</h6>
                    <a href="#" class="btn btn-success">View Product</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        $(function () {
            'use strict';

            var options = {
                chart: {
                    height: 325,
                    type: "radialBar"
                },

                series: [400],
                colors: ['#ccaa00'],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 15,
                            size: "70%"
                        },
                        track: {
                            background: '#11a531',
                        },

                        dataLabels: {
                            showOn: "always",
                            name: {
                                offsetY: -10,
                                show: false,
                                color: "#888",
                                fontSize: "13px"
                            },
                            value: {
                                color: "#111",
                                fontSize: "30px",
                                show: true
                            }
                        }
                    }
                },

                stroke: {
                    lineCap: "round",
                },
                labels: ["Progress"]
            };

            var chart = new ApexCharts(document.querySelector("#revenue51"), options);

            chart.render();
        });

    </script>
@endsection
