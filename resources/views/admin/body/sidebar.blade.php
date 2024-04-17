<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Shofy</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>



        {{-- Blog Comment --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Blog Comment</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.blog.comment') }}"><i class='bx bx-radio-circle'></i>All Comment</a>
                </li>

            </ul>
        </li>
        {{-- Blog Comment --}}

        {{-- Review --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Review</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.admin.review') }}"><i class='bx bx-radio-circle'></i>All Review</a>
                </li>

            </ul>
        </li>
        {{-- Review --}}

        {{-- subscribe --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Subscribe</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.subscribe') }}"><i class='bx bx-radio-circle'></i>All subscribe</a>
                </li>

            </ul>
        </li>
        {{-- subscribe --}}

        <li class="menu-label">Backend Section</li>

        {{-- Category Section  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.category') }}"><i class='bx bx-radio-circle'></i>All Category</a>
                </li>

                <li>
                    <a href="{{ route('add.category') }}"><i class='bx bx-radio-circle'></i>Add Category</a>
                </li>

            </ul>
        </li>
        {{-- Category Section  --}}

        {{-- SubCategory Section  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">SubCategory</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.subcategory') }}"><i class='bx bx-radio-circle'></i>All SubCategory</a>
                </li>

                <li>
                    <a href="{{ route('add.subcategory') }}"><i class='bx bx-radio-circle'></i>Add SubCategory</a>
                </li>

            </ul>
        </li>
        {{-- SubCategory Section  --}}

        {{-- Banner Section  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Banner</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.banner') }}"><i class='bx bx-radio-circle'></i>All Banner</a>
                </li>

                <li>
                    <a href="{{ route('add.banner') }}"><i class='bx bx-radio-circle'></i>Add Banner</a>
                </li>

            </ul>
        </li>
        {{-- Banner Section  --}}

        {{-- Slider Section  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.slider') }}"><i class='bx bx-radio-circle'></i>All Slider</a>
                </li>

                <li>
                    <a href="{{ route('add.slider') }}"><i class='bx bx-radio-circle'></i>Add Slider</a>
                </li>

            </ul>
        </li>
        {{-- Slider Section  --}}

        {{-- Product Section  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.product') }}"><i class='bx bx-radio-circle'></i>All Product</a>
                </li>

                <li>
                    <a href="{{ route('add.product') }}"><i class='bx bx-radio-circle'></i>Add Product</a>
                </li>

            </ul>
        </li>
        {{-- Product Section  --}}

        {{-- Division Section  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Shipping Area</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.division') }}"><i class='bx bx-radio-circle'></i>All Division</a>
                </li>

                <li>
                    <a href="{{ route('all.district') }}"><i class='bx bx-radio-circle'></i>All District</a>
                </li>

                <li>
                    <a href="{{ route('all.state') }}"><i class='bx bx-radio-circle'></i>All State</a>
                </li>

            </ul>
        </li>
        {{-- Division Section  --}}

        {{-- Coupon Section  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Coupon</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.coupon') }}"><i class='bx bx-radio-circle'></i>All Coupon</a>
                </li>

                <li>
                    <a href="{{ route('add.coupon') }}"><i class='bx bx-radio-circle'></i>Add Coupon</a>
                </li>

            </ul>
        </li>
        {{-- Coupon Section  --}}

        {{-- Blog Section  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Blog</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.blog.category') }}"><i class='bx bx-radio-circle'></i>All Blog
                        Category</a>
                </li>

                <li>
                    <a href="{{ route('all.blog.post') }}"><i class='bx bx-radio-circle'></i>All Blog Post</a>
                </li>


            </ul>
        </li>
        {{-- Blog Section  --}}

        {{-- Site Setting --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Site Setting</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.site.setting') }}"><i class='bx bx-radio-circle'></i>All Site Setting</a>
                </li>

                <li>
                    <a href="{{ route('all.blog.post') }}"><i class='bx bx-radio-circle'></i>Add Site Setting</a>
                </li>


            </ul>
        </li>
        {{-- Site Setting --}}


        <li class="menu-label">Manage Section</li>

        {{-- Order Manager --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Order</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.admin.order') }}"><i class='bx bx-radio-circle'></i>All Order</a>
                </li>

                <li>
                    <a href="{{ route('admin.confirm.order') }}"><i class='bx bx-radio-circle'></i>Confirm Order</a>
                </li>

                <li>
                    <a href="{{ route('admin.processing.order') }}"><i class='bx bx-radio-circle'></i>Processing
                        Order</a>
                </li>

                <li>
                    <a href="{{ route('admin.deliver.order') }}"><i class='bx bx-radio-circle'></i>Deliver Order</a>
                </li>

                <li>
                    <a href="{{ route('admin.return.order') }}"><i class='bx bx-radio-circle'></i>Return Order</a>
                </li>


            </ul>
        </li>
        {{-- Order Manager --}}

        {{-- Vendor & User --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Vendor & User</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.vendor') }}"><i class='bx bx-radio-circle'></i>All Vendor</a>
                </li>

                <li>
                    <a href="{{ route('all.user') }}"><i class='bx bx-radio-circle'></i>All User</a>
                </li>

            </ul>
        </li>
        {{-- Vendor & User --}}

        {{-- Ecommerce Report --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Ecommerce Report</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.report') }}"><i class='bx bx-radio-circle'></i>All Report</a>
                </li>

                <li>
                    <a href="{{ route('user.report') }}"><i class='bx bx-radio-circle'></i>User Report</a>
                </li>

            </ul>
        </li>
        {{-- Ecommerce Report --}}

        {{-- Order Stock --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Order Stock</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.stock') }}"><i class='bx bx-radio-circle'></i>All Stock</a>
                </li>

            </ul>
        </li>
        {{-- Order Stock --}}

        {{-- Role $ Permission  --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Role & Permission</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All Permission</a>
                </li>

                <li>
                    <a href="{{ route('all.role') }}"><i class='bx bx-radio-circle'></i>All Role</a>
                </li>

                <li>
                    <a href="{{ route('all.roles.permission') }}"><i class='bx bx-radio-circle'></i>All Role In Permisson</a>
                </li>

                <li>
                    <a href="{{ route('add.roles.permission') }}"><i class='bx bx-radio-circle'></i>Add Role In Permisson</a>
                </li>


            </ul>
        </li>
        {{-- Role $ Permission  --}}

        {{-- Admin Manage --}}
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Admin</div>
            </a>
            <ul>

                <li>
                    <a href="{{ route('all.admin') }}"><i class='bx bx-radio-circle'></i>All Admin</a>
                </li>

            </ul>
        </li>
        {{-- Admin Manage --}}


        <li class="menu-label">Others</li>

        <li>
            <a href="javascript:;" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
