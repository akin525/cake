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

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-8">
                                        <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="regular-price">price Range from</label>
                                        <input placeholder="NGN" name="ramount" type="number" class="form-control" id="regular-price">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-8">
                                        <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="promotional-price">price Range to</label>
                                        <input placeholder="NGN" type="number" name="tamount" class="form-control" id="promotional-price">
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-8 rounded-4" id="layers">
                                <div class="card-header p-7 bg-transparent">
                                    <h4 class="fs-18px mb-0 font-weight-500">Add Attribute</h4>
                                </div>
                                <div class="card-body p-7 layer">
                                    <div class="form-border-1">
                                        <div class="mb-8">
                                            <label for="shipping-fee" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Name</label>
                                            {{--                                            <input type="text" name="attribute[][name]" id="attributeName" class="form-control" placeholder="Name" required>--}}
                                            <select name="attribute[][name]" id="attributeName" class="form-control">
                                                <option>Choose Option</option>
                                                @foreach($attribute as $act)
                                                    <option value="{{$act['name']}}">{{$act['name']}}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            {{--                                            <label>--}}
                                            <textarea name="attribute[][value]" class="form-control" id="attributeValues" placeholder="Enter options for customer to choose from f.e, Blue, or Large , Use | to separate different options."></textarea>
                                            {{--                                            </label>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="add-layer">Add New</button>
                            <button type="button" class="btn btn-danger" onclick="generateVariations()">Generate Variations</button>

                            <style>
                                .variation {
                                    border: 1px solid #ccc;
                                    padding: 10px;
                                    margin-bottom: 10px;
                                    border-radius: 5px;
                                }

                                .variation label {
                                    font-weight: bold;
                                    margin-right: 5px;
                                }

                                .variation input[type="number"] {
                                    width: 80px;
                                }
                            </style>
                            <div class="card mb-8 rounded-4" id="variations">
                                <div class="card-header p-7 bg-transparent">
                                    <h4 class="fs-18px mb-0 font-weight-500">Variations</h4>
                                </div>

                                <div class="card-body p-7 layer" id="variationContainer">
                                    <!-- Variations will be displayed here -->
                                </div>
                                <div class="card-body p-7 layer" id="allvariationContainer" style="display: block">
                                    <!-- Variations will be displayed here -->
                                </div>
                            </div>

                            <script>
                                function generateVariations() {
                                    var attributeNameElements = document.getElementsByName('attribute[][name]');
                                    var attributeValueElements = document.getElementsByName('attribute[][value]');

                                    var variations = [];
                                    for (var i = 0; i < attributeNameElements.length; i++) {
                                        var attributeName = attributeNameElements[i].value;
                                        var attributeValues = attributeValueElements[i].value.split('|').map(value => value.trim());
                                        variations.push({
                                            name: attributeName,
                                            values: attributeValues
                                        });
                                    }

                                    var allCombinations = getAllCombinations(variations);
                                    displayVariations(allCombinations);
                                }

                                function getAllCombinations(attributes) {
                                    var combinations = [];
                                    var helper = function (current, remaining) {
                                        if (remaining.length === 0) {
                                            combinations.push(current);
                                        } else {
                                            var nextAttribute = remaining[0];
                                            for (var i = 0; i < nextAttribute.values.length; i++) {
                                                helper(current.concat({ name: nextAttribute.name, value: nextAttribute.values[i] }), remaining.slice(1));
                                            }
                                        }
                                    };
                                    helper([], attributes);
                                    return combinations;
                                }

                                function displayVariations(variations) {
                                    var variationContainer = document.getElementById('variationContainer');
                                    variationContainer.innerHTML = ''; // Clear previous variations

                                    variations.forEach(function (variation, index) {
                                        var variationElement = document.createElement('div');
                                        variationElement.classList.add('mb-8');
                                        variationElement.innerHTML = '<strong>Variation ' + (index + 1) + ':</strong> ';

                                        variation.forEach(function (attribute) {
                                            variationElement.innerHTML += '<strong>' + attribute.name + ': </strong>' + attribute.value + ' ';
                                            var nameInput = document.createElement('input');
                                            nameInput.type = 'hidden';
                                            nameInput.name = 'variation_attributes[' + index + '][' + attribute.name + ']'; // Name for the variation attribute input
                                            nameInput.value = attribute.value;
                                            variationElement.appendChild(nameInput);
                                        });

                                        var priceInput = document.createElement('input');
                                        priceInput.type = 'number';
                                        priceInput.name = 'variation_attributes[' + index + '][price]'; // Name for the variation price input
                                        priceInput.value = '0';
                                        priceInput.onchange = function () {
                                            updatePrice(index, this.value);
                                        };

                                        variationElement.appendChild(document.createElement('br'));
                                        variationElement.appendChild(document.createTextNode('Price: ₦'));
                                        variationElement.appendChild(priceInput);

                                        variationContainer.appendChild(variationElement);

                                    });
                                }

                                function updatePrice(index, price) {
                                    // Implement price update logic here
                                    console.log('Variation ' + (index + 1) + ' price updated to: ₦' + price);
                                }
                            </script>
                            <script>
                                document.getElementById('add-layer').addEventListener('click', function () {
                                    var variationTemplate = document.querySelector('.layer').cloneNode(true);
                                    document.getElementById('layers').appendChild(variationTemplate);
                                });
                            </script>



                            <div class="card-header p-7 bg-transparent">
                                <h4 class="fs-18px mb-0 font-weight-500">Add Special Items</h4>
                            </div>
                            <div id="items-container">
                                <div class="item">
                                    <div class="mb-8">
                                        <label for="shipping-fee" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Item Name</label>
                                        <input type="text" name="items[0][Sizes]" class="form-control" id="sizes">
                                    </div>
                                    <div class="mb-8">
                                        <label for="shipping-fee" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Price</label>
                                        {{--                                            <input type="text" name="attribute[][name]" id="attributeName" class="form-control" placeholder="Name" required>--}}

                                        <input type="number"  name="items[0][price]" id="price" class="form-control">

                                    </div>
                                </div>
                                </div>

                            <button type="button" id="add-item" class="btn btn-primary">Add Another Item</button>
                            <script>
                                document.getElementById('add-item').addEventListener('click', function() {
                                    let container = document.getElementById('items-container');
                                    let itemCount = container.getElementsByClassName('item').length;
                                    let newItem = document.createElement('div');
                                    newItem.className = 'item';
                                    newItem.innerHTML = `
                                        <div class="mb-8">
                                            <label for="shipping-fee" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Item Name</label>
                                            <input type="text" name="items[${itemCount}][Sizes]" id="sizes" class="form-control">
                                           </div>
                                <div class="mb-8">
                                            <label for="shipping-fee" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Item Price</label>
                                            <input type="number" name="items[${itemCount}][price]" id="price" class="form-control">
                                           </div>
            `;
                                    container.appendChild(newItem);
                                });
                            </script>


{{--                            <div id="items-container">--}}
{{--                                <div class="item">--}}
{{--                                    <label for="sizes">Sizes:</label>--}}
{{--                                    <input type="text" name="items[0][Sizes]" id="sizes">--}}
{{--                                    <label for="price">Price:</label>--}}
{{--                                    <input type="number" name="items[0][price]" id="price">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <br/>
                            <br/>


                            <br/>
                            <br/>



{{--                            <div class="card mb-8 rounded-4" id="sizes">--}}
{{--                                <div class="card-header p-7 bg-transparent">--}}
{{--                                    <h4 class="fs-18px mb-0 font-weight-500">Add Size</h4>--}}
{{--                                </div>--}}
{{--                                <div class="card-body p-7 size">--}}
{{--                                    <div class="form-border-1 ">--}}
{{--                                        <div class="mb-8 ">--}}
{{--                                            <label for="shipping-fee" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Size</label>--}}
{{--                                            <input type="text" name="sizes[][name]"  class="form-control" placeholder="size Name" required>--}}
{{--                                            <br/>--}}
{{--                                            <input type="number" name="sizes[][amount]"  class="form-control" placeholder="Price" min="0" step="0.01" required>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button type="button" class="btn btn-primary" id="add-size">Add Size</button>--}}

{{--                            <script>--}}
{{--                                document.getElementById('add-size').addEventListener('click', function () {--}}
{{--                                    var variationTemplate = document.querySelector('.size').cloneNode(true);--}}
{{--                                    document.getElementById('sizes').appendChild(variationTemplate);--}}
{{--                                });--}}
{{--                            </script>--}}
                            <br/>

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
                                    @foreach ($category as $cat)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="categories" value="{{ $cat->name }}" id="category{{ $cat->id }}">
                                            <label class="form-check-label" for="category{{ $cat->id }}">
                                                {{ $cat->name }}
                                            </label>
                                        </div>
                                    @endforeach
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


{{--    <label>Variations:</label>--}}
{{--    <div id="variations">--}}
{{--        <div class="variation">--}}
{{--            <input type="text" name="variations[][name]" placeholder="Variation Name" required>--}}
{{--            <input type="number" name="variations[][price]" placeholder="Price" min="0" step="0.01" required>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <button type="button" id="add-variation">Add Variation</button>--}}



{{--    <script>--}}
{{--        document.getElementById('add-variation').addEventListener('click', function () {--}}
{{--            var variationTemplate = document.querySelector('.variation').cloneNode(true);--}}
{{--            document.getElementById('variations').appendChild(variationTemplate);--}}
{{--        });--}}
{{--    </script>--}}
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
