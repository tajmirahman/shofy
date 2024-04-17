@extends('frontend.frontend_dashboard')
@section('main')
    @section('title')
        My WishList
    @endsection

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
           <div class="row">
              <div class="col-xxl-12">
                 <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Wishlist</h3>
                    <div class="breadcrumb__list">
                       <span><a href="{{route('index')}}">Home</a></span>
                       <span>Wishlist</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- breadcrumb area end -->

     <!-- cart area start -->
     <section class="tp-cart-area pb-120">
        <div class="container">
           <div class="row">
              <div class="col-xl-12">
                 <div class="tp-cart-list mb-45 mr-30">
                    <table class="table">
                       <thead>
                          <tr>
                             <th colspan="2" class="tp-cart-header-product">Product</th>
                             <th class="tp-cart-header-price">Price</th>
                             <th class="tp-cart-header-price">Status</th>
                             <th>Action</th>
                          </tr>
                       </thead>

                       <tbody id="wishlist">

                       </tbody>

                    </table>
                 </div>

                 

              </div>
           </div>
        </div>
     </section>
     <!-- cart area end -->

@endsection