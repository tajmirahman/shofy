@php
    $route = Route::current()->getName();
@endphp

<div class="col-xxl-4 col-lg-4">
    <div class="profile__tab mr-40">
        <nav>
            <div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">

                <a href="{{route('user.dashboard')}}" class="nav-link {{$route == 'user.dashboard' ? 'active' : ''}}"><span><i
                            class="fa-regular fa-user-pen"></i></span>Profile</a>

                <a href="{{route('user.profile')}}" class="nav-link {{$route == 'user.profile' ? 'active' : ''}}" id="nav-information-tab"><span><i
                            class="fa-regular fa-circle-info"></i></span> Information</a>

                <a href="{{route('user.order')}}" class="nav-link {{$route == 'user.order' ? 'active' : ''}}"><span><i class="fa-light fa-clipboard-list-check"></i></span> My Order
                </a>

                <a href="{{route('user.return.order')}}" class="nav-link {{$route == 'user.return.order' ? 'active' : ''}}"><span><i class="fa-light fa-clipboard-list-check"></i></span> Returen Order
                </a>

                <a href="{{route('user.track.order')}}" class="nav-link {{$route == 'user.track.order' ? 'active' : ''}}"><span><i class="fa-light fa-clipboard-list-check"></i></span> Track Order
                </a>

                <a href="" class="nav-link" id="nav-notification-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-notification" type="button" role="tab" aria-controls="nav-notification"
                    aria-selected="false"><span><i class="fa-regular fa-bell"></i></span> Notification </a>

                <a href="{{route('user.password')}}" class="nav-link {{$route == 'user.password' ? 'active' : ''}}"><span><i
                            class="fa-regular fa-lock"></i></span> Change
                    Password </a>

                <span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>

            </div>
        </nav>
    </div>
</div>
