@extends('admin.layouts.sidebar')
@section('tittle', 'New-Product')
@section('content')
    <div class="row mb-9 align-items-center">
        <div class="col-xxl-9">
            <div class="row">
                <div class="col-sm-6 mb-8 mb-sm-0">
                    <h2 class="fs-4 mb-0">{{$product->name}}</h2>
                </div>
                <div class="col-md-6 d-flex flex-wrap justify-content-md-end">
                    <a href="{{route('admin/allproduct')}}" class="btn btn-outline-primary btn-hover-bg-primary me-4">
                        Products
                    </a>
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
                <form class="form-border-1" method="post"  action="{{route('admin/duplicateproduct1')}}" enctype="multipart/form-data">
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
                                        <input type="text" value="{{$product->name}}" name="tittle" placeholder="Type here" class="form-control" id="product_title">
                                    </div>
                                    <div class="mb-8">
                                        <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Full description</label>
                                        <textarea class="form-control" id="editor"  name="content" rows="4">{{$product->description}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-8">
                                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="regular-price">Regular price</label>
                                                <input placeholder="NGN" name="price" value="{{$product->price}}" type="number" class="form-control" id="regular-price">
                                                <input  name="id" value="{{$product->id}}" type="hidden" class="form-control" id="regular-price">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-8">
                                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="promotional-price">Promotional price</label>
                                                <input placeholder="NGN" type="number" value="{{$product->cprice}}" name="cprice" class="form-control" id="promotional-price">
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
                                                <input placeholder="NGN" name="ramount" type="number" value="{{$product->ramount}}" class="form-control" id="regular-price">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-8">
                                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="promotional-price">price Range to</label>
                                                <input placeholder="NGN" type="number" name="tamount" value="{{$product->tamount}}" class="form-control" id="promotional-price">
                                            </div>
                                        </div>

                                    </div>

                                    <style>
                                        .checkbox-container {
                                            display: flex;
                                            flex-direction: row;
                                            gap: 20px; /* Add some space between toggles */
                                            align-items: center; /* Align items vertically centered */
                                        }

                                        .toggle {
                                            display: flex;
                                            align-items: center; /* Center the text vertically with the toggle */
                                            gap: 10px; /* Space between the toggle switch and the text */
                                        }

                                        .toggle input {
                                            display: none;
                                        }

                                        .slider {
                                            position: relative;
                                            display: inline-block;
                                            width: 60px;
                                            height: 34px;
                                            background-color: #ccc;
                                            transition: .4s;
                                            border-radius: 34px;
                                            cursor: pointer;
                                        }

                                        .slider:before {
                                            position: absolute;
                                            content: "";
                                            height: 26px;
                                            width: 26px;
                                            left: 4px;
                                            bottom: 4px;
                                            background-color: white;
                                            transition: .4s;
                                            border-radius: 50%;
                                        }

                                        input:checked + .slider {
                                            background-color: #2196F3;
                                        }

                                        input:checked + .slider:before {
                                            transform: translateX(26px);
                                        }


                                    </style>

                                    <div class="checkbox-container">
                                        <label class="toggle">
                                            <input type="hidden" name="topper" value="0">
                                            <input type="checkbox" value="1" name="topper" class="checkbox" data-index="0" @if($product->topper ==1) checked @endif>
                                            <span class="slider"></span>
                                            Topper
                                        </label>
                                        <label class="toggle">
                                            <input type="hidden" name="card" value="0">
                                            <input type="checkbox" value="1" name="card" class="checkbox" data-index="1" @if($product->card ==1) checked @endif>
                                            <span class="slider"></span>
                                            Card
                                        </label>
                                        <label class="toggle">
                                            <input type="hidden" name="color" value="0">
                                            <input type="checkbox" value="1" name="color" class="checkbox" data-index="1" @if($product->color ==1) checked @endif>
                                            <span class="slider"></span>
                                            Color
                                        </label>
                                        <label class="toggle">
                                            <input type="hidden" name="text" value="0">
                                            <input type="checkbox" value="1" name="text" class="checkbox" data-index="1" @if($product->text ==1) checked @endif>
                                            <span class="slider"></span>
                                            Text
                                        </label>
                                    </div>
                                    <br/>
                                    <br/>
                                    <script>
                                        document.querySelectorAll('.checkbox').forEach((checkbox) => {
                                            // Set initial value based on checked state
                                            checkbox.value = checkbox.checked ? 1 : 0;

                                            checkbox.addEventListener('change', function() {
                                                this.value = this.checked ? 1 : 0;
                                                console.log(`Checkbox ${this.dataset.index} value: ${this.value}`);
                                            });
                                        });
                                    </script>

                                    @forelse($attribute as $sizes)
                                        <div class="card mb-8 rounded-4" id="layers">
                                            <div class="card-header p-7 bg-transparent">
                                                <h4 class="fs-18px mb-0 font-weight-500">Add Attribute</h4>
                                            </div>
                                            <div class="card-body p-7 layer">
                                                <div class="form-border-1">
                                                    <div class="mb-8">
                                                        <label for="shipping-fee" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Name</label>
                                                        {{--                                            <input type="text" name="attribute[][name]" id="attributeName" class="form-control" placeholder="Name" required>--}}
                                                        <select name="attribute[0][name]" id="attributeName" class="form-control">
                                                            <option value="{{$sizes['name']}}">{{$sizes['name']}}</option>
                                                            @foreach($attributes as $act)
                                                                <option value="{{$act['name']}}">{{$act['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                        <br>
                                                        <textarea name="attribute[0][value]" class="form-control" id="attributeValues" placeholder="Enter options for customer to choose from f.e, Blue, or Large , Use | to separate different options.">{{$sizes['value']}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-danger">No Attribute Applicable to this duplicate products</p>

                                    @endforelse
                                    <br/>
                                    <br/>




                                    @foreach($product->variations as $variationIndex => $variation)
                                        <div class="card-body p-7 layer" id="variationContainer">
                                            <!-- Variations will be displayed here -->
                                            <div class="mb-8">
                                                @foreach($variation->options as $optionIndex => $option)
                                                    <strong>{{ ucfirst($option->name) }}: {{ $option->value }} |</strong>
                                                    <input type="hidden" name="variation_attributes[{{ $variationIndex }}][options][{{ $optionIndex }}][name]" value="{{ $option->name }}"/>
                                                    <input type="hidden" name="variation_attributes[{{ $variationIndex }}][options][{{ $optionIndex }}][value]" value="{{ $option->value }}"/>
                                                @endforeach
                                                <input type="number" name="variation_attributes[{{ $variationIndex }}][price]" value="{{ $variation->price }}" step="0.01"/>
                                            </div>
                                        </div>
                                    @endforeach


                                    <script>
                                        let attributeIndex = 1;

                                        document.getElementById('add-layer').addEventListener('click', function() {
                                            const layers = document.getElementById('layers');
                                            const layer = document.createElement('div');
                                            layer.classList.add('card-body', 'p-7', 'layer');
                                            layer.innerHTML = `
        <div class="form-border-1">
            <div class="mb-8">
                <label for="attributeName${attributeIndex}" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Name</label>
                <select name="attribute[${attributeIndex}][name]" id="attributeName${attributeIndex}" class="form-control">
                    <option>Choose Option</option>
                    @foreach($attribute as $act)
                                            <option value="{{ $act['name'] }}">{{ $act['name'] }}</option>
                    @endforeach
                                            </select>
                                            <br>
                                            <textarea name="attribute[${attributeIndex}][value]" class="form-control" id="attributeValues${attributeIndex}" placeholder="Enter options for customer to choose from e.g., Blue, Large. Use | to separate different options."></textarea>
            </div>
        </div>
    `;
                                            layers.appendChild(layer);
                                            attributeIndex++;
                                        });

                                        function generateVariations() {
                                            const attributes = [];
                                            for (let i = 0; i < attributeIndex; i++) {
                                                const name = document.querySelector(`[name="attribute[${i}][name]"]`).value;
                                                const values = document.querySelector(`[name="attribute[${i}][value]"]`).value.split('|').map(value => value.trim());
                                                attributes.push({ name, values });
                                            }

                                            const allCombinations = getAllCombinations(attributes);
                                            displayVariations(allCombinations);
                                        }

                                        function getAllCombinations(attributes) {
                                            const combinations = [];
                                            const helper = (current, remaining) => {
                                                if (remaining.length === 0) {
                                                    combinations.push(current);
                                                } else {
                                                    const nextAttribute = remaining[0];
                                                    for (const value of nextAttribute.values) {
                                                        helper([...current, { name: nextAttribute.name, value }], remaining.slice(1));
                                                    }
                                                }
                                            };
                                            helper([], attributes);
                                            return combinations;
                                        }

                                        function displayVariations(variations) {
                                            const variationContainer = document.getElementById('variationContainer');
                                            variationContainer.innerHTML = ''; // Clear previous variations

                                            variations.forEach((variation, index) => {
                                                const variationElement = document.createElement('div');
                                                variationElement.classList.add('mb-8');
                                                variationElement.innerHTML = `<strong>Variation ${index + 1}:</strong> `;

                                                variation.forEach(attribute => {
                                                    variationElement.innerHTML += `<strong>${attribute.name}:</strong> ${attribute.value} `;
                                                    const nameInput = document.createElement('input');
                                                    nameInput.type = 'hidden';
                                                    nameInput.name = `variation_attributes[${index}][${attribute.name}]`;
                                                    nameInput.value = attribute.value;
                                                    variationElement.appendChild(nameInput);
                                                });

                                                const priceInput = document.createElement('input');
                                                priceInput.type = 'number';
                                                priceInput.name = `variation_attributes[${index}][price]`;
                                                priceInput.value = '0';
                                                priceInput.onchange = function() {
                                                    updatePrice(index, this.value);
                                                };

                                                variationElement.appendChild(document.createElement('br'));
                                                variationElement.appendChild(document.createTextNode('Price: ₦'));
                                                variationElement.appendChild(priceInput);

                                                variationContainer.appendChild(variationElement);
                                            });
                                        }

                                        function updatePrice(index, price) {
                                            console.log('Variation ' + (index + 1) + ' price updated to: ₦' + price);
                                        }

                                    </script>


                                    <div class="card-header p-7 bg-transparent">
                                        <h4 class="fs-18px mb-0 font-weight-500">More Options</h4>
                                    </div>

                                    @forelse($items as $index => $item)
                                        <div class="item">
                                            <div class="mb-8">
                                                <label for="sizes_{{ $index }}" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Item Name</label>
                                                <input type="text" name="items[{{ $index }}][Sizes]" class="form-control" id="sizes_{{ $index }}" value="{{ $item->product }}">
                                            </div>
                                            <div class="mb-8">
                                                <label for="price_{{ $index }}" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Price</label>
                                                <input type="number" name="items[{{ $index }}][price]" id="price_{{ $index }}" value="{{ $item->price }}" class="form-control">
                                            </div>
                                        </div>

                                    @empty
                                        <div id="items-container">
                                            <div class="item">
                                                <div class="mb-8">
                                                    <label for="sizes_0" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Item Name</label>
                                                    <input type="text" name="items[0][Sizes]" class="form-control" id="sizes_0">
                                                </div>
                                                <div class="mb-8">
                                                    <label for="price_0" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Price</label>
                                                    <input type="number" name="items[0][price]" id="price_0" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" id="add-item" class="btn btn-primary">Add Another Product</button>
                                    @endforelse
                                    <br/>
                                    <br/>

                                    <script>
                                        document.getElementById('add-item').addEventListener('click', function() {
                                            let container = document.getElementById('items-container');
                                            let itemCount = container.getElementsByClassName('item').length;
                                            let newItem = document.createElement('div');
                                            newItem.className = 'item';
                                            newItem.innerHTML = `
            <div class="mb-8">
                <label for="sizes_${itemCount}" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Item Name</label>
                <input type="text" name="items[${itemCount}][Sizes]" id="sizes_${itemCount}" class="form-control">
            </div>
            <div class="mb-8">
                <label for="price_${itemCount}" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Price</label>
                <input type="number" name="items[${itemCount}][price]" id="price_${itemCount}" class="form-control">
            </div>
        `;
                                            container.appendChild(newItem);
                                        });
                                    </script>

                                    <div class="mb-8">
                                        <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Addition Information</label>
                                        <textarea   class="form-control" name="addition" rows="4">{{$product->addition}}</textarea>
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
                                            <input type="number" placeholder="NGN" value="{{$product->fee}}" name="fee" class="form-control" id="shipping-fee">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-8 rounded-4">
                                <div class="card-header p-7 bg-transparent">
                                    <h4 class="fs-18px mb-0 font-weight-500">Media</h4>
                                </div>
                                <div class="card-body p-7">
                                    <div class="input-upload">
                                        <div class="mb-7">
                                            <img src="{{url($product->image)}}" width="102" class="d-block mx-auto" alt>
                                            {{--                                    <img src="https://templates.g5plus.net/glowing-bootstrap-5/assets/images/dashboard/upload.svg" width="102" class="d-block mx-auto" alt>--}}
                                        </div>
                                        <input name="image" class="form-control" id="file-input" type="file">
                                    </div>
                                </div>
                                <div class="card card-body" id="image-preview"></div>

                            </div>
                            <div class="card mb-8 rounded-4">
                                <div class="card-header p-7 bg-transparent">
                                    <h4 class="fs-18px mb-0 font-weight-500">Organization</h4>
                                </div>
                                <div class="card-body p-7">
                                    <div class="row mx-n3">
                                        <div class="">
                                            <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="category">Category</label>
                                            @foreach ($category as $cat)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $cat->id }}" id="category{{ $cat->id }}"
                                                           @if (in_array($cat->id, $product->categories->pluck('id')->toArray())) checked @endif>
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
                                                Update
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
        $(document).ready(function() {


            // Send the AJAX request
            $('#update').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                // The user clicked "Yes", proceed with the action
                // Add your jQuery code here
                // For example, perform an AJAX request or update the page content
                Swal.fire({
                    title: 'Processing',
                    text: 'Please wait...',
                    icon: 'info',
                    allowOutsideClick: false,
                    showConfirmButton: false
                });

                $.ajax({
                    url: "{{ route('admin/updateproduct') }}",
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
