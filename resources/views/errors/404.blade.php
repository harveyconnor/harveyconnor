@include('partials.head')
@section('page_title','404 Page Not Found')
<body>
<div id="app">
    <div class="content bg-white text-center pulldown overflow-hidden">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1 class="font-s128 font-w300 text-city animated flipInX">404</h1>
                <h2 class="h3 font-w300 push-50 animated fadeInUp">We are sorry but the page you are looking for was not found..</h2>
            </div>
        </div>
    </div>
    <div class="content pulldown text-muted text-center">
        <a class="link-effect" href="{{ route('home') }}">Go Back to Dashboard</a>
    </div>
    @include('partials.foot')
</div>
</body>
</html>
