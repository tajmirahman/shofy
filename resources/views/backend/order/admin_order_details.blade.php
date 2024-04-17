@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <div class="row mt-4">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">

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

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">

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
                                            <span class="badge bg-dark">{{ $order->status }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th></th>
                                        <td>
                                            @if ($order->status == 'pending')
                                                <a href="{{url('confirm/order/'.$order->id)}}" class="btn btn-info px-3">Confirm Order</a>

                                            @elseif ($order->status == 'confirm')
                                            <a href="{{url('processing/order/'.$order->id)}}" class="btn btn-warning px-3">Processing</a>

                                            @elseif ($order->status == 'processing')
                                            <a href="{{url('deliver/order/'.$order->id)}}" class="btn btn-success px-3">Deliver</a>

                                            @endif
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">

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

                                    @foreach ($orderitem as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->product->product_image) }}" style="width:80px"
                                                    alt="">
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
                                                <span class="text-danger fw-bold">Tk {{ $item->qty * $item->price }}</span>
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

    </div>
@endsection
