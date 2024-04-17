<section class="tp-blog-area pt-50 pb-100">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xl-4 col-md-6">
                <div class="tp-section-title-wrapper mb-50">
                    <h3 class="tp-section-title">Latest news & articles

                        <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                stroke-linecap="round" />
                        </svg>
                    </h3>
                </div>
            </div>
            <div class="col-xl-8 col-md-6">
                <div class="tp-blog-more-wrapper d-flex justify-content-md-end">
                    <div class="tp-blog-more mb-50 text-md-end">
                        <a href="{{ route('total.blog-post') }}" class="tp-btn tp-btn-2 tp-btn-blue">View All Blog
                            <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <span class="tp-blog-more-border"></span>
                    </div>
                </div>
            </div>
        </div>

        @php
            $blogs = App\Models\BlogPost::latest()
                ->limit(4)
                ->get();
        @endphp

        <div class="row">
            <div class="col-xl-12">
                <div class="tp-blog-main-slider">
                    <div class="tp-blog-main-slider-active swiper-container">
                        <div class="swiper-wrapper">

                            @foreach ($blogs as $blog)
                                <div class="tp-blog-item mb-30 swiper-slide">

                                    <div class="tp-blog-thumb p-relative fix">
                                        <a href="{{ url('blog-details/' . $blog->id . '/' . $blog->post_slug) }}">
                                            <img src="{{ asset($blog->image) }}" alt="">
                                        </a>
                                        <div class="tp-blog-meta tp-blog-meta-date">
                                            <span>{{ $blog->created_at->format('d F Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="tp-blog-content">
                                        <h3 class="tp-blog-title">
                                            <a href="{{ url('blog-details/' . $blog->id . '/' . $blog->post_slug) }}">{{ $blog->post_title }}</a>
                                        </h3>

                                        <div class="tp-blog-tag">
                                            <span><i class="fa-light fa-tag"></i></span>
                                            <a href="javascript:;">{{ $blog->user->name }}</a>
                                        </div>

                                        <p>{{ $blog->short_descp }}</p>

                                        <div class="tp-blog-btn">

                                            <a href="{{ url('blog-details/' . $blog->id . '/' . $blog->post_slug) }}"
                                                class="tp-btn-2 tp-btn-border-2">

                                                Read More
                                                <span>
                                                    <svg width="17" height="15" viewBox="0 0 17 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 7.5L1 7.5" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
