@extends('admin.layouts.sidebar')
@section('tittle', 'Search Users')
@section('content')
    <div class="row mb-9 align-items-center justify-content-between">
        <div class="col-sm-6 mb-8 mb-sm-0">
            <h2 class="fs-4 mb-0">Site Settings</h2>
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
        <div class="card-body pt-7 pb-0 px-0">
            <div class="row mx-n8">
    @include('admin.layouts.setting')
                <div class="col-lg-9 px-8">
                    <section class="p-xl-8">
                        <div class="form-border-1">
                            <form id="savepage">
                                @csrf
                            <div class="row border-bottom py-8">
                                <div class="col-md-5">
                                    <h5>Website Homepage</h5>
                                    <p class="text-muted w-80">Choose any homepage template that is available in this select tab and save for changes</p>
                                </div>
                                <div class="col-md-7">
                                    <div class="mb-6">
                                        <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase" for="home-page-title">Home page</label>
                                        <select name="page" class="form-control" >
                                            <option>Choose your template</option>
                                            @foreach($homepage as $page)
                                                <option value="{{$page['page']}}">{{$page['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                            </form>
{{--                            <div class="row border-bottom py-8">--}}
{{--                                <div class="col-md-5">--}}
{{--                                    <h5>Access</h5>--}}
{{--                                    <p class="text-muted w-80">Give access of all pages including each product lorem ipsum dolor sit amet, consectetur adipisicing</p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-7">--}}
{{--                                    <label class="mb-2 form-check">--}}
{{--                                        <input class="form-check-input" checked name="mycheck_a1" type="radio">--}}
{{--                                        <span class="form-check-label"> All registration is enabled </span>--}}
{{--                                    </label>--}}
{{--                                    <label class="mb-2 form-check">--}}
{{--                                        <input class="form-check-input" name="mycheck_a1" type="radio">--}}
{{--                                        <span class="form-check-label"> Only buyers is enabled </span>--}}
{{--                                    </label>--}}
{{--                                    <label class="mb-2 form-check">--}}
{{--                                        <input class="form-check-input" name="mycheck_a1" type="radio">--}}
{{--                                        <span class="form-check-label"> Only buyers is enabled </span>--}}
{{--                                    </label>--}}
{{--                                    <label class="mb-2 form-check">--}}
{{--                                        <input class="form-check-input" name="mycheck_a1" type="radio">--}}
{{--                                        <span class="form-check-label"> Stop new shop registration </span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row border-bottom py-8">
                                <div class="col-md-5">
                                    <h5>Slider</h5>
                                    <p class="text-muted w-80">Set Homepage Slider loader</p>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-check mb-6">
                                        <input class="form-check-input rounded-0" type="checkbox" value id="mycheck_notify" checked>
                                        <label class="form-check-label" for="mycheck_notify"> Select image with size 1500 x 800 </label>
                                    </div>
                                    <form action="{{route('admin/saveslide')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="slider" placeholder="Text"  id="file-input">
                                    </div>
                                    <div class="card card-body" id="image-preview"></div>
                                    <br/>
                                    <button type="submit" class="btn btn-black">Upload</button>
                                    </form>
                                </div>
                            </div>
                            <script>
                                document.getElementById('file-input').addEventListener('change', function(event) {
                                    var file = event.target.files[0];
                                    var reader = new FileReader();

                                    reader.onload = function(event) {
                                        var img = new Image();
                                        img.src = event.target.result;
                                        img.onload = function() {
                                            var preview = document.getElementById('image-preview');
                                            preview.innerHTML = ''; // Clear previous preview
                                            preview.appendChild(img);
                                        };
                                    };

                                    reader.readAsDataURL(file);
                                });
                            </script>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#savepage').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                // The user clicked "Yes", proceed with the action
                // Add your jQuery code here
                // For example, perform an AJAX request or update the page content
                $('#loadingSpinner').show();


                $.ajax({
                    url: "{{ route('admin/savepage') }}",
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
