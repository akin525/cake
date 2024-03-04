@extends('admin.layouts.sidebar')
@section('tittle', 'Flavour')
@section('content')
    <div class="row mb-9 align-items-center">
        <div class="col-xxl-9">
            <div class="row">
                <div class="col-sm-6 mb-8 mb-sm-0">
                    <h2 class="fs-4 mb-0">Flavour</h2>
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
                            <button class="btn btn-primary">Create Flavour</button>
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
                                @forelse($flavour as $cat)
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
                                            <button  type="button" class="btn btn-primary" onclick="openModal(this)" data-user-id="{{$cat->id}}" data-user-amount="{{$cat->amount}}" data-user-name="{{$cat->name}}" >
                                                <i class="fa fa-edit"></i>Edit
                                            </button>
                                        </div>
                                    </td>
                                    @empty
                                        <p>No Flavour added</p>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
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
                                                <p class="text-center" >EDIT FLAVOUR</p>
                                            </div>
                                            {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                                            <br/>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="plan"  name="name" value="" readonly />
                                                <input type="hidden" class="form-control" id="id" name="id" value="" required />
                                            </div>
                                            <br/>
                                            <div id="div_id_network" >
                                                <label for="network" class=" requiredField">
                                                    Amount<span class="asteriskField">*</span>
                                                </label>
                                                <div class="">
                                                    <input type="number" id="amount" name="amount"  class="text-success form-control" required>
                                                </div>
                                            </div>
                                            <br/>
                                            <button type="submit" class="btn btn-outline-success">Update</button>
                                        </div>
                                    </form>
                                    <button class="btn btn-outline-danger" onclick="closeModal()">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                // The user clicked "Yes", proceed with the action
                // Add your jQuery code here
                // For example, perform an AJAX request or update the page content
                $('#loadingSpinner').show();



                $.ajax({
                    url: "{{route('admin/editflavour')}}",
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
            $('#cat').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{ route('admin/pflavour') }}",
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
