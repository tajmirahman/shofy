<section class="tp-product-sm-area">
    <div class="container">
        <div class="row">

            {{-- Hot Products  --}}
            @php
                $products = App\Models\Product::where('status', '1')
                    ->where('hot_deal', '1')
                    ->orderBy('id', 'DESC')
                    ->limit(3)
                    ->latest()
                    ->get();
            @endphp
            <div class="col-xl-4 col-md-6">
                <div class="tp-product-sm-list mb-50">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title tp-section-title-sm">Hot Products
                            <svg width="64" height="20" viewBox="0 0 64 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M62 13.1107C1.91792 -5.41202 -3.10865 1.22305 5.00242 18.3636"
                                    stroke="currentColor" stroke-width="3" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>

                    <div class="tp-product-sm-wrapper mr-20">

                        @foreach ($products as $product)
                            <div class="tp-product-sm-item d-flex align-items-center">

                                <div class="tp-product-thumb mr-25 fix">
                                    <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        <img style="width: 80px;" src="{{ asset($product->product_image) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="tp-product-sm-content">
                                    <div class="tp-product-category">
                                        <a href="javascript:;">{{ $product['subcategory']['subcategory_name'] }}</a>
                                    </div>
                                    <h3 class="tp-product-title">
                                        <a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            {{ $product->product_name }}
                                        </a>
                                    </h3>

                                    @php
                                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                                            ->where('status', 1)
                                            ->latest()
                                            ->get();

                                        $avarage = App\Models\Review::where('product_id', $product->id)
                                            ->where('status', 1)
                                            ->avg('rating');
                                    @endphp

                                    <div class="tp-product-rating d-sm-flex align-items-center">
                                        <div class="tp-product-rating-icon">

                                            @if ($avarage == 0)
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 1 || $avarage < 2)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 2 || $avarage < 3)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 3 || $avarage < 4)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 4 || $avarage < 5)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span> <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 5 || $avarage < 5)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span> <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            @endif

                                        </div>

                                        <div class="tp-product-rating-text">
                                            <span>({{ count($reviewcount) }} Review)</span>
                                        </div>
                                    </div>

                                    <div class="tp-product-price-wrapper">
                                        @if ($product->discount_price == null)
                                            <span class="tp-product-price new-price">Tk
                                                {{ $product->selling_price }}</span>
                                        @else
                                            <span class="tp-product-price old-price">Tk
                                                {{ $product->selling_price }}</span>
                                            <span class="tp-product-price new-price">Tk
                                                {{ $product->discount_price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            {{-- Hot Products  --}}

            {{-- New Product  --}}
            @php
                $products = App\Models\Product::where('status', '1')
                    ->where('new', '1')
                    ->orderBy('product_name', 'ASC')
                    ->limit(3)
                    ->latest()
                    ->get();
            @endphp
            <div class="col-xl-4 col-md-6">
                <div class="tp-product-sm-list mb-50">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title tp-section-title-sm">Special Deal
                            <svg width="64" height="20" viewBox="0 0 64 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M62 13.1107C1.91792 -5.41202 -3.10865 1.22305 5.00242 18.3636"
                                    stroke="currentColor" stroke-width="3" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>

                    <div class="tp-product-sm-wrapper mr-20">

                        @foreach ($products as $product)
                            <div class="tp-product-sm-item d-flex align-items-center">

                                <div class="tp-product-thumb mr-25 fix">
                                    <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        <img style="width: 80px;" src="{{ asset($product->product_image) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="tp-product-sm-content">
                                    <div class="tp-product-category">
                                        <a href="javascript:;">{{ $product['subcategory']['subcategory_name'] }}</a>
                                    </div>
                                    <h3 class="tp-product-title">
                                        <a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            {{ $product->product_name }}
                                        </a>
                                    </h3>

                                    @php
                                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                                            ->where('status', 1)
                                            ->latest()
                                            ->get();

                                        $avarage = App\Models\Review::where('product_id', $product->id)
                                            ->where('status', 1)
                                            ->avg('rating');
                                    @endphp

                                    <div class="tp-product-rating d-sm-flex align-items-center">
                                        <div class="tp-product-rating-icon">

                                            @if ($avarage == 0)
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 1 || $avarage < 2)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 2 || $avarage < 3)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 3 || $avarage < 4)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 4 || $avarage < 5)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span> <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 5 || $avarage < 5)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span> <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            @endif

                                        </div>

                                        <div class="tp-product-rating-text">
                                            <span>({{ count($reviewcount) }} Review)</span>
                                        </div>
                                    </div>

                                    <div class="tp-product-price-wrapper">
                                        @if ($product->discount_price == null)
                                            <span class="tp-product-price new-price">Tk
                                                {{ $product->selling_price }}</span>
                                        @else
                                            <span class="tp-product-price old-price">Tk
                                                {{ $product->selling_price }}</span>
                                            <span class="tp-product-price new-price">Tk
                                                {{ $product->discount_price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            {{-- New Product  --}}

            {{-- Top Selling  --}}
            @php
                $products = App\Models\Product::where('status', '1')
                    ->where('best_seeling', '1')
                    ->orderBy('product_name', 'DESC')
                    ->limit(3)
                    ->latest()
                    ->get();
            @endphp
            <div class="col-xl-4 col-md-6">
                <div class="tp-product-sm-list mb-50">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title tp-section-title-sm">Top Selling
                            <svg width="64" height="20" viewBox="0 0 64 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M62 13.1107C1.91792 -5.41202 -3.10865 1.22305 5.00242 18.3636"
                                    stroke="currentColor" stroke-width="3" stroke-miterlimit="3.8637"
                                    stroke-linecap="round" />
                            </svg>
                        </h3>
                    </div>

                    <div class="tp-product-sm-wrapper mr-20">

                        @foreach ($products as $product)
                            <div class="tp-product-sm-item d-flex align-items-center">

                                <div class="tp-product-thumb mr-25 fix">
                                    <a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        <img style="width: 80px;" src="{{ asset($product->product_image) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="tp-product-sm-content">
                                    <div class="tp-product-category">
                                        <a href="javascript:;">{{ $product['subcategory']['subcategory_name'] }}</a>
                                    </div>
                                    <h3 class="tp-product-title">
                                        <a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            {{ $product->product_name }}
                                        </a>
                                    </h3>

                                    @php
                                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                                            ->where('status', 1)
                                            ->latest()
                                            ->get();

                                        $avarage = App\Models\Review::where('product_id', $product->id)
                                            ->where('status', 1)
                                            ->avg('rating');
                                    @endphp

                                    <div class="tp-product-rating d-sm-flex align-items-center">
                                        <div class="tp-product-rating-icon">

                                            @if ($avarage == 0)
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 1 || $avarage < 2)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 2 || $avarage < 3)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 3 || $avarage < 4)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 4 || $avarage < 5)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span> <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star text-secondary"></i></span>
                                            @elseif($avarage == 5 || $avarage < 5)
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span> <span><i
                                                        class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            @endif

                                        </div>

                                        <div class="tp-product-rating-text">
                                            <span>({{ count($reviewcount) }} Review)</span>
                                        </div>
                                    </div>

                                    <div class="tp-product-price-wrapper">
                                        @if ($product->discount_price == null)
                                            <span class="tp-product-price new-price">Tk
                                                {{ $product->selling_price }}</span>
                                        @else
                                            <span class="tp-product-price old-price">Tk
                                                {{ $product->selling_price }}</span>
                                            <span class="tp-product-price new-price">Tk
                                                {{ $product->discount_price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            {{-- Top Selling  --}}

        </div>
    </div>
</section>
