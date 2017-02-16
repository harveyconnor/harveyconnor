@include('partials.head')
<body>
    <div id="app">
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            @include('partials.sidebar')
            @include('partials.header')
            @yield('content')
            @include('partials.footer')
        </div>
        <!-- END Page Container -->
    </div>
@include('partials.foot')
</body>
</html>
