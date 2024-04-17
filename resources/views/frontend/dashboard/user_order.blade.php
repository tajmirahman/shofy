@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    User Profile
@endsection

<!-- profile area start -->
<section class="profile__area pt-120 pb-120">
    <div class="container">
        <div class="profile__inner p-relative">
            <div class="profile__shape">
                <img class="profile__shape-1" src="{{ asset('frontend/assets/img/login/laptop.png') }}" alt="">
                <img class="profile__shape-2" src="{{ asset('frontend/assets/img/login/man.png') }}" alt="">
                <img class="profile__shape-3" src="{{ asset('frontend/assets/img/login/shape-1.png') }}" alt="">
                <img class="profile__shape-4" src="{{ asset('frontend/assets/img/login/shape-2.png') }}" alt="">
                <img class="profile__shape-5" src="{{ asset('frontend/assets/img/login/shape-3.png') }}" alt="">
                <img class="profile__shape-6" src="{{ asset('frontend/assets/img/login/shape-4.png') }}" alt="">
            </div>

            <div class="row">

                {{-- DashBoard SideBar --}}
                @include('frontend.body.dashboard_side')
                {{-- DashBoard SideBar --}}

                {{-- Main Body --}}
                <div class="col-xxl-8 col-lg-8">
                    <div class="profile__tab-content">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="fw-bold">
                                    <tr>
                                        <th scope="col">Sl No</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Payment Type</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $key => $order)
                                        <tr>
                                            <th>{{ $key + 1 }}</th>
                                            <th class="text-danger">{{ $order->invoice_no }}</th>
                                            <th>{{ $order->order_date }}</th>
                                            <th>{{ $order->payment_method }}</th>
                                            <th>Tk {{ $order->amount }}</th>
                                            <th>
                                                @if ($order->status == 'pending')
                                                    <span class="badge bg-danger">{{ $order->status }}</span>
                                                @elseif ($order->status == 'confirm')
                                                    <span class="badge bg-info">{{ $order->status }}</span>
                                                @elseif ($order->status == 'processing')
                                                    <span class="badge bg-warning">{{ $order->status }}</span>
                                                @elseif ($order->status == 'deliver')
                                                    <span class="badge bg-success">{{ $order->status }}</span>
                                                    @if ($order->return_order == 1)
                                                        <span class="badge bg-danger">Return Request</span>
                                                    @endif
                                                @endif
                                            </th>
                                            <th>

                                                <a href="{{ url('user/user-details/' . $order->id) }}" title="View"
                                                    class="btn btn-dark"><i class="fa-solid fa-eye"></i></a>

                                                <a href="{{ url('user/order_invoice/' . $order->id) }}" title="DownLoad" class="btn btn-warning"><i
                                                        class="fa-solid fa-download"></i></a>

                                            </th>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                {{-- Main Body --}}

            </div>
        </div>
    </div>
</section>
<!-- profile area end -->
@endsection
