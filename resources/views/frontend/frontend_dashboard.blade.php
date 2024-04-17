<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
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

    <script src="https://js.stripe.com/v3/"></script>
    
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
                                    stroke-linecap="round">
                                </circle>
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
    <div class="offcanvas__area offcanvas__radius">
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
                <div class="offcanvas__category pb-40">
                    <button class="tp-offcanvas-category-toggle">
                        <i class="fa-solid fa-bars"></i>
                        All Categories
                    </button>
                    <div class="tp-category-mobile-menu">

                    </div>
                </div>
                <div class="tp-main-menu-mobile fix d-lg-none mb-40"></div>

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
                <div class="offcanvas__btn">
                    <a href="{{route('login')}}" class="tp-btn-2 tp-btn-border-2">Login</a>
                </div>
            </div>
            <div class="offcanvas__bottom">
                <div class="offcanvas__footer d-flex align-items-center justify-content-between">
                    <div class="offcanvas__currency-wrapper currency">
                        <span class="offcanvas__currency-selected-currency tp-currency-toggle"
                            id="tp-offcanvas-currency-toggle">Currency : BDT</span>
                        <ul class="offcanvas__currency-list tp-currency-list">
                            <li>USD</li>
                        </ul>
                    </div>
                    <div class="offcanvas__select language">
                        <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                            <div class="offcanvas__lang-img mr-15">
                                <img src="{{ asset('frontend/assets/img/icon/language-flag.png') }}" alt="">
                            </div>
                            <div class="offcanvas__lang-wrapper">
                                <span class="offcanvas__lang-selected-lang tp-lang-toggle"
                                    id="tp-offcanvas-lang-toggle">Language</span>
                                <ul class="offcanvas__lang-list tp-lang-list">
                                    <li>Bangla</li>
                                    <li>English</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <!-- mobile menu area start -->
    <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-none">
        <div class="container">
            <div class="row row-cols-5">
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="javascript:;" class="tp-mobile-item-btn">
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
                {{-- <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="wishlist.html" class="tp-mobile-item-btn">
                            <i class="flaticon-love"></i>
                            <span>Wishlist</span>
                        </a>
                    </div>
                </div> --}}
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="{{route('login')}}" class="tp-mobile-item-btn">
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
    </div>
    <!-- mobile menu area end -->

    <!-- search area start -->
    <section class="tp-search-area">
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
    </section>
    <!-- search area end -->

    <!-- cart mini area start -->
    @include('frontend.body.cart')
    <!-- cart mini area end -->

    <!-- header area start -->
    @include('frontend.body.header')
    <!-- header-sticky-2 End  -->

    <main>

        @yield('main')

    </main>


    <!-- footer area start -->
    @include('frontend.body.footer')
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })


        /// details Add To Cart Prodcut 

        function addToCartDetails() {

            var product_name = $('#dpname').text();
            var id = $('#dproduct_id').val();
            var vendor = $('#vproduct_id').val();
            var color = $('#dcolor option:selected').text();
            var size = $('#dsize option:selected').text();
            var quantity = $('#dqty').val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor: vendor
                },
                url: "/dcart/data/store/" + id,
                success: function(data) {

                    miniCart();

                    // console.log(data)
                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  
                }
            })

        }
    </script>
    {{-- /// details End Add To Cart Product --}}

    {{-- // Mini Cart --}}
    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)

                    $('span[id="cartSubTotal"]').text(response.cartTotal);

                    $('#cartQty').text(response.cartQty);
                    $('#cartQty1').text(response.cartQty1);

                    var miniCart = ""

                    $.each(response.carts, function(key, value) {
                        miniCart +=

                            `<div class="cartmini__widget-item">

                            <div class="cartmini__thumb">

                                <a href="javascript:;">
                                    <img src="/${value.options.image}" alt="">
                                </a>

                            </div>

                            <div class="cartmini__content">
                                <h5 class="cartmini__title"><a href="javascript:;">${value.name}</a></h5>
                                <div class="cartmini__price-wrapper">
                                    <span class="cartmini__price">${value.price}</span>
                                    <span class="cartmini__quantity"> x ${value.qty}</span>
                                </div>
                            </div>

                            <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="cartmini__del"><i class="fa-regular fa-xmark"></i></a>

                        </div>`


                    });

                    $('#miniCart').html(miniCart);

                }

            })
        }

        miniCart();


        /// Mini Cart Remove Start 

        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product/remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();

                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  

                }



            })
        }

        /// Mini Cart Remove End 
    </script>

    {{-- <!--  // Start Load MY Cart // --> --}}

    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)

                    var rows = ""

                    $.each(response.carts, function(key, value) {
                        rows +=


                            `<tr>
                                <!-- img -->
                                <td class="tp-cart-img"><a href="javascript:;"> <img
                                            src="/${value.options.image}" alt=""></a>
                                </td>

                                <!-- title -->
                                <td class="tp-cart-title"><a href="javascript:;">${value.name}</a>
                                </td>

                                <!-- Color -->
                                <td class="tp-cart-price">

                                    ${value.options.color == null
                                        ? `<span>....</span>`
                                        : `<span>${value.options.color} </span>`
                                    }

                                </td>

                                <!-- Size -->
                                <td class="tp-cart-price">
                                    ${value.options.size == null
                                        ? `<span>....</span>`
                                        : `<span>${value.options.size} </span>`
                                    }
                                </td>

                                <!-- price -->
                                <td class="tp-cart-price">
                                    <span>Tk ${value.price}</span>
                                </td>

                                <!-- quantity -->
                                <td class="tp-cart-quantity">
                                    <div class="tp-product-quantity mt-10 mb-10">

                                        <a type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)">

                                            <span class="tp-cart-minus">
                                                <svg width="10" height="2" viewBox="0 0 10 2" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1H9" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>

                                        </a>
                                        
                                        <input class="tp-cart-input" type="text" value="${value.qty}" min="1">

                                        <a type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)">

                                            <span class="tp-cart-plus">
                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 1V9" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 5H9" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>

                                        </a>   
                                        
                                    </div>
                                </td>

                                <!-- SobTotal -->
                                <td class="tp-cart-price">
                                    <span>Tk ${value.subtotal}</span>
                                </td>

                                <!-- action -->
                                <td class="tp-cart-action">
                                    <a type="submit"  id="${value.rowId}" onclick="cartRemove(this.id)" class="tp-cart-action-btn">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                fill="currentColor" />
                                        </svg>
                                        <span>Remove</span>
                                    </a>
                                </td>
                            </tr>`

                    });

                    $('#cartPage').html(rows);

                }

            })
        }
        cart();

        // Cart Remove Start 
        function cartRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/cart-remove/" + id,

                success: function(data) {
                    cart();
                    miniCart();

                    couponCalculation();
                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  


                }
            })
        }
        // Cart Remove End 

        // Cart INCREMENT 

        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();

                }
            });
        }

        // Cart INCREMENT End 

        // Cart Decrement Start

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();

                }
            });
        }

        // Cart Decrement End 
    </script>
    {{-- <!--  // End Load MY Cart // --> --}}

    {{-- <!--  ////////////// Start Apply Coupon ////////////// --> --}}

    <script type="text/javascript">
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },

                url: "/coupon-apply",

                success: function(data) {

                    couponCalculation();

                    if (data.validity == true) {
                        $('#couponField').hide();
                    }


                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  


                }
            })
        }

        // Start CouponCalculation Method

        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "/coupon-calculation",
                dataType: 'json',
                success: function(data) {

                    if (data.total) {

                        $('#couponCalField').html(

                            `
                         <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="text-muted">Sub Total</span>
                            <span>Tk ${data.total}</span>

                        </div>

                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold">Tk ${data.total}</span>
                        </div>

                        `)

                    } else {
                        $('#couponCalField').html(
                            `
                            <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="text-muted">Sub Total</span>
                            <span>Tk ${data.subtotal}</span>

                        </div>

                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="text-muted">Coupon Name</span>
                            <span>${data.coupon_name}<a type="submit" onclick="couponRemove()"><i class="fa fa-trash ms-1 text-danger"></i> </a></span>
                        </div>

                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="text-muted">Discount Amount</span>
                            <span>Tk ${data.discount_amount}</span>
                        </div>

                        <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                            <span class="tp-cart-checkout-top-title fw-bold">Total</span>
                            <span class="tp-cart-checkout-top-price fw-bold">Tk${data.total_amount}</span>
                        </div>
                        
                        `
                        )
                    }

                }
            })
        }

        couponCalculation();
        //END CouponCalculation Method   
    </script>

    <!--  ////////////// End Apply Coupon ////////////// -->


    <script type="text/javascript">
        // Coupon Remove Start 

        function couponRemove() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/coupon-remove",

                success: function(data) {
                    couponCalculation();
                    $('#couponField').show();
                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  


                }
            })
        }
        // Coupon Remove End 
    </script>

    <!--  /// Start Wishlist Add -->
    <script type="text/javascript">
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,

                success: function(data) {

                    wishlist();

                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  


                }
            })
        }
    </script>
    <!--  /// End Wishlist Add -->

    <!--  /// Start Load Wishlist Data -->
    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-wishlist-product/",

                success: function(response) {

                    $('#wishQty').text(response.wishQty);
                    $('#wishQty1').text(response.wishQty1);

                    var rows = ""
                    $.each(response.wishlist, function(key, value) {

                        rows +=

                            `<tr>
                             <!-- img -->
                             <td class="tp-cart-img"><a href="javascript:;"> <img
                                      src="/${value.product.product_image}" alt=""></a></td>

                             <!-- title -->
                             <td class="tp-cart-title"><a href="javascript:;">${value.product.product_name}</a>
                             </td>

                            <!-- price -->
                            <td class="tp-cart-price">

                                ${value.product.discount_price == null
                                ? `<span>Tk ${value.product.selling_price}</span>`
                                :`<span>Tk ${value.product.discount_price}</span>`

                                }

                            </td>
                             
                             <!-- Status -->
                            <td class="tp-cart-price">

                                ${value.product.product_qty > 0 
                                ? `<span class="text-success mb-0"> In Stock </span>`

                                :`<span class="text-danger mb-0">Stock Out </span>`
                                } 

                            </td>

                             <!-- action -->
                             <td class="tp-cart-action">
                                <a type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" class="tp-cart-action-btn">
                                   <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" clip-rule="evenodd"
                                         d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                         fill="currentColor" />
                                   </svg>
                                   <span>Remove</span>
                                </a>
                             </td>
                          </tr>`



                    });

                    $('#wishlist').html(rows);

                }
            })
        }

        wishlist();

        // / End Load Wishlist Data -->

        // Wishlist Remove Start 

        function wishlistRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/wishlist-remove/" + id,

                success: function(data) {
                    wishlist();
                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  


                }
            })
        }

        // Wishlist Remove End
    </script>

    <script type="text/javascript">
        /// Start product view with Modal 

        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    // console.log(data)

                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(data.product.selling_price);
                    $('#pshort_des').text(data.product.short_descp);
                    $('#psubcategory').text(data.product.subcategory.subcategory_name);
                    // $('#pbrand').text(data.product.brand.brand_name);
                    $('#pimage').attr('src', '/' + data.product.product_image);
                    $('#pvendor_id').text(data.product.vendor_id);

                    $('#product_id').val(id);
                    $('#qty').val(1);


                    // Product Price 
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);

                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);
                    } // end else


                    /// Start Stock Option

                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('Stock In');

                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Stockout');
                    }
                    ///End Start Stock Option

                    ///Size 

                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value + ' ">' + value +
                            '  </option')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    }) // end size


                    ///Color 
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value + ' ">' + value +
                            '  </option')
                        if (data.color == "") {
                            $('#colorArea').hide();
                        } else {
                            $('#colorArea').show();
                        }
                    }) // end size

                }
            })
        }

        // End Product View With Modal 
    </script>

    <script type="text/javascript">
        /// Start Add To Cart Prodcut 

        function addToCart() {

            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var vendor = $('#pvendor_id').text();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor: vendor
                },
                url: "/cart/data/store/" + id,
                success: function(data) {

                    miniCart();
                    $('#closeModal').click();

                    // console.log(data)

                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  
                }
            })

        }

        /// End Add To Cart Product 
    </script>



</body>


</html>
