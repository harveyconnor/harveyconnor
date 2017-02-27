<!-- Header -->
<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
        <li>
            <div class="btn-group">
                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                    <img src="https://gitlab.com/uploads/user/avatar/56386/tt_avatar_small.jpg" alt="Avatar">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">Profile</li>
                    <li>
                        <a tabindex="-1" href="{{ route('admin.profile') }}">
                            Profile
                            <i class="fa fa-user-circle-o pull-right"></i>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Actions</li>
                    <li>
                        <a tabindex="-1" href="{{ url('/logout') }}">
                            <i class="fa fa-sign-out pull-right"></i>Log out
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        <li class="hidden-md hidden-lg">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                <i class="fa fa-navicon"></i>
            </button>
        </li>
        <li class="hidden-xs hidden-sm">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                <i class="fa fa-ellipsis-v"></i>
            </button>
        </li>
    </ul>
    <!-- END Header Navigation Left -->
</header>
<!-- END Header -->
