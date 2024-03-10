@extends('admin.layouts.sidebar')
@section('tittle', 'Add-FAQ')
@section('content')
    <div class="row mb-9 align-items-center">
        <div class="col-xxl-9">
            <div class="row">
                <div class="col-sm-6 mb-8 mb-sm-0">
                    <h2 class="fs-4 mb-0">Add New FAQ</h2>
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
                                <label for="product_title" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Heading</label>
                                <input type="text" name="heading" placeholder="Type here" class="form-control" id="product_title">
                            </div>
                            <div class="mb-8">
                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Body</label>
                                <textarea placeholder="Type here" class="form-control" name="content" id="editor" rows="4"></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card mb-4 rounded-4 p-7">
        <div class="card-body px-0 pt-7 pb-0">
            <div class="table-responsive">
                <table id="example" class="table table-hover align-middle table-nowrap mb-0 table-borderless"><thead class="table-light">
                    <tr>
                        <th class="align-middle" scope="col">#ID
                        </th>
                        <th class="align-middle" scope="col">Heading
                        </th>
                        <th class="align-middle text-center" scope="col">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($faq as $fa)
                        <tr>
                            <td><a href="#">#{{$fa['id']}}</a></td>
                            <td class="text-body-emphasis">{{$fa['heading']}}</td>
                            <td class="text-center">
                               <a href="#" class="badge badge-green"><i class="fa fa-pencil"></i>Edit</a>
                            </td>
                            @empty
                                <b>No FAQ</b>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
{{--                {{$order->links()}}--}}
            </div>
        </div>
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
