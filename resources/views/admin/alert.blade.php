@extends('admin.layouts.sidebar')
@section('tittle', 'Alert')
@section('content')
    <div class="row mb-9 align-items-center">
        <div class="col-xxl-9">
            <div class="row">
                <div class="col-sm-6 mb-8 mb-sm-0">
                    <h2 class="fs-4 mb-0">Alert Message</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
{{--    <div class="col-xxl-9">--}}
{{--        <form id="messq" class="form-border-1" >--}}
{{--            @csrf--}}
{{--            <div class="row">--}}
{{--                <div class="">--}}
{{--                    <div class="card mb-8 rounded-4">--}}
{{--                        <div class="card-header p-7 bg-transparent">--}}
{{--                            <h4 class="fs-18 mb-0 font-weight-500">Basic</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-7">--}}
{{--                            <div class="mb-8">--}}
{{--                                <label for="product_title" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Name</label>--}}
{{--                                <input type="text" name="name" placeholder="Type here" class="form-control" id="product_title">--}}
{{--                            </div>--}}
{{--                            <div class="mb-8">--}}
{{--                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Body</label>--}}
{{--                                <textarea placeholder="Type here" class="form-control" name="body" id="editor" rows="4"></textarea>--}}
{{--                            </div>--}}

{{--                            <button type="submit" class="btn btn-success">Create</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}

    <div class="card mb-4 rounded-4 p-7">
        <div class="card-body px-0 pt-7 pb-0">
            <div class="table-responsive">
                <table id="example" class="table table-hover align-middle table-nowrap mb-0 table-borderless"><thead class="table-light">
                    <tr>
                        <th class="align-middle" scope="col">#ID
                        </th>
                        <th class="align-middle" scope="col">Name
                        </th>
                        <th class="align-middle" scope="col">Body
                        </th>
                        <th class="align-middle text-center" scope="col">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($message as $mess)
                        <tr>
                            <td><a href="#">#{{$mess['id']}}</a></td>
                            <td class="text-body-emphasis">{{$mess['name']}}</td>
                            <td class="text-body-emphasis">{!! $mess['message'] !!}</td>
                            <td class="text-center">
                                <button  type="button" class="btn btn-primary" onclick="openModal(this)" data-user-id="{{$mess->id}}" data-user-body="{{$mess->message}}" data-user-name="{{$mess->name}}" >
                                    <i class="fa fa-edit"></i>Edit
                                </button>
                            </td>
                            @empty
                                <b>No Message Alert</b>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
{{--                {{$order->links()}}--}}
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
                        <p class="text-center" >Edit Message</p>
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
                            Color<span class="asteriskField">*</span>
                        </label>
                        <div class="">

                            <textarea placeholder="Type here" class="form-control" name="body" id="body" rows="4"></textarea>

                        </div>
                    </div>
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
            const netb = document.getElementById('body');
            const userId =element.getAttribute('data-user-id');
            const body =element.getAttribute('data-user-body');
            const userName = element.getAttribute('data-user-name');



            newNameInput.value = userId;
            net.value = userName;
            netb.value = body;

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
                e.preventDefault();

                var formData = $(this).serialize();

                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{ route('admin/alertp') }}",
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
