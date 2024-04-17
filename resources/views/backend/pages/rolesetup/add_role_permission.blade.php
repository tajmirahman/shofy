@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Role In Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Role In Permission</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form id="myForm" action="{{ route('store.roles.permission') }}" method="POST">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-sm-12 text-secondary required form-group">
                                            <h6 class="mb-2">Role Name</h6>
                                            <select
                                                class="form-select form-select-sm @error('name') is-invalid @enderror"
                                                aria-label=".form-select-sm example" name="role_id">
                                                <option selected disabled>Select Role Name</option>

                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach

                                            </select>

                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">

                                            <div class="form-check">

                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkDefaultmain">

                                                <label class="form-check-label" for="checkDefaultmain">All
                                                    Permission</label>

                                            </div>


                                        </div>
                                    </div>

                                    <hr>

                                    @foreach ($permission_groups as $group)
                                        <div class="row">

                                            <div class="col-3">

                                                <div class="form-check">

                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">

                                                    <label class="form-check-label"
                                                        for="flexCheckDefault">{{ $group->group_name }}</label>

                                                </div>

                                            </div>

                                            <div class="col-9">

                                                @php
                                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                                @endphp


                                                @foreach ($permissions as $permission)
                                                    <div class="form-check">

           <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="flexCheckDefault {{ $permission->id }}">

            <label class="form-check-label" for="flexCheckDefault{{ $permission->id }}">{{ $permission->name }}</label>

                                                    </div>
                                                @endforeach
                                                <br>

                                            </div>

                                        </div>
                                    @endforeach

                                    <div class="row mt-4">
                                        <div class="col-sm-12 text-secondary">
                                            <input type="submit" class="btn btn-inverse-primary px-3"
                                                value="Add Role In Permission" />
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Show Image --}}
    <script type="text/javascript">
        $('#checkDefaultmain').click(function() {

            if ($(this).is(':checked')) {
                $('input[ type= checkbox]').prop('checked', true);
            } else {
                $('input[ type= checkbox]').prop('checked', false);
            }

        });
    </script>

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    role_id: {
                        required: true,
                    },
                },
                messages: {
                    role_id: {
                        required: 'Please Enter Role Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
