@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    CheckOut
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-70 pb-50" data-bg-color="#EFF1F5">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Checkout</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- checkout area start -->
<section class="pb-120" data-bg-color="#EFF1F5">
    <div class="container">
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-lg-7">
                    <div class="tp-checkout-place white-bg">
                        <h3 class="tp-checkout-bill-title">Billing Details</h3>

                        <div class="row mb-2">

                            <div class="col-lg-6">
                                <label for="form-label" class="mb-1">Name</label>
                                <input type="text" required name="shipping_name" value="{{ Auth::user()->name }}"
                                    class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <label for="form-label" class="mb-1">Email</label>
                                <input type="email" required name="shipping_email" value="{{ Auth::user()->email }}"
                                    class="form-control">
                            </div>

                        </div>

                        <div class="row mb-2">

                            <div class="col-lg-6">
                                <label for="form-label" class="mb-1">Phone</label>
                                <input type="text" required name="shipping_phone" value="{{ Auth::user()->phone }}"
                                    class="form-control">
                            </div>

                            <div class="col-lg-6">
                                <label for="form-label" class="mb-1">Zip Code</label>
                                <input type="text" name="post_code" class="form-control">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 mb-2">
                                <label for="form-label" class="mb-1">Division</label>

                                <select required name="division_id" id="" class="form-select">
                                    <option selected disabled>Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-lg-6 mb-2">

                                <label for="form-label" class="mb-1">District</label>
                                <select required name="district_id" id="" class="form-select">
                                </select>

                            </div>

                            <div class="col-lg-6 mb-2">

                                <label for="form-label" class="mb-1">State</label>
                                <select required name="state_id" id="" class="form-select">
                                </select>

                            </div>

                            <div class="col-lg-12 mb-2">
                                <label for="form-label" class="mb-1">Address</label>
                                <input type="text" required name="shipping_address" value="{{ Auth::user()->address }}"
                                    class="form-control">
                            </div>

                            <div class="col-lg-12 tp-checkout-input">

                                <label class="mb-1">Order notes (optional)</label>
                                <textarea name="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <!-- checkout place order -->
                    <div class="tp-checkout-place white-bg">
                        <h3 class="tp-checkout-place-title">Your Order</h3>

                        <div class="tp-order-info-list">
                            <ul>

                                <!-- header -->
                                <li class="tp-order-info-list-header">
                                    <h4 class="fw-bold">Product</h4>
                                    <h4 class="fw-bold">Total</h4>
                                </li>

                                <!-- item list -->

                                @foreach ($carts as $item)
                                    <li class="tp-order-info-list-desc">
                                        <img src="{{ asset($item->options->image) }}" style="width: 70px; height: 70px;"
                                            class="me-1" alt="">
                                        <p>{{ $item->name }}<span> x {{ $item->qty }}</span></p>
                                        <span>Tk {{ $item->price }}</span>
                                    </li>
                                @endforeach


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
                                        <span class="text-black">Tk
                                            {{ session()->get('coupon')['discount_amount'] }}</span>
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

                        <hr>

                        <div class="tp-checkout-payment">

                            <div class="tp-checkout-payment-item">

                                <input type="radio" id="back_transfer" checked name="payment_option"
                                    value="stripe">

                                <label for="back_transfer">Stripe Payment</label>

                            </div>

                            <div class="tp-checkout-payment-item">

                                <input type="radio" id="cheque_payment" name="payment_option" value="cash">

                                <label for="cheque_payment">Cash On Delivery</label>

                            </div>

                            <div class="tp-checkout-payment-item">

                                <input type="radio" id="cod" name="payment_option" value="card">

                                <label for="cod">SSL COMMERZ</label>

                            </div>


                        </div>

                        <div class="tp-checkout-btn-wrapper">
                            <button type="submit" class="tp-checkout-btn w-100">Place Order</button>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
<!-- checkout area end -->

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').html('');
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .district_name + '</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });
    });


    // Show State Data 

    $(document).ready(function() {
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                // function district() {
                    $.ajax({
                        url: "{{ url('/state-get/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="state_id"]').html('');
                            var d = $('select[name="state_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="state_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .state_name + '</option>');
                            });
                        },

                    });
                // }
            } else {
                alert('danger');
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

@endsection
