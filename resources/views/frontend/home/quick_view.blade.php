<div class="modal fade tp-product-modal" id="producQuickViewModal" tabindex="-1" aria-labelledby="producQuickViewModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="tp-product-modal-content d-lg-flex align-items-start">
                <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                    data-bs-target="#producQuickViewModal"><i class="fa-regular fa-xmark"></i></button>
                <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">

                    <div class="tp-product-details-nav-main-thumb">
                        <img src="" style="width: 400px;height:400px;" id="pimage" alt="">
                    </div>

                </div>
                <div class="tp-product-details-wrapper">
                    <div class="tp-product-details-category mb-2">
                        <span id="psubcategory"></span>
                    </div>
                    <h3 class="tp-product-details-title" id="pname"></h3>

                    <!-- inventory details -->
                    <div class="tp-product-details-inventory d-flex align-items-center mb-10">

                        <div>
                            <span class="text-success" id="aviable"></span>
                            <span id="stockout" class="text-danger"></span>
                        </div>

                    </div>

                    <p id="pshort_des"></p>

                    <!-- price -->
                    <div class="tp-product-details-price-wrapper mb-20">
                        <span class="tp-product-details-price old-price">Tk</span>
                        <span class="tp-product-details-price old-price" id="oldprice"></span>

                        <span class="tp-product-details-price new-price">Tk</span>
                        <span class="tp-product-details-price new-price" id="pprice"></span>
                    </div>

                    <!-- variations -->
                    <div class="tp-product-details-variation">

                        <!-- single item -->
                        <div class="row">

                            <div class="col-lg-6" id="colorArea">
                                <h4 class="tp-product-details-variation-title">Color :</h4>
                                <select name="color" id="color" class="form-select">

                                </select>
                            </div>

                            <div class="col-lg-6" id="sizeArea">
                                <h4 class="tp-product-details-variation-title">Size :</h4>
                                <select name="size" id="size" class="form-select">

                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- actions -->
                    <div class="tp-product-details-action-wrapper">
                        <h3 class="tp-product-details-action-title">Quantity</h3>
                        <div class="tp-product-details-action-item-wrapper d-sm-flex align-items-center">
                            <div class="tp-product-details-quantity">
                                <div class="tp-product-quantity mb-15 mr-15">

                                    <span class="tp-cart-minus">
                                        <svg width="11" height="2" viewBox="0 0 11 2" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1H10" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>

                                    <input class="tp-cart-input" name="qty" id="qty" type="text"
                                        value="1" min="1" />

                                    <span class="tp-cart-plus">
                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 6H10" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <input type="hidden" id="product_id">

                            <div class="tp-product-details-add-to-cart mb-15">
                                <a type="submit" onclick="addToCart()" class="tp-product-details-add-to-cart-btn">Add
                                    To Cart</a>
                            </div>
                            
                            <div class="tp-product-details-category mb-2 d-none">
                                <span id="pvendor_id"></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
