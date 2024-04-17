<div class="cartmini__area tp-all-font-roboto">
    <div class="cartmini__wrapper d-flex justify-content-between flex-column">
        <div class="cartmini__top-wrapper">
            <div class="cartmini__top p-relative">
                <div class="cartmini__top-title">
                    <h4>Shopping cart</h4>
                </div>
                <div class="cartmini__close">
                    <button type="button" class="cartmini__close-btn cartmini-close-btn"><i
                            class="fal fa-times"></i></button>
                </div>
            </div>

            <div class="cartmini__widget">

                <div id="miniCart">
                    
                </div>

            </div>
            <!-- for wp -->

            <!-- if no item in cart -->
            <div class="cartmini__empty text-center d-none">
                <img src="{{ asset('frontend/assets/img/product/cartmini/empty-cart.png') }}" alt="">
                <p>Your Cart is empty</p>
                <a href="shop.html" class="tp-btn">Go to Shop</a>
            </div>
            <!-- if no item in cart -->
            
        </div>

        <div class="cartmini__checkout">

            <div class="cartmini__checkout-title mb-30">
                <h4>Subtotal:</h4>
                <span> Tk</span><span id="cartSubTotal"></span>
            </div>

            <div class="cartmini__checkout-btn">
                <a href="{{route('mycart')}}" class="tp-btn mb-10 w-100"> view cart</a>
                <a href="checkout.html" class="tp-btn tp-btn-border w-100"> checkout</a>
            </div>

        </div>

    </div>
</div>