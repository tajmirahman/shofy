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
                        <li class="breadcrumb-item active" aria-current="page">Deliver Order</li>
                    </ol>
                </nav>
            </div>
           
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Total Deliver Order <span class="badge bg-danger">{{ count($deliverorder) }}</span></h6>
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
                            @foreach ($deliverorder as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <span class="text-danger">{{ $item->invoice_no }}</span>
                                    </td>
                                    <td>{{ $item->order_date }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>Tk {{ $item->amount }}</td>
                                    <td>
                                        @if ($item->status == 'pending')
                                            <span class="badge bg-danger">{{ $item->status }}</span>
                                        @elseif ($item->status == 'confirm')
                                            <span class="badge bg-info">{{ $item->status }}</span>
                                        @elseif ($item->status == 'processing')
                                            <span class="badge bg-warning">{{ $item->status }}</span>
                                        @elseif ($item->status == 'deliver')
                                            <span class="badge bg-success">{{ $item->status }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ url('admin/order/details/' . $item->id) }}" class="btn btn-sm btn-dark"><i
                                                class="fa fa-eye"></i></a>

                                        <a href="{{ url('admin/order/invoice/' . $item->id) }}"
                                            class="btn btn-sm btn-danger"><i class="fa fa-download"></i></a>
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
