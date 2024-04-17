@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Order Confirm
@endsection

<!-- order area start -->
<section class="tp-order-area pt-100 pb-100">
    <div class="container">
        <div class="tp-order-inner">
            <div class="row gx-0">
                <div class="col-lg-12">
                    <div class="tp-order-details" data-bg-color="#4F3D97">
                        <div class="tp-order-details-top text-center mb-70">
                            <div class="tp-order-details-icon">
                                <span>
                                    <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M46 26V51H6V26" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M51 13.5H1V26H51V13.5Z" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M26 51V13.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M26 13.5H14.75C13.0924 13.5 11.5027 12.8415 10.3306 11.6694C9.15848 10.4973 8.5 8.9076 8.5 7.25C8.5 5.5924 9.15848 4.00269 10.3306 2.83058C11.5027 1.65848 13.0924 1 14.75 1C23.5 1 26 13.5 26 13.5Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M26 13.5H37.25C38.9076 13.5 40.4973 12.8415 41.6694 11.6694C42.8415 10.4973 43.5 8.9076 43.5 7.25C43.5 5.5924 42.8415 4.00269 41.6694 2.83058C40.4973 1.65848 38.9076 1 37.25 1C28.5 1 26 13.5 26 13.5Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="tp-order-details-content">
                                <h3 class="tp-order-details-title">Thank For Your Order</h3>
                                <p>We will send you a shipping confirmation email as soon <br> as your order
                                    ships</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- order area end -->
@endsection
