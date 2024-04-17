@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Shofy | Blog
@endsection

<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-100 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                    <h3 class="breadcrumb__title">Only Blog</h3>
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('index') }}">Home</a></span>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->


<!-- blog grid area start -->
<section class="tp-blog-grid-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="tp-blog-grid-wrapper">


                    <div class="tab-content" id="nav-tabContent">

                        <!-- blog grid item wrapper -->
                        <div class="tp-blog-grid-item-wrapper">
                            <div class="row tp-gx-30">

                                @foreach ($blogs as $blog)
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="tp-blog-grid-item p-relative mb-30 h-100">
                                            <div class="tp-blog-grid-thumb w-img fix mb-30">
                                                <a href="{{ url('blog-details/' . $blog->id . '/' . $blog->post_slug) }}">
                                                    <img src="{{ asset($blog->image) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="tp-blog-grid-content">
                                                <div class="tp-blog-grid-meta">
                                                    <span>
                                                        <span>
                                                            <svg width="16" height="17" viewBox="0 0 16 17"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M10.5972 10.7259L8.42715 9.43093C8.04915 9.20693 7.74115 8.66793 7.74115 8.22693V5.35693"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                        {{ $blog->created_at->format('d F Y') }}
                                                    </span>
                                                </div>
                                                <h3 class="tp-blog-grid-title">
                                                    <a href="{{ url('blog-details/' . $blog->id . '/' . $blog->post_slug) }}">{{ $blog->post_title }}</a>
                                                </h3>
                                                <p>{{ $blog->short_descp }}</p>

                                                <div class="tp-blog-grid-btn">
                                                    <a href="{{ url('blog-details/' . $blog->id . '/' . $blog->post_slug) }}" class="tp-link-btn-3">
                                                        Read More
                                                        <span>
                                                            <svg width="17" height="15" viewBox="0 0 17 15"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M16 7.5L1 7.5" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="tp-blog-pagination mt-30">
                                    <div class="tp-pagination">
                                        
                                        {{ $blogs->links('vendor.pagination.custom_paginate') }}

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="tp-sidebar-wrapper tp-sidebar-ml--24">


                    <!-- categories start -->
                    @php
                        $blogcat = App\Models\BlogCategory::latest()->get();
                    @endphp

                    <div class="tp-sidebar-widget widget_categories mb-35">
                        <h3 class="tp-sidebar-widget-title">Blog Category</h3>
                        <div class="tp-sidebar-widget-content">
                            <ul>
                                @foreach ($blogcat as $cat)

                                    @php
                                        $blogs = App\Models\BlogPost::where('blogcat_id', $cat->id)->get();
                                    @endphp


                                    <li><a href="blog-grid.html">{{ $cat->blog_category_name }} <span>({{count($blogs)}})</span></a>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- categories end -->

                    <!-- latest post start -->
                    @php
                        $blogitems = App\Models\BlogPost::latest()
                            ->limit(3)
                            ->get();
                    @endphp
                    <div class="tp-sidebar-widget mb-35">
                        <h3 class="tp-sidebar-widget-title">Latest Posts</h3>
                        <div class="tp-sidebar-widget-content">
                            <div class="tp-sidebar-blog-item-wrapper">

                                @foreach ($blogitems as $blog)
                                    <div class="tp-sidebar-blog-item d-flex align-items-center">
                                        <div class="tp-sidebar-blog-thumb">
                                            <a href="{{ url('blog-details/' . $blog->id . '/' . $blog->post_slug) }}">
                                                <img src="{{ asset($blog->image) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="tp-sidebar-blog-content">
                                            <div class="tp-sidebar-blog-meta">
                                                <span>{{ $blog->created_at->format('d F Y') }}</span>
                                            </div>
                                            <h3 class="tp-sidebar-blog-title">
                                                <a href="{{ url('blog-details/' . $blog->id . '/' . $blog->post_slug) }}">{{ $blog->post_title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- latest post end -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog grid area end -->

@endsection
