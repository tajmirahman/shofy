@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    User Profile
@endsection

<!-- profile area start -->
<section class="profile__area pt-120 pb-120">
    <div class="container">
        <div class="profile__inner p-relative">
            <div class="profile__shape">
                <img class="profile__shape-1" src="{{ asset('frontend/assets/img/login/laptop.png') }}" alt="">
                <img class="profile__shape-2" src="{{ asset('frontend/assets/img/login/man.png') }}" alt="">
                <img class="profile__shape-3" src="{{ asset('frontend/assets/img/login/shape-1.png') }}" alt="">
                <img class="profile__shape-4" src="{{ asset('frontend/assets/img/login/shape-2.png') }}" alt="">
                <img class="profile__shape-5" src="{{ asset('frontend/assets/img/login/shape-3.png') }}" alt="">
                <img class="profile__shape-6" src="{{ asset('frontend/assets/img/login/shape-4.png') }}" alt="">
            </div>

            <div class="row">

                {{-- DashBoard SideBar --}}
                @include('frontend.body.dashboard_side')
                {{-- DashBoard SideBar --}}

                {{-- Main Body --}}
                <div class="col-xxl-8 col-lg-8">
                    <div class="profile__tab-content">
                        <div class="tab-content" id="profile-tabContent">

                            <div class="" id="nav-information">
                                <div class="profile__info">
                                    <h3 class="profile__info-title">Track Order</h3>
                                    <div class="profile__info-content">

                                        <form action="{{route('order.tracking')}}" method="POST" enctype="multipart/form-data">

                                            @csrf

                                            <div class="row gy-3">

                                                <div class="col-xxl-12 col-md-12">
                                                    <input type="text" name="code" autocomplete="off" placeholder="Enter Invoice No">
                                                </div>
                                                
                                                <div class="col-xxl-12 mt-4">
                                                    <div class="profile__btn">
                                                        <button type="submit" class="tp-btn">Search</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- Main Body --}}

            </div>
        </div>
    </div>
</section>
<!-- profile area end -->
@endsection
