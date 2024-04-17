@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Shofy | Category
@endsection

<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-100 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Only Categories</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <span>Only Categories</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- category area start -->
<section class="tp-product-category pt-60 pb-15">
    <div class="container">
        <div class="row row-cols-xl-6 row-cols-lg-6 row-cols-md-4">

            @foreach ($categorys as $category)

                @php
                    $product = App\Models\Product::where('category_id', $category->id)->get();
                @endphp

                <div class="col">
                    <div class="tp-product-category-item text-center mb-40">
                        <div class="tp-product-category-thumb fix">
                            <a href="{{route('catwise.product',$category->id)}}">
                                <img src="{{ asset($category->image) }}" alt="product-category">
                            </a>
                        </div>
                        <div class="tp-product-category-content">
                            <h3 class="tp-product-category-title">
                                <a href="{{route('catwise.product',$category->id)}}">{{ $category->category_name }}</a>
                            </h3>
                            <p>{{ count($product) }} Product</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- category area end -->


<!-- subscribe area start -->
@include('frontend.home.subscribe')
<!-- subscribe area end -->

@endsection
