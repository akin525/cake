@extends('layouts.header')
@section('tittle', 'Ready To Go Cakes')
@section('content')

    <div class="breadcrumb" data-bg-image="{{asset('assets/images/bg/breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">PAY NOW</h1>
                        <ul class="breadcrumb_list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Pay</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="checkout-box">
        <h4 class="mb-4">Payment Now</h4>
        <form id="paymentForm">
            <input type="hidden" id="email-address" name="email" value="{{ $request->email }}" required>
            <input type="hidden" id="amount" name="amount" value="{{ $request->checkout }}" required>
            <input type="hidden" id="firstSelect" name="firstSelect" value="{{ $payid }}" required>

            <button type="submit" class="btn btn-dark btn-primary-hover rounded-0 mt-6">Pay now</button>
        </form>

        <script src="https://js.paystack.co/v1/inline.js"></script>

        <script>
            const paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener("submit", payWithPaystack);

            function payWithPaystack(e) {
                e.preventDefault();
                let secondS = $('#firstSelect').val();

                let handler = PaystackPop.setup({
                    key: '{{$pkey}}', // Replace with your public key
                    email: document.getElementById("email-address").value,
                    amount: document.getElementById("amount").value * 100,
                    ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    // label: "Optional string that replaces customer email"
                    onClose: function () {
                        alert('Window closed.');
                    },
                    callback: function (response) {
                        // let message = 'Payment complete! Reference: ' + response.reference;
                        // alert(message);

                        window.location = '{{ url('tran', ['reference' => '']) }}/' + response.reference + '/' + secondS;

                    }
                });

                handler.openIframe();
            }
        </script>


@endsection
