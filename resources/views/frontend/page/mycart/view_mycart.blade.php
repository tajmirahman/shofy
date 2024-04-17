@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Shofy | My Cart
@endsection

<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-70 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Shopping Cart</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- cart area start -->
<section class="tp-cart-area pb-120">
    <div class="container">
        <div class="row">

            <div class="col-xl-12 col-lg-12">
                <div class="tp-cart-list mb-25 mr-30">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2" class="tp-cart-header-product">Product</th>
                                <th class="tp-cart-header-price">Color</th>
                                <th class="tp-cart-header-price">Size</th>
                                <th class="tp-cart-header-price">Unit Price</th>
                                <th class="tp-cart-header-quantity">Quantity</th>
                                <th class="tp-cart-header-price">Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="cartPage">

                        </tbody>

                    </table>
                </div>
            </div>

            <!-- ======================================== -->

            <!-- ==================================== -->

            <div class="row pt-50">

                <div class="col-xl-7 col-lg-7 col-md-7">
                    <div class="tp-cart-bottom">
                        <div class="row align-items-end">
                            <div class="col-xl-7 col-md-7">
                                @if (Session::has('coupon'))
                                @else
                                    <div class="tp-cart-coupon" id="couponField">
                                        <form action="#">
                                            <div class="tp-cart-coupon-input-box">
                                                <label>Coupon Code:</label>
                                                <div class="tp-cart-coupon-input d-flex align-items-center">

                                                    <input type="text" autocomplete="off" id="coupon_name"
                                                        placeholder="Enter Coupon Code">

                                                    <a type="submit" class="tp-cart-checkout-btn w-25"
                                                        onclick="applyCoupon()" type="submit">Apply</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="tp-cart-checkout-wrapper">

                        <div id="couponCalField">

                        </div>

                        <div class="tp-cart-checkout-proceed">
                            <a href="{{route('checkout')}}" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- cart area end -->

@endsection
