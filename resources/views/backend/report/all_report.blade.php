@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ecommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ecommerce Report</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Today Report</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('search-by-date') }}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="form-label">Date</label>
                                            <input type="date" name="date" class="form-control mt-2">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-inverse-primary px-3">Search</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Monthly Report</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('search-by-month') }}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="form-label" class="mb-2">Month</label>
                                            <select name="month" id="" class="form-select">
                                                <option selected disabled>Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="form-label" class="mb-2">Year</label>
                                            <select name="year_name" id="" class="form-select">
                                                <option selected disabled>Select Year</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-inverse-primary px-3">Search</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Yearly Report</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('search-by-year') }}" method="post">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="form-label" class="mb-2">Year</label>
                                            <select name="year" id="" class="form-select">
                                                <option selected disabled>Select Year</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-inverse-primary px-3">Search</button>
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
@endsection
