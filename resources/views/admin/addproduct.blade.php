@extends('admin.layouts.sidebar')
@section('tittle', 'Add-Product')
@section('content')
    <div class="row mb-9 align-items-center">
        <div class="col-xxl-9">
            <div class="row">
                <div class="col-sm-6 mb-8 mb-sm-0">
                    <h2 class="fs-4 mb-0">Add New Product</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
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
        <div class="col-xxl-9">
            <form method="post" class="form-border-1" action="{{route('admin/addproducts')}}" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-8 rounded-4">
                        <div class="card-header p-7 bg-transparent">
                            <h4 class="fs-18 mb-0 font-weight-500">Basic</h4>
                        </div>
                        <div class="card-body p-7">
                                <div class="mb-8">
                                    <label for="product_title" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Product title</label>
                                    <input type="text" name="tittle" placeholder="Type here" class="form-control" id="product_title">
                                </div>
                                <div class="mb-8">
                                    <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Full description</label>
                                    <textarea placeholder="Type here" class="form-control" name="content" id="editor" rows="4"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-8">
                                            <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="regular-price">Regular price</label>
                                            <input placeholder="NGN" name="price" type="number" class="form-control" id="regular-price">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-8">
                                            <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="promotional-price">Promotional price</label>
                                            <input placeholder="NGN" type="number" name="cprice" class="form-control" id="promotional-price">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="currency">Currency</label>
                                        <select class="form-select" id="currency">
                                            <option>NGN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-8">
                                    <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Addition Information</label>
                                    <textarea placeholder="Type here" class="form-control" id="editor" name="addition" rows="4"></textarea>
                                </div>
{{--                                <label class="form-check mb-5" for="make-template">--}}
{{--                                    <input class="form-check-input" type="checkbox" value id="make-template">--}}
{{--                                    <span class="form-check-label"> Make a template </span>--}}
{{--                                </label>--}}
                        </div>
                    </div>
                    <div class="card mb-8 rounded-4">
                        <div class="card-header p-7 bg-transparent">
                            <h4 class="fs-18px mb-0 font-weight-500">Shipping</h4>
                        </div>
                        <div class="card-body p-7">
                            <form class="form-border-1">
                                <div class="mb-8">
                                    <label for="shipping-fee" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Shipping fees</label>
                                    <input type="number" placeholder="NGN" name="fee" class="form-control" id="shipping-fee">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <style>
                    #image-preview {
                        max-width: 300px;
                        max-height: 300px;
                    }
                </style>
                <div class="col-lg-4">
                    <div class="card mb-8 rounded-4">
                        <div class="card-header p-7 bg-transparent">
                            <h4 class="fs-18px mb-0 font-weight-500">Media</h4>
                        </div>
                        <div class="card-body p-7">
                            <div class="input-upload">
                                <div class="mb-7">
                                    <img src="https://templates.g5plus.net/glowing-bootstrap-5/assets/images/dashboard/upload.svg" width="102" class="d-block mx-auto" alt>
                                </div>
                                <input name="image" class="form-control" id="file-input" type="file">
                            </div>


                            <div class="card card-body" id="image-preview"></div>

                        </div>
                    </div>
                    <div class="card mb-8 rounded-4">
                        <div class="card-header p-7 bg-transparent">
                            <h4 class="fs-18px mb-0 font-weight-500">Organization</h4>
                        </div>
                        <div class="card-body p-7">
                            <div class="row mx-n3">
                                <div class="">
                                    <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase " for="category">Category</label>
                                    <select class="form-select" id="category" name="category">
                                        <option>Select Category</option>
                                        @foreach($category as $cat)
                                            <option value="{{$cat['name']}}">{{$cat['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 col-12 px-3">
                                    <label for="tag" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Tags</label>
                                    <input type="text" class="form-control" id="tag">
                                </div>
                                <div class="mb-5 col-12 px-3">
                                <button type="submit" class="btn btn-primary">
                                        Publish
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

@endsection
