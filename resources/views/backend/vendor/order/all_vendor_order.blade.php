@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Vendor Order</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor Order Table</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">

                <div class="btn-group">
                    <a href="{{ route('add.product') }}" class="btn btn-dark">Add Product</a>
                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->
        {{-- <h6 class="mb-0 text-uppercase">Total Product <span class="badge bg-danger">{{ count($product) }}</span></h6> --}}
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Invoice</th>
                                <th>Order Date</th>
                                <th>Payment Type</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderitem as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{asset($item->product->product_image)}}" alt="" style="width: 60px">
                                    </td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>
                                        <span class="text-danger">{{ $item->order->invoice_no }}</span>
                                    </td>
                                    <td>{{ $item->order->order_date }}</td>
                                    <td>{{ $item->order->payment_method }}</td>
                                    <td>Tk {{ $item->order->amount }}</td>
                                    <td>
                                        @if ($item->order->status == 'pending')
                                            <span class="badge bg-danger">{{ $item->order->status }}</span>

                                        @elseif ($item->order->status == 'confirm')
                                            <span class="badge bg-info">{{ $item->order->status }}</span>

                                        @elseif ($item->order->status == 'processing')
                                            <span class="badge bg-warning">{{ $item->order->status }}</span>

                                        @elseif ($item->order->status == 'deliver')
                                            <span class="badge bg-success">{{ $item->order->status }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('vendor.order.details',$item->id) }}" class="btn btn-sm btn-dark"><i
                                                class="fa fa-eye"></i></a>

                                        {{-- <a href="{{ route('delete.product', $item->id) }}" id="delete"
                                            class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Invoice</th>
                                <th>Order Date</th>
                                <th>Payment Type</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
