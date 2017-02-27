<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>
                <a class="h5 text-white" href="{{ url('/') }}">
                    <span class="h4 font-w600 sidebar-mini-hide">Harvey Connor</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content">
                <ul class="nav-main">
                    <li>
                        <a class="{{ set_active('admin') }}" href="{{ route('admin.index') }}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Management</span></li>
                    <li class="{{ set_open('admin/page*') }}">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-docs"></i><span class="sidebar-mini-hide">Pages</span></a>
                        <ul>
                            <li>
                                <a class="{{ set_active('admin/pages') }}" href="{{ route('pages.index') }}">View all</a>
                            </li>
                            <li>
                                <a class="{{ set_active('admin/pages/create') }}" href="{{ route('pages.create') }}">Create new</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ set_open('admin/user*') }}">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-users"></i><span class="sidebar-mini-hide">Users</span></a>
                        <ul>
                            <li>
                                <a class="{{ set_active('admin/users') }}" href="{{ route('users.index') }}">View all</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->
