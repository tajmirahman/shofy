<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shofy | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/logo/favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon_shofy.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">

    {{-- Toaster --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>

    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <!-- loading content here -->
                <div class="tp-preloader-content">
                    <div class="tp-preloader-logo">
                        <div class="tp-preloader-circle">
                            <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                            </svg>
                        </div>
                        <img src="{{ asset('frontend/assets/img/logo/preloader/preloader-icon.svg') }}" alt="">
                    </div>
                    <h3 class="tp-preloader-title">Shofy</h3>
                    <p class="tp-preloader-subtitle">Loading</p>
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->

    <!-- offcanvas area start -->
    {{-- <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn offcanvas-close-btn">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo logo">
                        <a href="index.html">
                            <img src="{{ asset('frontend/assets/img/logo/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                </div>

                <div class="tp-main-menu-mobile fix mb-40"></div>

                <div class="offcanvas__contact align-items-center d-none">
                    <div class="offcanvas__contact-icon mr-20">
                        <span>
                            <img src="{{ asset('frontend/assets/img/icon/contact.png') }}" alt="">
                        </span>
                    </div>
                    <div class="offcanvas__contact-content">
                        <h3 class="offcanvas__contact-title">
                            <a href="tel:098-852-987">004524865</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="offcanvas__bottom">
                <div class="offcanvas__footer d-flex align-items-center justify-content-between">
                    <div class="offcanvas__currency-wrapper currency">
                        <span class="offcanvas__currency-selected-currency tp-currency-toggle"
                            id="tp-offcanvas-currency-toggle">Currency : USD</span>
                        <ul class="offcanvas__currency-list tp-currency-list">
                            <li>USD</li>
                            <li>ERU</li>
                            <li>BDT </li>
                            <li>INR</li>
                        </ul>
                    </div>
                    <div class="offcanvas__select language">
                        <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                            <div class="offcanvas__lang-img mr-15">
                                <img src="{{ asset('frontend/assets/img/icon/language-flag.png') }}" alt="">
                            </div>
                            <div class="offcanvas__lang-wrapper">
                                <span class="offcanvas__lang-selected-lang tp-lang-toggle"
                                    id="tp-offcanvas-lang-toggle">English</span>
                                <ul class="offcanvas__lang-list tp-lang-list">
                                    <li>Spanish</li>
                                    <li>Portugese</li>
                                    <li>American</li>
                                    <li>Canada</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div> --}}
    <!-- offcanvas area end -->

    <!-- mobile menu area start -->
    {{-- <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
        <div class="container">
            <div class="row row-cols-5">
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="shop.html" class="tp-mobile-item-btn">
                            <i class="flaticon-store"></i>
                            <span>Store</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-search-open-btn">
                            <i class="flaticon-search-1"></i>
                            <span>Search</span>
                        </button>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="wishlist.html" class="tp-mobile-item-btn">
                            <i class="flaticon-love"></i>
                            <span>Wishlist</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="profile.html" class="tp-mobile-item-btn">
                            <i class="flaticon-user"></i>
                            <span>Account</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                            <i class="flaticon-menu-1"></i>
                            <span>Menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- mobile menu area end -->

    <!-- search area start -->
    {{-- <section class="tp-search-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-search-form">
                        <div class="tp-search-close text-center mb-20">
                            <button class="tp-search-close-btn tp-search-close-btn"></button>
                        </div>
                        <form action="#">
                            <div class="tp-search-input mb-10">
                                <input type="text" placeholder="Search for product...">
                                <button type="submit"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="tp-search-category">
                                <span>Search by : </span>
                                <a href="#">Men, </a>
                                <a href="#">Women, </a>
                                <a href="#">Children, </a>
                                <a href="#">Shirt, </a>
                                <a href="#">Demin</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- search area end -->

    <!-- header area start -->
    {{-- <header>
        <div class="tp-header-area tp-header-style-primary tp-header-height">
            <!-- header bottom start -->
            <div id="header-sticky" class="tp-header-bottom-2 tp-header-sticky">
                <div class="container">
                    <div class="tp-mega-menu-wrapper p-relative">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-5 col-md-5 col-sm-4 col-6">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="{{ asset('frontend/assets/img/logo/logo.svg') }}" alt="logo">
                                    </a>
                                </div>
                            </div>

                            <div class="col-xl-5 d-none d-xl-block">
                                <div class="main-menu menu-style-2">
                                    <nav class="tp-main-menu-content">
                                        <ul>
                                            <li><a href="coupon.html">Home</a></li>
                                            <li><a href="coupon.html">About</a></li>
                                            <li class="has-dropdown">
                                                <a href="blog.html">Blog</a>
                                                <ul class="tp-submenu">
                                                    <li><a href="blog.html">Blog Standard</a></li>
                                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                                    <li><a href="blog-list.html">Blog List</a></li>
                                                    <li><a href="blog-details-2.html">Blog Details Full Width</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-7 col-md-7 col-sm-8 col-6">
                                <div
                                    class="tp-header-bottom-right d-flex align-items-center justify-content-end pl-30">
                                    <div class="tp-header-search-2 d-none d-sm-block">
                                        <form action="#">
                                            <input type="text" placeholder="Search for Products...">
                                            <button type="submit">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M18.9999 19L14.6499 14.65" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="tp-header-action d-flex align-items-center ml-30">



                                        <div class="tp-header-action-item tp-header-hamburger mr-20 d-xl-none">
                                            <button type="button" class="tp-offcanvas-open-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16"
                                                    viewBox="0 0 30 16">
                                                    <rect x="10" width="20" height="2" fill="currentColor" />
                                                    <rect x="5" y="7" width="25" height="2"
                                                        fill="currentColor" />
                                                    <rect x="10" y="14" width="20" height="2"
                                                        fill="currentColor" />
                                                </svg>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> --}}
    <!-- header area end -->

    <main>

        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg text-center pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">User Account</h3>
                            <div class="breadcrumb__list">
                                <span><a href="{{ route('index') }}">Home</a></span>
                                <span>Account</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- login area start -->
        <section class="tp-login-area pb-140 p-relative z-index-1 fix">

            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-lg-6">
                        <div class="tp-login-wrapper">
                            <div class="tp-login-top text-center mb-30">
                                <h3 class="tp-login-title">Login to Shofy.</h3>
                                <p>Don’t have an account? <span><a href="{{route('login')}}">Create a free account</a></span></p>
                            </div>

                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="tp-login-option">

                                    <div class="tp-login-input-wrapper">

                                        <div class="tp-login-input-box">
                                            <div class="tp-login-input">
                                                <input id="login" name="login" autocomplete="off"
                                                    class="@error('login') is-invalid @enderror" required type="text"
                                                    placeholder="example@mail.com">

                                                @error('login')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="tp-login-input-title">
                                                <label for="login">Email Or Phone</label>
                                            </div>
                                        </div>

                                        <div class="tp-login-input-box">

                                            <div class="tp-login-input">
                                                <input id="password" required name="password" autocomplete="off"
                                                    type="password" placeholder="******">
                                            </div>

                                            <div class="tp-login-input-title">
                                                <label for="password">Password</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div
                                        class="tp-login-suggetions d-sm-flex align-items-center justify-content-between mb-20">

                                        <div class="tp-login-remeber">
                                            <input id="remember_me" name="remember" type="checkbox">
                                            <label for="remember_me">Remember me</label>
                                        </div>

                                        <div class="tp-login-forgot">
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                        </div>

                                    </div>

                                    <div class="tp-login-bottom">
                                        <button type="submit" class="tp-login-btn w-100">Login</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="tp-login-wrapper">
                            <div class="tp-login-top text-center mb-30">
                                <h3 class="tp-login-title">Sign Up Shofy.</h3>
                                <p>Already have an account? <span><a href="{{route('login')}}">Sign In</a></span></p>
                            </div>
                            <form action="{{route('register')}}" method="POST">
                                @csrf
                                <div class="tp-login-option">
                                    <div
                                        class="tp-login-social mb-10 d-flex flex-wrap align-items-center justify-content-center">
                                        <div class="tp-login-option-item has-google">
                                            <a href="{{url('authorized/google')}}">
                                                <img src="{{asset('frontend/assets/img/icon/login/google.svg')}}" alt="">
                                                Sign up with google
                                            </a>
                                        </div>
                                        <div class="tp-login-option-item">
                                            <a href="#" title="gitHub">
                                                <i class="fa-brands fa-github fs-3"></i>
                                            </a>
                                        </div>
                                        
                                    </div>
                                    <div class="tp-login-mail text-center mb-40">
                                        <p>or Sign up with <a href="#">Email</a></p>
                                    </div>
                                    <div class="tp-login-input-wrapper">

                                        <div class="tp-login-input-box">

                                            <div class="tp-login-input">
                                                <input id="name" class="@error('name') is-invalid @enderror" autocomplete="off" name="name" type="text" placeholder="Enter Name">

                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="tp-login-input-title">
                                                <label for="name">Your Name</label>
                                            </div>

                                        </div>
                                        <div class="tp-login-input-box">
                                            
                                            <div class="tp-login-input">
                                                <input id="email" class="@error('email') is-invalid @enderror" name="email" type="email" autocomplete="off" placeholder="example@mail.com">

                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="tp-login-input-title">
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="tp-login-input-box">

                                            <div class="tp-login-input">
                                                <input id="password" class="@error('password') is-invalid @enderror" name="password" type="password" placeholder="*****">

                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            

                                            <div class="tp-login-input-title">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>

                                        <div class="tp-login-input-box">

                                            <div class="tp-login-input">
                                                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="*****">
                                            </div>

                                            

                                            <div class="tp-login-input-title">
                                                <label for="password_confirmation">Confirm Password</label>
                                            </div>
                                        </div>

                                    </div>
    
                                    <div class="tp-login-bottom">
                                        <button type="submit" class="tp-login-btn w-100">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- login area end -->


    </main>


    <!-- footer area start -->
    {{-- @include('frontend.body.footer') --}}
    <!-- footer area end -->

    <!-- JS here -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/meanmenu.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/range-slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/countdown.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    {{-- Toaster --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
</body>

</html>
