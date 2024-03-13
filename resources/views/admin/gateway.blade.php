@extends('admin.layouts.sidebar')
@section('tittle', 'Gateway')
@section('content')
    <div class="row mb-9 align-items-center">
        <div class="col-xxl-9">
            <div class="row">
                <div class="col-sm-6 mb-8 mb-sm-0">
                    <h2 class="fs-4 mb-0">Payment Gateway</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
    <div class="col-xxl-9">
        <form id="faq" class="form-border-1" >
            @csrf
            <div class="row">
                <div class="">
                    <div class="card mb-8 rounded-4">
                        <div class="card-header p-7 bg-transparent">
{{--                            <h4 class="fs-18 mb-0 font-weight-500">Basic</h4>--}}
                        </div>
                        <div class="card-body p-7">
                            <div class="mb-8">
                                <label for="product_title" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Name</label>
                                <input type="text" name="name" value="{{$gateway->name}}" placeholder="Type here" class="form-control" id="product_title" readonly>
                            </div>
                            <div class="mb-8">
                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">SECRET Key</label>
                                <input  class="form-control" name="sk"  value="{{$gateway->skey}}" required/>
                            </div>
                            <div class="mb-8">
                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Public  Key</label>
                                <input  class="form-control" name="pk"  value="{{$gateway->pkey}}" required/>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#faq').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{ route('admin/addfa') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle the success response here
                        $('#loadingSpinner').hide();

                        console.log(response);
                        // Update the page or perform any other actions based on the response

                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message
                            }).then(() => {
                                location.reload(); // Reload the page
                            });
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Pending',
                                text: response.message
                            });
                            // Handle any other response status
                        }

                    },
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
