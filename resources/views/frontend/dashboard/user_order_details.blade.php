@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    User Profile
@endsection

<!-- profile area start -->
<section class="pt-80 pb-80">
    <div class="container">

        <div class="row">

            <div class="col-xxl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Shipping Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>

                                    <tr>
                                        <th>Shipping Name</th>
                                        <td>{{ $order->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Shipping Email</th>
                                        <td>{{ $order->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Shipping Phone</th>
                                        <td>{{ $order->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Division</th>
                                        <td>{{ $order->division->division_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>District</th>
                                        <td>{{ $order->district->district_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>State</th>
                                        <td>{{ $order->state->state_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $order->address }}</td>
                                    </tr>

                                    <tr>
                                        <th>Zip Code</th>
                                        <td>{{ $order->post_code }}</td>
                                    </tr>

                                    <tr>
                                        <th>Order Date</th>
                                        <td>{{ $order->order_date }}</td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right --}}
            <div class="col-xxl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Details <span class="text-danger">({{ $order->invoice_no }})</span></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>

                                    <tr>
                                        <th>Shipping Name</th>
                                        <td>{{ $order->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Shipping Phone</th>
                                        <td>{{ $order->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Payment</th>
                                        <td>{{ $order->payment_method }}</td>
                                    </tr>

                                    <tr>
                                        <th>Transaction</th>
                                        <td>{{ $order->transaction_id }}</td>
                                    </tr>

                                    <tr>
                                        <th>Invoice_no</th>
                                        <td class="text-danger fw-bold">{{ $order->invoice_no }}</td>
                                    </tr>

                                    <tr>
                                        <th>Order Amount</th>
                                        <td class="text-danger fw-bolder">Tk {{ $order->amount }}</td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span class="badge bg-danger">{{ $order->status }}</span>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Right --}}

        </div>

        <div class="row pt-50">

            <div class="col-xxl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Product</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">

                                <thead>

                                    <tr>
                                        <th>Sl No</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Vendor Name</th>
                                        <th>Code</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Qty</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($orderItem as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->product->product_image) }}"
                                                    style="width:80px" alt="">
                                            </td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>
                                                @if ($item->vendor_id == null)
                                                    <span>Admin</span>
                                                @else
                                                    {{ $item->product->user->name }}
                                                @endif
                                            </td>
                                            <td>{{ $item->product->product_code }}</td>
                                            <td>
                                                @if ($item->color == null)
                                                    <span>...</span>
                                                @else
                                                    {{ $item->color }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->size == null)
                                                    <span>...</span>
                                                @else
                                                    {{ $item->size }}
                                                @endif
                                            </td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Tk {{ $item->price }}</td>
                                            <td>
                                                <span class="text-danger fw-bold">Tk
                                                    {{ $item->qty * $item->price }}</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row pt-40">
            <div class="col-12">
                @if ($order->status !== 'deliver')
                @else
                    @php
                        $order = App\Models\Order::where('id', $order->id)
                            ->where('return_reason', '=', null)
                            ->first();
                    @endphp
                    @if ($order)
                        <div class="card">
                            <div class="card-header">
                                <h3>Return Order</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('return.order', $order->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" name="return_reason" class="form-control">
                                        </div>
                                        <br>
                                        <div class="col-4 me-start">
                                            <button type="submit" class="btn btn-dark px-4 h-100">Return Order</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @else
                        <h4 class="text-danger">Product Already Return Request</h4>
                    @endif
                @endif
            </div>
        </div>

    </div>
</section>
<!-- profile area end -->
@endsection
