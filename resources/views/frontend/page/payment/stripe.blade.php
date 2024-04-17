@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Stripe Payment
@endsection

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-70 pb-50" data-bg-color="#EFF1F5">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Payment</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <span>Stripe Payment</span>
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
                    <h3 class="tp-checkout-place-title">Stripe Payment</h3>

                    <div class="tp-order-info-list">

                        <form action="{{route('stripe.order')}}" method="post" id="payment-form">
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


                            <div class="form-row">
                                <label for="card-element">
                                    Credit or debit card
                                </label>

                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <br>
                            <button class="btn btn-primary">Submit Payment</button>
                        </form>

                    </div>

                </div>


            </div>

        </div>

    </div>
</section>
<!-- checkout area end -->

<script type="text/javascript">
    // Create a Stripe client.
    //Publish key
    var stripe = Stripe(
            'pk_test_51O0b5ECkIrncx4nxXvz5G5O0J54Tnax7LZyYCTsPcMIXc4EZupjm5USxSAkry13jXvco0tVIS2GB5gFiIKBW5d1g00t9sjBsNJ'
            );
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>

@endsection
