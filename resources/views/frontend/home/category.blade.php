@php
    $categorys = App\Models\Category::orderBy('category_name', 'ASC')
        ->latest()
        ->limit(6)
        ->get();
@endphp
<section class="tp-product-category pt-60 pb-15">
    <div class="container">
        <div class="row row-cols-xl-6 row-cols-lg-6 row-cols-md-4">

            @foreach ($categorys as $category)
                @php
                    $product = App\Models\Product::where('category_id', $category->id)
                        ->get();
                @endphp
                <div class="col">
                    <div class="tp-product-category-item text-center mb-40">
                        <div class="tp-product-category-thumb fix">
                            <a href="{{route('catwise.product',$category->id)}}">
                                <img src="{{ asset($category->image) }}" alt="product-category">
                            </a>
                        </div>
                        <div class="tp-product-category-content">
                            <h3 class="tp-product-category-title">
                                <a href="{{route('catwise.product',$category->id)}}">{{ $category->category_name }}</a>
                            </h3>
                            <p>{{count($product)}} Product</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
