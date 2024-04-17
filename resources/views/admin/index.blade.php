@extends('admin.admin_dashboard')
@section('admin')

@php
    $date = date('y-m-d');
    $today = App\Models\Order::where('order_date',$date)->sum('amount');

    $month = date('F');
    $month = App\Models\Order::where('order_month',$month)->sum('amount');

    $year = date('Y');
    $year = App\Models\Order::where('order_year',$year)->sum('amount');

    $pending = App\Models\Order::where('status','pending')->get();
@endphp

    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Orders</p>
                                <h4 class="my-1 text-info">Tk {{$today}}</h4>
                                <p class="mb-0 font-13">For Ecommerce Shofy</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class='bx bxs-cart'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Monthly Order</p>
                                <h4 class="my-1 text-danger">Tk {{$month}}</h4>
                                <p class="mb-0 font-13">For Ecommerce Shofy</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i
                                    class='bx bxs-wallet'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Yearly Order</p>
                                <h4 class="my-1 text-success">Tk {{$year}}</h4>
                                <p class="mb-0 font-13">For Ecommerce Shofy</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                    class='bx bxs-bar-chart-alt-2'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Pending Order</p>
                                <h4 class="my-1 text-warning">{{count($pending)}}</h4>
                                <p class="mb-0 font-13">For Ecommerce Shofy</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                    class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

@php
    $pending = App\Models\Order::where('status','pending')->orderBy('id','ASC')->latest()->limit(10)->get();
@endphp
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Recent Orders</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                                class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Sl No</th>
                                <th>Invoice</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($pending as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td class="text-danger fw-bolder">{{$item->invoice_no}}</td>
                                <td>{{$item->order_date}}</td>
                                <td>Tk {{$item->amount}}</td>
                                <td>{{$item->payment_method}}</td>
                                <td><span class="badge bg-gradient-bloody text-white shadow-sm">{{$item->status}}</span></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end row-->

    </div>
@endsection
