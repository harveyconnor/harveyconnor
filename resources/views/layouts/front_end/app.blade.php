@include('partials.head')
<body>
<div id="app">
    <div id="page-container" class="side-scroll header-navbar-fixed header-navbar-transparent">
        @include('partials.front_end.header')
        @yield('content')
        @include('partials.front_end.footer')
    </div>
    <!-- END Page Container -->
</div>
@include('partials.foot')
@yield('extra_scripts')
</body>
</html>
