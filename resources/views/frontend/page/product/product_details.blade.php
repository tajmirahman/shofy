@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Product Description
@endsection

<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg text-start pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h4 class="breadcrumb__title">{{ $product['category']['category_name'] }}</h4>
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <span>{{ $product['subcategory']['subcategory_name'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- product details area start -->
<section class="tp-product-details-area pt-80" data-bg-color="#EFF1F5">
    <div class="tp-product-details-top pb-115">
        <div class="container">
            <div class="row">

                {{-- Image  --}}
                <div class="col-xl-6 col-lg-6">
                    <div class="tp-product-details-thumb-wrapper tp-product-details-thumb-style2 tp-tab">

                        <div class="tab-content m-img" id="productDetailsNavContent">

                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel"
                                aria-labelledby="nav-1-tab" tabindex="0">

                                <div class="tp-product-details-nav-main-thumb">

                                    <img style="width: 488px; height: 488px;" src="{{ asset($product->product_image) }}"
                                        alt="">
                                </div>

                            </div>

                        </div>

                        <nav>
                            <div class="nav nav-tabs " id="productDetailsNavThumb" role="tablist">

                                @foreach ($multiImg as $img)
                                    <button class="nav-link" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1"
                                        type="button" role="tab" aria-controls="nav-1" aria-selected="true">
                                        <img src="{{ asset($img->multi_img) }}" alt="">
                                    </button>
                                @endforeach

                                {{-- <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2"
                                type="button" role="tab" aria-controls="nav-2" aria-selected="false">
                                <img src="assets/img/product/details/2/nav/product-details-nav-2.jpg" alt="">
                             </button>
                             <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3"
                                type="button" role="tab" aria-controls="nav-3" aria-selected="false">
                                <img src="assets/img/product/details/2/nav/product-details-nav-3.jpg" alt="">
                             </button>
                             <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4"
                                type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                                <img src="assets/img/product/details/2/nav/product-details-nav-4.jpg" alt="">
                             </button>
                             <button class="nav-link" id="nav-5-tab" data-bs-toggle="tab" data-bs-target="#nav-5"
                                type="button" role="tab" aria-controls="nav-5" aria-selected="false">
                                <img src="assets/img/product/details/2/nav/product-details-nav-5.jpg" alt="">
                             </button> --}}
                            </div>
                        </nav>
                    </div>
                </div>
                {{-- Image  --}}

                <div class="col-xl-6 col-lg-6">
                    <div class="tp-product-details-wrapper tp-product-details-wrapper-style2">
                        <div class="tp-product-details-category">
                            <span>{{ $product['category']['category_name'] }} Category</span>
                        </div>
                        <h3 class="tp-product-details-title" id="dpname">{{ $product->product_name }}</h3>

                        <!-- inventory details -->
                        <div class="tp-product-details-inventory d-flex align-items-center justify-content-between">
                            <!-- price -->
                            <div class="tp-product-details-price-wrapper">
                                @if ($product->discount_price == null)
                                    <span class="tp-product-price new-price">Tk
                                        {{ $product->selling_price }}</span>
                                @else
                                    <span class="tp-product-price old-price">Tk
                                        {{ $product->selling_price }}</span>
                                    <span class="tp-product-price new-price">Tk
                                        {{ $product->discount_price }}</span>
                                @endif
                            </div>

                            <div class="tp-product-details-rating-wrapper d-flex align-items-center">

                                @php
                                    $reviewcount = App\Models\Review::where('product_id', $product->id)
                                        ->where('status', 1)
                                        ->latest()
                                        ->get();

                                    $avarage = App\Models\Review::where('product_id', $product->id)
                                        ->where('status', 1)
                                        ->avg('rating');
                                @endphp

                                <div class="tp-product-details-rating">

                                    @if ($avarage == 0)
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                    @elseif($avarage == 1 || $avarage < 2)
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                    @elseif($avarage == 2 || $avarage < 3)
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                    @elseif($avarage == 3 || $avarage < 4)
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                    @elseif($avarage == 4 || $avarage < 5)
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span> <span><i
                                                class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                    @elseif($avarage == 5 || $avarage < 5)
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span> <span><i
                                                class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    @endif


                                </div>

                                <div class="tp-product-details-reviews">
                                    <span>({{ count($reviewcount) }} Reviews)</span>
                                </div>

                            </div>


                        </div>

                        <p>{{ $product->short_descp }}</p>



                        <!-- variations -->
                        <div class="tp-product-details-variation">

                            <!-- single item -->
                            <div class="row">

                                @if ($product->color == null)
                                @else
                                    <div class="col-lg-6">
                                        <h4 class="tp-product-details-variation-title">Color :</h4>
                                        <select name="dcolor" id="dcolor" class="form-select">
                                            <option value="">Select Color</option>

                                            @foreach ($product_color as $color)
                                                <option value="">{{ ucwords($color) }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                @endif

                                @if ($product->size == null)
                                @else
                                    <div class="col-lg-6">
                                        <h4 class="tp-product-details-variation-title">Size :</h4>
                                        <select name="dsize" id="dsize" class="form-select">
                                            <option value="">Select Size</option>
                                            @foreach ($product_size as $size)
                                                <option value="">{{ ucwords($size) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                            </div>
                        </div>


                        <!-- actions -->
                        <div class="tp-product-details-action-wrapper">

                            <h3 class="tp-product-details-action-title">Quantity</h3>

                            <div class="tp-product-details-action-item-wrapper d-flex flex-wrap align-items-center">
                                <div class="tp-product-details-quantity">
                                    <div class="tp-product-quantity mb-15 mr-15">

                                        <span class="tp-cart-minus">
                                            <svg width="11" height="2" viewBox="0 0 11 2" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1H10" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>

                                        <input id="dqty" class="tp-cart-input" type="text" min="1"
                                            value="1">

                                        <span class="tp-cart-plus">
                                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6H10" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>

                                    </div>
                                </div>

                                <input type="hidden" id="dproduct_id" value="{{ $product->id }}">

                                <input type="hidden" id="vproduct_id" value="{{ $product->vendor_id }}">

                                <div class="tp-product-details-add-to-cart mb-15 mr-10">

                                    <button type="submit" onclick="addToCartDetails()"
                                        class="tp-product-details-add-to-cart-btn w-100">Add To Cart</button>

                                </div>

                                <div class="tp-product-details-wishlist mb-15">

                                    <a type="submit" id="{{ $product->id }}" onclick="addToWishList(this.id)"
                                        class="tp-product-details-wishlist-btn">

                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.52624 7.48527C2.69896 11.0641 7.33213 13.9579 8.5634 14.6742C9.79885 13.9505 14.4655 11.0248 15.6006 7.48855C16.3458 5.20273 15.6541 2.30731 12.9055 1.43844C11.5738 1.01918 10.0205 1.27434 8.94817 2.08824C8.724 2.25726 8.41284 2.26054 8.18699 2.09317C7.05107 1.25547 5.56719 1.01015 4.21463 1.43844C1.47019 2.30649 0.780949 5.20191 1.52624 7.48527ZM8.56367 16C8.45995 16 8.35706 15.9754 8.26338 15.9253C8.00157 15.785 1.83433 12.4507 0.331203 7.86098C0.330366 7.86098 0.330366 7.86016 0.330366 7.86016C-0.613163 4.97048 0.437434 1.3391 3.82929 0.266748C5.42192 -0.238659 7.15758 -0.0163125 8.56116 0.852561C9.92125 0.009122 11.728 -0.22389 13.2888 0.266748C16.684 1.34074 17.738 4.9713 16.7953 7.86016C15.3407 12.3973 9.12828 15.7818 8.86479 15.9237C8.77111 15.9746 8.66739 16 8.56367 16Z"
                                                fill="currentColor" />

                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M13.5155 6.78932C13.1918 6.78932 12.9174 6.54564 12.8906 6.22402C12.8354 5.5496 12.3754 4.9802 11.7204 4.77262C11.39 4.6676 11.2094 4.32054 11.3156 3.9981C11.4235 3.67483 11.774 3.49926 12.1052 3.60099C13.2453 3.96282 14.0441 4.95312 14.142 6.12393C14.1696 6.46278 13.9128 6.75979 13.5673 6.78686C13.5498 6.7885 13.5331 6.78932 13.5155 6.78932Z"
                                                fill="currentColor" />

                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tp-product-details-query">

                            <div class="tp-product-details-query-item d-flex align-items-center">
                                <span class="fw-bold">Vendor Name : </span>
                                @if ($product->vendor_id == null)
                                    <p class="text-muted">By Admin</p>
                                @else
                                    <p class="text-muted">By {{ $product['user']['name'] }}</p>
                                @endif
                            </div>

                            <div class="tp-product-details-query-item d-flex align-items-center">
                                <span class="fw-bold">SubCategory: </span>
                                <p>{{ $product['subcategory']['subcategory_name'] }}</p>
                            </div>

                            <div class="tp-product-details-query-item d-flex align-items-center">
                                <span class="fw-bold">Code: </span>
                                <p>{{ $product->product_code }}</p>
                            </div>

                            <div class="tp-product-details-query-item d-flex align-items-center">
                                <span class="fw-bold">Stock: </span>

                                @if ($product->product_qty > 0)
                                    <p class="text-success">Stock In</p>
                                @else
                                    <p class="text-danger">Stock Out</p>
                                @endif
                            </div>

                        </div>

                        <div class="tp-product-details-social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="tp-product-details-bottom tp-product-details-bottom-style2 pt-95 pb-85 white-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-product-details-tab-nav tp-tab">
                        <nav>
                            <div class="nav nav-tabs p-relative tp-product-tab justify-content-sm-start justify-content-center"
                                id="nav-tab" role="tablist">

                                <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-description" type="button" role="tab"
                                    aria-controls="nav-description" aria-selected="true">Description</button>

                                <button class="nav-link" id="nav-addInfo-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-addInfo" type="button" role="tab"
                                    aria-controls="nav-addInfo" aria-selected="false">Additional information</button>

                                @php
                                    $countreviews = App\Models\Review::where('product_id', $product->id)
                                        ->where('status', 1)
                                        ->get();
                                @endphp

                                <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-review" type="button" role="tab"
                                    aria-controls="nav-review" aria-selected="false">Reviews
                                    ({{ count($countreviews) }})</button>

                                <span id="productTabMarker" class="tp-product-details-tab-line"></span>

                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                aria-labelledby="nav-description-tab" tabindex="0">
                                <div class="tp-product-details-desc-wrapper-2 pt-70">

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="tp-product-details-desc-fact">
                                                <p>{{ $product->long_descp }}</p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-addInfo" role="tabpanel"
                                aria-labelledby="nav-addInfo-tab" tabindex="0">

                                <div class="tp-product-details-additional-info  tp-table-style-2">
                                    <!-- add 'tp-table-style-2' class name to view second style -->
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <h3 class="tp-product-details-additional-info-title">Additional information
                                            </h3>
                                            <!-- default hidden. its for second style -->

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Review  --}}
                            <div class="tab-pane fade" id="nav-review" role="tabpanel"
                                aria-labelledby="nav-review-tab" tabindex="0">
                                <div
                                    class="tp-product-details-review-wrapper tp-product-details-review-wrapper-2 pt-50">
                                    <h3 class="tp-product-details-review-wrapper-title-2">{{ count($countreviews) }}
                                        Review for Product</h3>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="tp-product-details-review-item-wrapper-2">
                                                <div class="tp-product-details-review-item-2">

                                                    @php
                                                        $reviews = App\Models\Review::where('product_id', $product->id)
                                                            ->where('status', 1)
                                                            ->limit(5)
                                                            ->latest()
                                                            ->get();
                                                    @endphp

                                                    <div class="row">

                                                        @forelse ($reviews as $review)
                                                            <div class="col-lg-10 col-md-10">

                                                                <div
                                                                    class="tp-product-details-review-avater-2 d-flex align-items-center">

                                                                    <div
                                                                        class="tp-product-details-review-avater-thumb">
                                                                        <a href="javascript:;">
                                                                            <img style="width:70px;height: 70px;;"
                                                                                src="{{ !empty($review->user->photo) ? url('upload/user_images/' . $review->user->photo) : url('upload/user.png') }}"
                                                                                alt="">
                                                                        </a>
                                                                    </div>

                                                                    <div
                                                                        class="tp-product-details-review-avater-content">

                                                                        <div
                                                                            class="tp-product-details-review-avater-rating d-flex align-items-center">

                                                                            @if ($review->rating == 1)
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span>
                                                                                    <i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                            @elseif ($review->rating == 2)
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                            @elseif ($review->rating == 3)
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                            @elseif ($review->rating == 3.5)
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star-half-stroke"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                            @elseif ($review->rating == 4)
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star text-secondary"></i></span>
                                                                            @elseif ($review->rating == 4.5)
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star-half-stroke"></i></span>
                                                                            @elseif ($review->rating == 5)
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                                <span><i
                                                                                        class="fa-solid fa-star"></i></span>
                                                                            @endif

                                                                        </div>

                                                                        <h3
                                                                            class="tp-product-details-review-avater-title">
                                                                            {{ $review->user->name }}</h3>
                                                                        <span
                                                                            class="tp-product-details-review-avater-meta fw-bold">{{ $review->created_at->format('d F Y') }}</span>


                                                                        <p class="text-muted">{!! $review->comment !!}
                                                                        </p>

                                                                    </div>


                                                                </div>

                                                            </div>
                                                        @empty
                                                            <h4>No Comment Avaible in this product</h4>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Review  --}}
                                        <div class="col-lg-12">
                                            <div class="tp-product-details-review-form pt-55">
                                                <h3 class="tp-product-details-review-form-title">Add a Review</h3>

                                                <div
                                                    class="tp-product-details-review-form-rating d-flex align-items-center">
                                                    <p> Review for a product at first <a href="{{ route('login') }}"
                                                            class="text-primary">Login here</a> </p>
                                                    <div
                                                        class="tp-product-details-review-form-rating-icon d-flex align-items-center">
                                                    </div>
                                                </div>


                                                @auth
                                                    <form action="{{ route('store.review') }}" method="POST">

                                                        @csrf

                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">

                                                        @if ($product->vendor_id == null)
                                                            <input type="hidden" name="hvendor_id" value="">
                                                        @else
                                                            <input type="hidden" name="hvendor_id"
                                                                value="{{ $product->vendor_id }}">
                                                        @endif

                                                        <div class="row pb-20">
                                                            <div class="col-6">
                                                                <div class="table-responsive table-bordered">
                                                                    <table class="table">

                                                                        <thead class="fw-bold">
                                                                            <tr>
                                                                                <th>Value</th>
                                                                                <th>1</th>
                                                                                <th>2</th>
                                                                                <th>3</th>
                                                                                <th>3.5</th>
                                                                                <th>4</th>
                                                                                <th>4.5</th>
                                                                                <th>5</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>

                                                                            <tr>
                                                                                <td>Rating</td>

                                                                                <td><input type="radio" name="rating"
                                                                                        value="1"></td>
                                                                                <td><input type="radio" name="rating"
                                                                                        value="2"></td>
                                                                                <td><input type="radio" name="rating"
                                                                                        value="3"></td>
                                                                                <td><input type="radio" name="rating"
                                                                                        value="3.5"></td>
                                                                                <td><input type="radio" name="rating"
                                                                                        value="4"></td>
                                                                                <td><input type="radio" name="rating"
                                                                                        value="4.5"></td>
                                                                                <td><input type="radio" name="rating"
                                                                                        value="5"></td>

                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tp-product-details-review-input-wrapper">
                                                            <div class="tp-product-details-review-input-box">
                                                                <div class="tp-product-details-review-input">
                                                                    <textarea id="msg" name="comment" placeholder="Write your review here..."></textarea>
                                                                </div>
                                                                <div class="tp-product-details-review-input-title">
                                                                    <label for="msg">Your Review</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tp-product-details-review-btn-wrapper">
                                                            <button type="submit"
                                                                class="tp-product-details-review-btn">Submit</button>
                                                        </div>

                                                    </form>
                                                @else
                                                @endauth



                                            </div>
                                        </div>
                                        {{-- Review  --}}


                                    </div>
                                </div>
                            </div>
                            {{-- Review  --}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product details area end -->


<!-- related product area start -->
<section class="tp-product-arrival-area pb-55">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xl-5 col-sm-6">
                <div class="tp-section-title-wrapper mb-40">
                    <h3 class="tp-section-title">Related Products

                        <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                stroke-linecap="round" />
                        </svg>
                    </h3>
                </div>
            </div>

            <div class="col-xl-7 col-sm-6">
                <div class="tp-product-arrival-more-wrapper d-flex justify-content-end">
                    <div class="tp-product-arrival-arrow tp-swiper-arrow mb-40 text-end tp-product-arrival-border">
                        <button type="button" class="tp-arrival-slider-button-prev">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <button type="button" class="tp-arrival-slider-button-next">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">

                <div class="tp-product-arrival-slider fix">

                    <div class="tp-product-arrival-active swiper-container">
                        <div class="swiper-wrapper">

                            @foreach ($relatedProduct as $product)
                                <div class="tp-product-item transition-3 mb-25 swiper-slide">

                                    <div class="tp-product-thumb p-relative fix m-img">

                                        <a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">

                                            <img src="{{ asset($product->product_image) }}" alt="product-electronic">
                                        </a>

                                        <!-- product badge -->
                                        <div class="tp-product-badge">

                                            @if ($product->discount_price == null)
                                            @else
                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount / $product->discount_price) * 100;
                                                @endphp
                                                <span class="product-hot">{{ round($discount) }}%</span>
                                            @endif

                                        </div>

                                        <!-- product action -->
                                        <div class="tp-product-action">
                                            <div class="tp-product-action-item d-flex flex-column">

                                                <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"
                                                    class="tp-product-action-btn tp-product-add-cart-btn">
                                                    <svg width="20" height="20" viewBox="0 0 20 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z"
                                                            fill="currentColor" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z"
                                                            fill="currentColor" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z"
                                                            fill="currentColor" />

                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z"
                                                            fill="currentColor" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z"
                                                            fill="currentColor" />

                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z"
                                                            fill="currentColor" />
                                                    </svg>

                                                    <span class="tp-product-tooltip">Add to Cart</span>
                                                </a>

                                                <button type="button"
                                                    class="tp-product-action-btn tp-product-quick-view-btn"
                                                    data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                    <svg width="20" height="17" viewBox="0 0 20 17"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z"
                                                            fill="currentColor" />
                                                        <g mask="url(#mask0_1211_721)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z"
                                                                fill="currentColor" />
                                                        </g>
                                                    </svg>

                                                    <span class="tp-product-tooltip">Quick View</span>
                                                </button>
                                                <button type="button"
                                                    class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                    <svg width="20" height="19" viewBox="0 0 20 19"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                            fill="currentColor" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                            fill="currentColor" />
                                                    </svg>

                                                    <span class="tp-product-tooltip">Add To Wishlist</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- product content -->
                                    <div class="tp-product-content">

                                        <div class="tp-product-category">
                                            <a
                                                href="javascript:;">{{ $product['subcategory']['subcategory_name'] }}</a>
                                        </div>

                                        <h3 class="tp-product-title">
                                            <a
                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                {{ $product->product_name }}
                                            </a>
                                        </h3>

                                        <div class="tp-product-category">
                                            @if ($product->vendor_id == null)
                                                <a href="javascript:;">By Admin</a>
                                            @else
                                                <a href="javascript:;">By {{ $product['user']['name'] }}</a>
                                            @endif
                                        </div>

                                        <div class="tp-product-rating d-flex align-items-center">
                                            <div class="tp-product-rating-icon">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                            </div>
                                            <div class="tp-product-rating-text">
                                                <span>(7 Review)</span>
                                            </div>
                                        </div>

                                        <div class="tp-product-price-wrapper">

                                            @if ($product->discount_price == null)
                                                <span class="tp-product-price new-price">Tk
                                                    {{ $product->selling_price }}</span>
                                            @else
                                                <span class="tp-product-price old-price">Tk
                                                    {{ $product->selling_price }}</span>
                                                <span class="tp-product-price new-price">Tk
                                                    {{ $product->discount_price }}</span>
                                            @endif


                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- related product area end -->

@endsection
