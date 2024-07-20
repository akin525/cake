@extends('admin.layouts.sidebar')
@section('tittle', 'All-Product')
@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="row mb-9 align-items-center justify-content-between">
        <div class="col-md-6 mb-8 mb-md-0">
            <h2 class="fs-4 mb-0">Product List</h2>
            <p>All Products</p>
        </div>
        <div class="col-md-6 d-flex flex-wrap justify-content-md-end">
            <a href="{{route('admin/addproduct1')}}" class="btn btn-outline-primary btn-hover-bg-primary me-4 m-3">
               Create new(No Attribute) <span class="badge badge-soft-danger">Hots</span>
            </a>
            <a href="{{route('admin/addproduct')}}" class="btn btn-primary m-3">
                Create new
            </a>
            <a href="#" class="btn btn-primary m-3" onclick="openModal(this)">
                Add General Amount
            </a>
        </div>
    </div>
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
    <div class="modal" id="editModal">
        <div class="modal-content">
            <form id="dataForm" >
                @csrf
                <div class="card card-body">
                    <div class="card"style=" background-color: #ffffff; ">
                        <p class="text-center" >Add Amount </p>
                    </div>
                    {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                    <br/>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control"  name="amount"  required />
                    </div>
                    <br/>

                    <br/>

                    <button type="submit" class="btn btn-outline-success">Add Amount</button>
                </div>
            </form>
            <button class="btn btn-outline-danger" onclick="closeModal()">Cancel</button>
        </div>
    </div>

    <div class="card mb-4 rounded-4 p-7">
        <div class="card-header bg-transparent px-0 pt-0 pb-7">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4 col-12 mr-auto mb-md-0 mb-6">
                    <select class="form-select">
                        <option selected data-select2-id="3">All Categories</option>
                        @foreach($category as $cat)
                        <option>{{$cat['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8">
                    <div class="row justify-content-end flex-nowrap d-flex">
                        <div class="col-lg-4 col-md-6 col-6">
                            <input type="date" class="form-control bg-input border-0">
                        </div>
                        <div class="col-lg-4 col-md-6 col-6">
                            <select class="form-select">
                                <option>Status</option>
                                <option>All</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-7 pb-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle table-nowrap mb-0"><tbody>
                    @forelse($product as $products)
                    <tr>
                        <td class="text-center">
                            <div class="form-check">
                                <input class="form-check-input rounded-0 ms-0" type="checkbox" id="transactionCheck-0">
                                <label class="form-check-label" for="transactionCheck-0"></label>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center flex-nowrap">
                                <a href="#" title="Flowers cotton dress">
                                    <img src="#" data-src="{{url($products['image'])}}" alt="Flowers cotton dress" class="lazy-image" width="60" height="80">
                                </a>
                                <a href="#" title="Flowers cotton dress" class="ms-6">
                                    <p class="fw-semibold text-body-emphasis mb-0">{{$products['name']}}</p>
                                </a>
                            </div>
                        </td>
                        <td>₦{{number_format(intval($products['price'] *1),2)}}</td>
                        <td>
                            <span class="badge rounded-lg rounded-pill alert py-3 px-4 mb-0 alert-success border-0 text-capitalize fs-12">Active</span>
                        </td>
                        <td>{{$products['created-at']}}</td>
                        <td class="text-center">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <a href="{{route('admin/editproduct', $products['id'])}}" class="btn btn-primary py-4 px-5 btn-xs fs-13px me-4"><i class="far fa-pen me-2"></i> Edit</a>
                                <button type="button" value="{{$products['id']}}" class="btn delete-user-btn btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4"><i class="far fa-trash me-2"></i> Delete</button>
                                <a href="{{route('admin/duplicateproduct', $products['id'])}}"  class="btn  btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4"><i class="far fa-copy me-2"></i> Duplicate</a>
                            </div>
                        </td>
                    @empty
                    <p><b>No Product added yet</b></p>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example" class="mt-6 mb-4">
        <ul class="pagination justify-content-start">
           {{$product->links()}}
        </ul>
    </nav>

    <script>
        $(document).ready(function () {
            $('.delete-user-btn').click(function () {
                var selectedValue = $(this).val();
                // Send the selected value to the '/getOptions' route
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this product',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // The user clicked "Yes", proceed with the action
                        // Add your jQuery code here
                        // For example, perform an AJAX request or update the page content
                        $('#loadingSpinner').show();
                        $.ajax({
                            url: '{{ url('admin/delete') }}/' + selectedValue,
                            type: 'GET',
                            success: function (response) {
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
                            error: function (xhr) {
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
                    }
                });
            });
        });
    </script>
    <script>
        function openModal(element) {
            const modal = document.getElementById('editModal');

            modal.style.display = 'block';
            // You can fetch user data using the userId and populate the input fields in the modal if needed
        }

        function closeModal() {
            const modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

        function saveChanges() {
            // Add code here to save the changes and update the table
            closeModal();
        }
    </script>
    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                // The user clicked "Yes", proceed with the action
                // Add your jQuery code here
                // For example, perform an AJAX request or update the page content
                $('#loadingSpinner').show();



                $.ajax({
                    url: "{{route('admin/addall')}}",
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
