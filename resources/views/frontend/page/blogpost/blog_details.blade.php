@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Blog Details
@endsection

<!-- blog details area start -->
<section class="tp-postbox-details-area pb-120 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="tp-postbox-details-top">

                    <h3 class="tp-postbox-details-title">{{ $blog->post_title }}</h3>
                    <div class="tp-postbox-details-meta mb-50">
                        <span data-meta="author">
                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.4104 8C9.33922 8 10.9028 6.433 10.9028 4.5C10.9028 2.567 9.33922 1 7.4104 1C5.48159 1 3.91797 2.567 3.91797 4.5C3.91797 6.433 5.48159 8 7.4104 8Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M13.4102 15.0001C13.4102 12.2911 10.721 10.1001 7.41016 10.1001C4.09933 10.1001 1.41016 12.2911 1.41016 15.0001"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            By <a href="javascript:;">{{ $blog->user->name }}</a>
                        </span>
                        <span>
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M10.5972 10.7259L8.42721 9.43093C8.04921 9.20693 7.74121 8.66793 7.74121 8.22693V5.35693"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            {{ $blog->created_at->format('d F Y') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="tp-postbox-details-thumb">
                    <img src="{{ asset($blog->image) }}" style="width: 1000px;height: 600px;" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="tp-postbox-details-main-wrapper">
                    <div class="tp-postbox-details-content">
                        <p class="tp-dropcap">{{ $blog->long_descp }}</p>

                        <hr>

                        {{-- Comment  --}}

                        <div class="tp-postbox-details-comment-wrapper">
                            <h3 class="tp-postbox-details-comment-title">Comments (2)</h3>

                            @php
                                $comments = App\Models\Comment::where('post_id', $blog->id)
                                    ->where('parent_id', null)
                                    ->limit(3)
                                    ->get();
                            @endphp

                            <div class="tp-postbox-details-comment-inner">
                                <ul>
                                    @foreach ($comments as $comment)
                                        <li>


                                            <div class="tp-postbox-details-comment-box d-sm-flex align-items-start">
                                                <div class="tp-postbox-details-comment-thumb">
                                                    <img src="{{ url('upload/user.png') }}" alt="">
                                                </div>
                                                <div class="tp-postbox-details-comment-content">
                                                    <div
                                                        class="tp-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                        <div class="tp-postbox-details-comment-avater">
                                                            <h4 class="tp-postbox-details-comment-avater-title">
                                                                {{ $comment->user->name }}
                                                            </h4>
                                                            <span
                                                                class="tp-postbox-details-avater-meta">{{ $comment->created_at->format('d F Y') }}</span>
                                                        </div>
                                                        {{-- <div class="tp-postbox-details-comment-reply">
                                                        <a href="#">Reply</a>
                                                    </div> --}}
                                                    </div>
                                                    <p class="mb-1">{{ $comment->subject }}</p>
                                                    <h6 class="text-muted">{{ $comment->message }}</h6>
                                                </div>
                                            </div>

                                            @php
                                                $replys = App\Models\Comment::where('parent_id', $comment->id)
                                                    ->get();
                                            @endphp
                                            @foreach ($replys as $reply)
                                            <ul class="children">
                                                <li>
                                                    <div
                                                        class="tp-postbox-details-comment-box d-sm-flex align-items-start">
                                                        <div class="tp-postbox-details-comment-thumb">
                                                            <img src="{{ !empty($reply->photo) ? url('upload/admin_images/' . $reply->photo) : url('upload/no_image.jpg') }}" alt="">
                                                        </div>
                                                        <div class="tp-postbox-details-comment-content">
                                                            <div
                                                                class="tp-postbox-details-comment-top d-flex justify-content-between align-items-start">
                                                                <div class="tp-postbox-details-comment-avater">
                                                                    <h4 class="tp-postbox-details-comment-avater-title">
                                                                        </h4>
                                                                    <span class="tp-postbox-details-avater-meta">{{ $reply->created_at->format('d F Y') }}</span>
                                                                </div>
                                                                {{-- <div class="tp-postbox-details-comment-reply">
                                                                    <a href="#">Reply</a>
                                                                </div> --}}
                                                            </div>
                                                            <p>{{$reply->message}}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{-- Comment Form --}}

                        <div class="tp-postbox-details-form">

                            <h3 class="tp-postbox-details-form-title">Leave a Comment</h3>
                            <p>Make Comment For Login First. <a href="{{ route('login') }}" class="text-primary">Login
                                    Here</a></p>

                            @auth
                                <div class="tp-postbox-details-form-wrapper">

                                    <form action="{{ route('store.comment') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="post_id" value="{{ $blog->id }}">

                                        <div class="tp-postbox-details-form-inner">


                                            <div class="tp-postbox-details-input-box">
                                                <div class="tp-contact-input">
                                                    <input name="subject" id="subject" type="text" autocomplete="off"
                                                        placeholder="subject">
                                                </div>
                                                <div class="tp-postbox-details-input-title">
                                                    <label for="subject">Subject</label>
                                                </div>
                                            </div>

                                            <div class="tp-postbox-details-input-box">
                                                <div class="tp-contact-input">
                                                    <textarea id="msg" name="message" placeholder="Write your message here..."></textarea>
                                                </div>
                                                <div class="tp-postbox-details-input-title">
                                                    <label for="msg">Your Message</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tp-postbox-details-input-box">
                                            <button class="tp-postbox-details-input-btn" type="submit">Post
                                                Comment</button>
                                        </div>

                                    </form>

                                </div>
                            @else
                            @endauth


                        </div>

                        {{-- Comment  --}}

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


                                    <li><a href="blog-grid.html">{{ $cat->blog_category_name }}
                                            <span>({{ count($blogs) }})</span></a>
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
                                                <a
                                                    href="{{ url('blog-details/' . $blog->id . '/' . $blog->post_slug) }}">{{ $blog->post_title }}</a>
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
<!-- blog details area end -->

@endsection
