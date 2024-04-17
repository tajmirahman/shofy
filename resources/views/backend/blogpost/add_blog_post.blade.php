@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">BlogPost</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add BlogPost</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">

                                <form id="myForm" action="{{ route('store.blog.post') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Blog Category</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary form-group">
                                            <select name="blogcat_id" class="form-select">
                                                <option selected disabled>Select Blog Category</option>
                                                @foreach ($blogcat as $item)
                                                    <option value="{{ $item->id }}">{{ $item->blog_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Post Title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary form-group">
                                            <input type="text" autocomplete="off" name="post_title"
                                                class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Short Description</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary form-group">
                                            <textarea class="form-control" name="short_descp" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-sm-3">
                                            <label class="form-label">Long Description</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary form-group">
                                            <textarea class="form-control mb-4" id="editor" name="long_descp"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-5">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" id="image" autocomplete="off" name="image"
                                                class="mb-1 form-control @error('image') is-invalid @enderror" />
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <img src="{{ url('upload/no_image.jpg') }}" alt="" id="showImage"
                                                style="width: 80px; height: 80px">

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-inverse-primary px-3"
                                                value="Add BlogPost" />
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
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
    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    post_title: {
                        required: true,
                    },
                },
                messages: {
                    post_title: {
                        required: 'Please Enter Post Title',
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
@endsection
