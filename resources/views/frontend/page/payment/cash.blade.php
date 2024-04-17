@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Cash On Delivery
@endsection



<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-70 pb-50" data-bg-color="#EFF1F5">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Payment</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <span>Cash On Delivery</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- checkout area start -->
<section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
    <div class="container">

        <div class="row">

            <div class="col-lg-6">
                <!-- checkout place order -->
                <div class="tp-checkout-place white-bg">
                    <h3 class="tp-checkout-place-title">Final Order</h3>

                    <div class="tp-order-info-list">
                        <ul>

                            <!-- header -->
                            <li class="tp-order-info-list-header">
                                <h4 class="fw-bold">Description</h4>
                                <h4 class="fw-bold">Total</h4>
                            </li>


                            @if (Session::has('coupon'))
                                <!-- subtotal -->
                                <li class="tp-order-info-list-subtotal">
                                    <span class="text-muted">Subtotal</span>
                                    <span class="text-black">Tk {{ $cartTotal }}</span>
                                </li>

                                <!-- Coupon Name -->
                                <li class="tp-order-info-list-subtotal">
                                    <span class="text-muted">Coupon Name</span>
                                    <span class="text-black">{{ session()->get('coupon')['coupon_name'] }}
                                        ({{ session()->get('coupon')['coupon_discount'] }}%)</span>
                                </li>

                                <!-- Coupon Discount -->
                                <li class="tp-order-info-list-subtotal">
                                    <span class="text-muted">Coupon Discount</span>
                                    <span class="text-black">Tk {{ session()->get('coupon')['discount_amount'] }}</span>
                                </li>

                                <!-- total -->
                                <li class="tp-order-info-list-total">
                                    <span>Total</span>
                                    <span class="fw-bold text-danger">Tk
                                        {{ session()->get('coupon')['total_amount'] }}</span>
                                </li>
                            @else
                                <!-- total -->
                                <li class="tp-order-info-list-total">
                                    <span>Total</span>
                                    <span class="fw-bold text-danger">Tk {{ $cartTotal }}</span>
                                </li>
                            @endif



                        </ul>

                    </div>


                </div>
            </div>

            <div class="col-lg-6">

                <!-- checkout place order -->
                <div class="tp-checkout-place white-bg">
                    <h3 class="tp-checkout-place-title">Cash On Delivery</h3>

                    <div class="tp-order-info-list">

                        <form action="{{route('cash.order')}}" method="post">
                            @csrf

                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                            <input type="hidden" name="address" value="{{ $data['shipping_address'] }}">
                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">

                            <button class="btn btn-primary">Submit Payment</button>
                        </form>

                    </div>

                </div>


            </div>

        </div>

    </div>
</section>
<!-- checkout area end -->



@endsection
