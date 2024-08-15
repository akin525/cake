@extends('layouts.sidebar')
@section('tittle', 'Plan Details')
@section('content')

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">{{$plan->plan}}</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
{{--                            <li class="breadcrumb-item" aria-current="page"></li>--}}
                            <li class="breadcrumb-item active" aria-current="page">Plan Details</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    @include('sweetalert::alert')

    <br>
    <br>
    <hr/>
    <div class="row">
        <div class="col-12">
            <div class="box bg-gradient-success-dark overflow-hidden pull-up">
                <div class="box-body pr-0 pl-lg-50 pl-15 py-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-8">
                            <h1 class="font-size-40 text-white">{{$plan->plan}}</h1>
                                <p class="text-white mb-0 font-size-20">
                                    Read & understand craefully
                                </p>
                        </div>
                        <div class="col-12 col-lg-4"><img src="https://eduadmin-template.multipurposethemes.com/bs4/images/svg-icon/color-svg/custom-15.svg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-lg-4">
                <div  class="card card-body">
                 {!! $plan->body !!}

                    <form id="paynow" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$plan->id}}"/>
                        <input type="number" name="amount" value="{{$plan->amount}}" class="form-control" readonly/>
                        <br/>
                        <button type="submit" class="btn btn-success m-3">Pay with card</button>
                        <a href="#" class="btn btn-success">Pay with Wallet</a>
                    </form>
                </div>

            </div>

    </div>
    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#paynow').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{ route('membership/paycard') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle the success response here
                        // $('#loadingSpinner').hide();

                        console.log(response);
                        // Update the page or perform any other actions based on the response

                        if (response.status == 'success') {
                            window.location.href = response.url;
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Pending',
                                text: response.message
                            });
                            // Handle any other response status
                        }

                    },
                    // $('#loadingSpinner').hide();

                    error: function(xhr) {
                        $('#loadingSpinner').hide();
                        Swal.fire({
                            icon: 'error',
                            title: 'fail',
                            text: xhr.responseText
                        });
                        // Handle any errors
                        console.log(xhr.responseText);

                    }
                });
            });
        });

    </script>


@endsection
