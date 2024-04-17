@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
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

                                <form id="myForm" action="{{ route('update.permission') }}" method="POST">
                                    @csrf
                                    
                                    <input type="hidden" name="id" value="{{$permissions->id}}">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Permission Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary  @error('name') is-invalid @enderror">
                                            <input type="text" value="{{$permissions->name}}" autocomplete="off" name="name" class="form-control" />

                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Group Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary form-group">
                                            <select
                                                class="form-select form-select-sm @error('group_name') is-invalid @enderror"
                                                aria-label=".form-select-sm example" name="group_name">
                                                <option selected disabled>Select Group Name</option>

<option value="vendor" {{$permissions->group_name == 'vendor' ? 'selected' : ''}}>Vendor</option>
<option value="subcategory" {{$permissions->group_name == 'subcategory' ? 'selected' : ''}}>SubCategory</option>
<option value="category" {{$permissions->group_name == 'category' ? 'selected' : ''}}>Category</option>
<option value="banner" {{$permissions->group_name == 'banner' ? 'selected' : ''}}>Banner</option>
<option value="slider" {{$permissions->group_name == 'slider' ? 'selected' : ''}}>Slider</option>
<option value="product" {{$permissions->group_name == 'product' ? 'selected' : ''}}>Product</option>
<option value="stock" {{$permissions->group_name == 'stock' ? 'selected' : ''}}>Stock</option>
<option value="shippingarea" {{$permissions->group_name == 'shippingarea' ? 'selected' : ''}}>Shipping Area</option>
<option value="review" {{$permissions->group_name == 'review' ? 'selected' : ''}}>Review</option>
<option value="comment" {{$permissions->group_name == 'comment' ? 'selected' : ''}}>Comment</option>
<option value="coupon" {{$permissions->group_name == 'coupon' ? 'selected' : ''}}>Coupon</option>
<option value="order" {{$permissions->group_name == 'order' ? 'selected' : ''}}>Order</option>
<option value="orderstock" {{$permissions->group_name == 'orderstock' ? 'selected' : ''}}>Order stock</option>
<option value="sitesetting" {{$permissions->group_name == 'sitesetting' ? 'selected' : ''}}>Site Setting</option>
<option value="blog" {{$permissions->group_name == 'blog' ? 'selected' : ''}}>Blog</option>
<option value="report" {{$permissions->group_name == 'report' ? 'selected' : ''}}>Report</option>
<option value="role" {{$permissions->group_name == 'role' ? 'selected' : ''}}>Role & Permission</option>

                                            </select>

                                            @error('group_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-inverse-primary px-3"
                                                value="Update Permission" />
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

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Permission Name',
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
