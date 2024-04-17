@php
    $id = Auth::user()->id;
    $data = App\Models\User::find($id);
    $status = $data->status;
@endphp

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
            <a href="{{ route('vendor.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @if ($status == 'active')
            <li class="menu-label">Backend Section</li>

            {{-- Product Section  --}}
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Product</div>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('all.vendor.product') }}"><i class='bx bx-radio-circle'></i>All Product</a>
                    </li>

                    <li>
                        <a href="{{ route('add.vendor.product') }}"><i class='bx bx-radio-circle'></i>Add Product</a>
                    </li>

                </ul>
            </li>
            {{-- Product Section  --}}

            {{-- Order Section  --}}
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Order</div>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('all.vendor.order') }}"><i class='bx bx-radio-circle'></i>All Order</a>
                    </li>

                </ul>
            </li>
            {{-- Order Section  --}}




            <li class="menu-label">Manage Section</li>

            {{-- <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Vendor & User</div>
                </a>
                <ul>

                    <li>
                        <a href=""><i class='bx bx-radio-circle'></i>All Vendor</a>
                    </li>

                    <li>
                        <a href=""><i class='bx bx-radio-circle'></i>All User</a>
                    </li>

                </ul>
            </li> --}}
        @else
        @endif
        <li class="menu-label">Others</li>

        <li>
            <a href="https://codervent.com/rocker/documentation/index.html" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>




    </ul>
    <!--end navigation-->
</div>
