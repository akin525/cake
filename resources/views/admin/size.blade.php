@extends('admin.layouts.sidebar')
@section('tittle', 'Sizes')
@section('content')
    <div class="row mb-9 align-items-center">
        <div class="col-xxl-9">
            <div class="row">
                <div class="col-sm-6 mb-8 mb-sm-0">
                    <h2 class="fs-4 mb-0">Sizes</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>

    @if (session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
        @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <div class="card mb-4 rounded-4 p-7">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-md-3">
                    <form id="cat">
                        @csrf
                        <div class="mb-8">
                            <label for="product_name" class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Name</label>
                            <input type="text" name="name" placeholder="Type here" class="form-control" id="name">
                        </div>
                        <div class="mb-8">
                            <label for="product_slug" class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Amount</label>
                            <input type="number" name="amount" placeholder="Type here" class="form-control" id="amount">
                        </div>
{{--                        <div class="mb-8">--}}
{{--                            <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Description</label>--}}
{{--                            <textarea placeholder="Type here" name="description" class="form-control"></textarea>--}}
{{--                        </div>--}}
                        <div class="d-grid">
                            <button class="btn btn-primary">Create Size</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="card-body px-0 pt-7 pb-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle table-nowrap mb-0 table-borderless"><thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-center">
                                        <div class="form-check align-middle">
                                            <input class="form-check-input rounded-0 ms-0" type="checkbox" id="transactionCheck01">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th><th class="align-middle" scope="col">ID
                                    </th>
                                    <th class="align-middle" scope="col">Name
                                    </th>
                                    <th class="align-middle" scope="col">Amount
                                    </th>
                                    <th class="align-middle text-center" scope="col">Actions
                                    </th>
                                </tr>
                                </thead><tbody>
                                @forelse($size as $cat)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0 ms-0" type="checkbox" id="transactionCheck-0">
                                            <label class="form-check-label" for="transactionCheck-0"></label>
                                        </div>
                                    </td>
                                    <td><a href="#">#{{$cat['id']}}</a></td>
                                    <td class="text-body-emphasis">{{$cat['name']}}</td>
                                    <td class="text-body-emphasis">{{$cat['amount']}}</td>
                                    <td class="text-center">
                                        <div class="d-flex flex-nowrap justify-content-center">
                                            <div class="dropdown no-caret">
                                                <a href="#" data-bs-toggle="dropdown" class="dropdown-toggle btn btn-outline-primary btn-xs hover-white btn-hover-bg-primary py-4 px-5">
                                                    <i class="far fa-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <a class="dropdown-item" href="#">Edit info</a>
                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    @empty
                                        <p>No size added</p>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#cat').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{ route('admin/psize') }}",
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
