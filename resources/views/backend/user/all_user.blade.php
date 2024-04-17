@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Table</li>
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
        <h6 class="mb-0 text-uppercase">Total User <span class="badge bg-danger">{{ count($user) }}</span></h6>
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
                            @foreach ($user as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ !empty($item->photo) ? url('upload/user_images/' . $item->photo) : url('upload/no_image.jpg') }}"
                                            style="width: 60px;height: 60px;" alt="">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if ($item->UserOnline())
                                            <span class="badge badge-pill bg-success">Active Now </span>
                                        @else
                                            <span class="badge badge-pill bg-danger">
                                                {{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }} </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 'active')
                                            <a href="{{ route('inactive.user', $item->id) }}"
                                                class="btn btn-sm btn-success" title="Inactive"><i class="fa-regular fa-thumbs-down"></i></a>
                                        @else
                                            <a href="{{ route('active.user', $item->id) }}" class="btn btn-sm btn-success"
                                                title="active"><i class="fa-regular fa-thumbs-up"></i></i></a>
                                        @endif

                                        <a href="{{ route('delete.user', $item->id) }}" id="delete"
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
