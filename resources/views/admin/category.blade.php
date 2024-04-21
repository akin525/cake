@extends('admin.layouts.sidebar')
@section('tittle', 'Category')
@section('content')
    <div class="row mb-9 align-items-center">
        <div class="col-xxl-9">
            <div class="row">
                <div class="col-sm-6 mb-8 mb-sm-0">
                    <h2 class="fs-4 mb-0">Category</h2>
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
                            <input type="text" name="name" placeholder="Type here" class="form-control" id="product_name">
                        </div>
                        <div class="mb-8">
                            <label for="product_slug" class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Slug</label>
                            <input type="text" name="slug" placeholder="Type here" class="form-control" id="product_slug">
                        </div>
                        <div class="mb-8">
                            <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Description</label>
                            <textarea placeholder="Type here" name="description" class="form-control"></textarea>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Create category</button>
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
                                    <th class="align-middle" scope="col">Description
                                    </th>
                                    <th class="align-middle" scope="col">Slug
                                    </th>
                                    <th class="align-middle" scope="col">Order
                                    </th>
                                    <th class="align-middle text-center" scope="col">Actions
                                    </th>
                                </tr>
                                </thead><tbody>
                                @forelse($category as $cat)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0 ms-0" type="checkbox" id="transactionCheck-0">
                                            <label class="form-check-label" for="transactionCheck-0"></label>
                                        </div>
                                    </td>
                                    <td><a href="#">#{{$cat['id']}}</a></td>
                                    <td class="text-body-emphasis">{{$cat['name']}}</td>
                                    <td class="text-body-emphasis">category</td>
                                    <td class="text-body-emphasis">{{$cat['slug']}}</td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <div class="d-flex flex-nowrap justify-content-center">
                                            <button type="button" class="btn btn-primary py-4 px-5 btn-xs fs-13px me-4"  onclick="openModal(this)" data-user-id="{{$cat->id}}" data-user-amount="{{$cat->name}}" data-user-name="{{$cat->name}}">
                                                <i class="far fa-pen me-2"></i> Edit
                                            </button>
                                            <button type="button" value="{{$cat['id']}}" class="btn delete-user-btn btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4"><i class="far fa-trash me-2"></i> Delete</button>
{{--                                            <a href="{{route('admin/duplicateproduct', $cat['id'])}}"  class="btn  btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4"><i class="far fa-copy me-2"></i> Duplicate</a>--}}
                                        </div>
                                    </td>
                                    @empty
                                        <p>No Category added</p>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function () {
                                    $('.delete-user-btn').click(function () {
                                        var selectedValue = $(this).val();
                                        // Send the selected value to the '/getOptions' route
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: 'Do you want to delete this category',
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
                                                    url: '{{ url('admin/detetcategory') }}/' + selectedValue,
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Add your CSS styles here */
        .modal {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: white;
            width: 60%;
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
    <div class="modal" id="editModal">
        <div class="modal-content">
            <form id="dataForm" >
                @csrf
                <div class="card card-body">
                    <div class="card"style="border-radius: 30px; background-color: #ffffff; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);">
                        <p class="text-center" >EDIT CATEGORY</p>
                    </div>
                    {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                    <br/>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" id="plan"  name="name" value="" required />
                        <input type="hidden" class="form-control" id="id" name="id" value="" required />
                    </div>
                    <br/>
{{--                    <div id="div_id_network" >--}}
{{--                        <label for="network" class=" requiredField">--}}
{{--                            Color<span class="asteriskField">*</span>--}}
{{--                        </label>--}}
{{--                        <div class="">--}}
{{--                            <input type="number" id="amount" name="amount"  class="text-success form-control" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <br/>
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </form>
            <button class="btn btn-outline-danger" onclick="closeModal()">Cancel</button>
        </div>
    </div>
    <script>
        function openModal(element) {
            const modal = document.getElementById('editModal');
            const newNameInput = document.getElementById('id');
            const net = document.getElementById('plan');
            const userId =element.getAttribute('data-user-id');
            const amount =element.getAttribute('data-user-amount');
            const userName = element.getAttribute('data-user-name');



            newNameInput.value = userId;
            net.value = userName;

            console.log(newNameInput);
            console.log(net);
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
            $('#cat').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{ route('admin/addcat') }}",
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
                    url: "{{route('admin/updatecategory')}}",
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
