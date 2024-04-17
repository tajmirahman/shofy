@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Review</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Review Table</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Total Review <span class="badge bg-danger">{{ count($reviews) }}</span></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Product Name</th>
                                <th>Comment</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>{{ Str::limit($item->comment, 40) }}</td>

                                    <td>
                                        @if ($item->rating == 1)
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                        @elseif ($item->rating == 2)
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                        @elseif ($item->rating == 3)
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                        @elseif ($item->rating == 3.5)
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                        @elseif ($item->rating == 4)
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-secondary"></i>
                                        @elseif ($item->rating == 4.5)
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                        @elseif ($item->rating == 5)
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('blog.post.reply', $item->id) }}" class="btn btn-sm btn-success" title="Reply"><i class="fa-solid fa-reply"></i></a> --}}

                                        @if ($item->status == 1)
                                            <a title="Inactive" href="{{ route('inactive.review', $item->id) }}"
                                                class="btn btn-sm btn-success"><i class="fa-regular fa-thumbs-down"></i></a>
                                        @else
                                            <a href="{{ route('active.review', $item->id) }}" title="active"
                                                class="btn btn-sm btn-danger"><i class="fa-regular fa-thumbs-up"></i></a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Product Name</th>
                                <th>Comment</th>
                                <th>Rating</th>
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
