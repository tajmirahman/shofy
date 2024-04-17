@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Order</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Return Order Table</li>
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
                                <th>Invoice</th>
                                <th>Order Date</th>
                                <th>Payment Type</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <span class="text-danger">{{ $item->invoice_no }}</span>
                                    </td>
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>Tk {{ $item->amount }}</td>
                                    <td>
                                        @if ($item->return_order == 0)
                                            <span class="badge bg-dark">No Return</span>
                                        @elseif ($item->return_order == 1)
                                            <span class="badge bg-danger">Return Request</span>
                                            @elseif ($item->return_order == 2)
                                            <span class="badge bg-success">Return Approve</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a title="View" href="{{ url('admin/order/details/' . $item->id) }}" class="btn btn-sm btn-dark"><i
                                                class="fa fa-eye"></i></a>

                                        @if ($item->return_order == 2)
                                            
                                        @else
                                        <a title="Accpet" href="{{ route('admin.accept.order', $item->id) }}"
                                            class="btn btn-sm btn-success"><i class="fa-solid fa-check"></i></a> 
                                        @endif
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
