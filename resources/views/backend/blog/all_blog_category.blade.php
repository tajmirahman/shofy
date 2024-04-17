@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

                <div class="btn-group">

                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">Add
                        Blog</button>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Total Blog <span class="badge bg-danger">{{ count($blog) }}</span></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Blog Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->blog_category_name }}</td>
                                    <td>

                                        <button type="submit" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        id="{{ $item->id }}" onclick="categoryEdit(this.id)"
                                            data-bs-target="#editModal"><i class="fa-regular fa-pen-to-square"></i></button>

                                        <a href="{{ route('delete.blog.category', $item->id) }}" id="delete"
                                            class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Blog Category Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add BlogCategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" action="{{ route('store.blog.category') }}" method="POST">

                        @csrf

                        <div class="row mb-3">
                            <div class="col-sm-12 text-secondary form-group">
                                <h6 class="mb-2">Blog Category Name</h6>
                                <input type="text" autocomplete="off" name="blog_category_name" required
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12 text-secondary">
                                <input type="submit" class="btn btn-inverse-primary px-3" value="Add BlogCategory" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit BlogCategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" action="{{ route('update.blog.category') }}" method="POST">

                        @csrf

                        <input type="hidden" name="cat_id" id="cat_id">

                        <div class="row mb-3">
                            <div class="col-sm-12 text-secondary form-group">
                                <h6 class="mb-2">Blog Category Name</h6>
                                <input type="text" id="cat" autocomplete="off" name="blog_category_name" required
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12 text-secondary">
                                <input type="submit" class="btn btn-inverse-primary px-3" value="Update BlogCategory" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->

    <script type="text/javascript">
        function categoryEdit(id) {
            $.ajax({
                type: 'GET',
                url: '/blog/category/' + id,
                dataType: 'json',

                success: function(data) {
                    //console.log(data)
                    $('#cat').val(data.blog_category_name);
                    $('#cat_id').val(data.id);
                }
            })
        }
    </script>
@endsection
