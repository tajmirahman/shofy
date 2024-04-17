@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Track Order
@endsection

<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #678E61
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #678E61;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: #678E61;
        border-color: #678E61;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #678E61;
        border-color: #678E61;
        border-radius: 1px
    }
</style>

<section class="pt-80 pb-80">
    <div class="container">
        <article class="card shadow p-4">
            <header class="card-header"> My Orders / Tracking </header>
            <div class="card-body">

                @php
                    $div = $track->division->division_name;
                    $dis = $track->district->district_name;
                    $state = $track->state->state_name;
                @endphp

                <h6>Order ID: <span class="text-danger fw-bold">{{ $track->invoice_no }}</span></h6>

                <h6>Name: <span class="fw-bold text-muted">{{ $track->name }}</span></h6>
                <h6>Phone: <span class="fw-bold text-muted">{{ $track->phone }}</span></h6>
                <h6>Address: <span
                        class="fw-bold text-muted">{{ $track->address }},{{ $state }},{{ $dis }},{{ $div }}</span>
                </h6>

                <hr>

                <br>

                <article class="card">
                    <div class="card-body row">

                        <div class="col"> <strong>Order Time:</strong> <br>{{ $track->order_date }}</div>

                        <div class="col"> <strong>Confirm Order:</strong> <br>{{ $track->confirmed_date }}</div>

                        <div class="col"> <strong>Processing Order:</strong> <br> {{ $track->processing_date }}
                        </div>

                        <div class="col"> <strong>Deliver Order:</strong> <br> {{ $track->delivered_date }} </div>

                    </div>
                </article>
                <div class="track">

                    @if ($track->status == 'pending')
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                class="text">Order confirmed</span> </div>

                        <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span
                                class="text"> Picked by courier</span> </div>

                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                class="text"> On the way </span> </div>

                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                class="text">Ready for pickup</span> </div>
                    @elseif ($track->status == 'confirm')
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                class="text">Order confirmed</span> </div>

                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span
                                class="text"> Picked by courier</span> </div>

                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                class="text"> On the way </span> </div>

                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                class="text">Ready for pickup</span> </div>
                    @elseif ($track->status == 'processing')
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                class="text">Order confirmed</span> </div>

                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span
                                class="text"> Picked by courier</span> </div>

                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                class="text"> On the way </span> </div>

                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                class="text">Ready for pickup</span> </div>
                    @elseif ($track->status == 'deliver')
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                class="text">Order confirmed</span> </div>

                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span
                                class="text"> Picked by courier</span> </div>

                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                class="text"> On the way </span> </div>

                        <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                class="text">Ready for pickup</span> </div>
                    @endif


                </div>
                <hr>

                <a href="{{ route('user.track.order') }}" class="btn btn-dark" data-abc="true">Back to
                    Order</a>
            </div>
        </article>
    </div>
</section>

@endsection
