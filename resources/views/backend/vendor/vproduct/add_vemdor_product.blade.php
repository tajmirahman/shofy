@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr />
                <div class="form-body mt-4">
                    <form action="{{route('store.vendor.product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3">

                                        <label class="form-label">Product Name</label>

                                        <input type="text" class="form-control" name="product_name" autocomplete="off"
                                            required>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Color</label>
										<input type="text" name="color" class="form-control" data-role="tagsinput">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Size</label>
										<input type="text" name="size" class="form-control" data-role="tagsinput">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Short Description</label>

                                        <textarea class="form-control" name="short_descp" rows="3"></textarea>
                                    </div>


                                    <div class="mb-3">

                                        <label class="form-label">Long Description</label>

                                        <textarea class="form-control" id="editor" name="long_descp" rows="5"></textarea>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Image</label>

                                        <input type="file" id="image"
                                            class="form-control @error('product_image') is-invalid @enderror"
                                            name="product_image" required autocomplete="off">

                                        @error('product_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <img src="{{ url('upload/no_image.jpg') }}" alt="" id="showImage"
                                            style="width: 80px; height: 80px">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Multi Img</label>

                                        <input type="file" class="form-control" id="multiImg" name="multi_img[]"
                                            multiple="" required autocomplete="off">

                                        <div class="row mt-3" id="preview_img"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label class="form-label">Selling Price</label>

                                            <input type="text" class="form-control" name="selling_price"
                                                autocomplete="off">

                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Discount Price</label>

                                            <input type="text" class="form-control" name="discount_price"
                                                autocomplete="off">

                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Qty</label>

                                            <input type="text" class="form-control" name="product_qty"
                                                autocomplete="off">

                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Stock</label>

                                            <input type="text" class="form-control" name="stock"
                                                autocomplete="off">

                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label">Brand Name</label>

                                            <input type="text" class="form-control" name="brand_name" autocomplete="off">

                                        </div>


                                        <div class="col-12">
                                            <label class="form-label">Category Name</label>

                                            <select name="category_id" class="form-select">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">SubCategory Name</label>

                                            <select name="subcategory_id" class="form-select">

                                            </select>
                                        </div>


                                        <div class="col-6 form-check">

                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="featured" id="flexCheckDefault">

                                            <label class="form-check-label">Featured</label>

                                        </div>

                                        <div class="col-6 form-check">

                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="hot_deal" id="flexCheckDefault">

                                            <label class="form-check-label">Hot Deal</label>

                                        </div>

                                        <div class="col-6 form-check">

                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="best_seeling" id="flexCheckDefault">

                                            <label class="form-check-label">Best Selling</label>

                                        </div>

                                        <div class="col-6 form-check mb-3">

                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="new" id="flexCheckDefault">

                                            <label class="form-check-label">New Product</label>

                                        </div>

                                        <hr>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>


    </div>
    {{-- Show Image --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    {{-- Multi Image --}}
    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    product_name: {
                        required: true,
                    },
                },
                messages: {
                    product_name: {
                        required: 'Please Enter Product Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    {{-- sub category --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/vendor/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
