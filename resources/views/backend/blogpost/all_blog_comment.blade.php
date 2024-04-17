@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Comment</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Comment Table</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">

                <div class="btn-group">
                    <a href="{{ route('add.blog.post') }}" class="btn btn-dark">Add BlogPost</a>
                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Total Comment <span class="badge bg-danger">{{ count($comment) }}</span></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Post Title</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->post->post_title }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ Str::limit($item->message, 40) }}</td>
                                    <td>
                                        <a href="{{ route('blog.post.reply', $item->id) }}" class="btn btn-sm btn-success" title="Reply"><i class="fa-solid fa-reply"></i></a>

                                        {{-- <a href="{{ route('delete.blog.post', $item->id) }}" id="delete"
                                            class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Post Title</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
