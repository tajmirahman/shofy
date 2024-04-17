@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Vendor</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor Table</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">

                <div class="btn-group">
                    <a href="{{ route('add.slider') }}" class="btn btn-dark">Add Slider</a>
                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Total Vendor <span class="badge bg-danger">{{ count($vendor) }}</span></h6>
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendor as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ !empty($item->photo) ? url('upload/vendor_images/' . $item->photo) : url('upload/no_image.jpg') }}"
                                            style="width: 60px;height: 60px;" alt="">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <span class="badge bg-gradient-quepal text-white shadow-sm">Active</span>
                                        @else
                                            <span class="badge bg-gradient-bloody text-white shadow-sm">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <a href="{{ route('inactive.vendor', $item->id) }}"
                                                class="btn btn-sm btn-success" title="Inactive"><i class="fa-regular fa-thumbs-down"></i></a>
                                        @else
                                            <a href="{{ route('active.vendor', $item->id) }}" class="btn btn-sm btn-success"
                                                title="active"><i class="fa-regular fa-thumbs-up"></i></i></a>
                                        @endif

                                        <a href="{{ route('delete.vendor', $item->id) }}" id="delete"
                                            class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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
