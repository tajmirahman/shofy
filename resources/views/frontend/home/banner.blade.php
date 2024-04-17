@php
    $banners = App\Models\Banner::orderBy('id', 'ASC')
        ->latest()
        ->get();
@endphp
<div class="tp-product-banner-area pb-90">
    <div class="container">
       <div class="tp-product-banner-slider fix">
          <div class="tp-product-banner-slider-active swiper-container">
             <div class="swiper-wrapper">

                @foreach ($banners as $banner)
                <div class="tp-product-banner-inner theme-bg p-relative z-index-1 fix swiper-slide">
                    <h4 class="tp-product-banner-bg-text">Tablet</h4>
                    <div class="row align-items-center">
                       <div class="col-xl-6 col-lg-6">
                          <div class="tp-product-banner-content p-relative z-index-1">
                             <span class="tp-product-banner-subtitle">{{$banner->banner_subtitle}}</span>
                             <h3 class="tp-product-banner-title my-3">{{$banner->banner_title}}</h3>
                             {{-- <div class="tp-product-banner-price mb-40">
                                <span class="old-price">$1240.00</span>
                                <p class="new-price">$975.00</p>
                             </div> --}}
                             <div class="tp-product-banner-btn">
                                <a href="shop.html" class="tp-btn tp-btn-2">Visit Site</a>
                             </div>
                          </div>
                       </div>
                       <div class="col-xl-6 col-lg-6">
                          <div class="tp-product-banner-thumb-wrapper p-relative">
                             {{-- <div class="tp-product-banner-thumb-shape">
                                <span class="tp-product-banner-thumb-gradient"></span>
                                <img class="tp-offer-shape" src="{{asset('frontend/assets/')}}img/banner/banner-slider-offer.png" alt="">
                             </div> --}}
 
                             <div class="tp-product-banner-thumb text-end p-relative z-index-1">
                                <img src="{{asset($banner->image)}}" alt="">
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                @endforeach

             </div>
             <div class="tp-product-banner-slider-dot tp-swiper-dot"></div>
          </div>
       </div>
    </div>
 </div>