@extends('layouts.app')
@section('page_title','Admin')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Header -->
        <div class="bg-image overflow-hidden" style="background-image: url('http://windows10wall.com/wp-content/uploads/2013/06/Mac_Desktop_Background.jpg');">
            <div class="bg-black-op">
                <div class="content content-narrow">
                    <div class="block block-transparent">
                        <div class="block-content block-content-full">
                            <h1 class="h1 font-w300 text-white animated fadeInDown push-50-t push-5">Dashboard</h1>
                            <h2 class="h4 font-w300 text-white-op animated fadeInUp">Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Header -->

        <!-- Page Content -->
        <div class="content content-narrow">
            <div class="row text-uppercase">
                <div class="col-xs-6 col-sm-3">
                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <div class="text-muted">
                                <small><i class="si si-docs"></i> Total</small>
                            </div>
                            <div class="font-s12 font-w700">Pages</div>
                            <a class="h2 font-w300 text-primary" href="base_comp_charts.html" data-toggle="countTo" data-to="{{ $pages->total() }}"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <div class="text-muted">
                                <small><i class="si si-calendar"></i> Today</small>
                            </div>
                            <div class="font-s12 font-w700">Prd Sales</div>
                            <a class="h2 font-w300 text-primary" href="base_comp_charts.html" data-toggle="countTo" data-to="495"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <div class="text-muted">
                                <small><i class="si si-calendar"></i> Today</small>
                            </div>
                            <div class="font-s12 font-w700">Earnings</div>
                            <a class="h2 font-w300 text-primary" href="base_comp_charts.html" data-toggle="countTo" data-to="148000" data-before="$"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <div class="text-muted">
                                <small><i class="si si-calendar"></i> Today</small>
                            </div>
                            <div class="font-s12 font-w700">Average Sale</div>
                            <a class="h2 font-w300 text-primary" href="base_comp_charts.html" data-toggle="countTo" data-to="299" data-before="$"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
@section('extra_scripts')
    <script>
        jQuery(function () {
            // Init page helpers (CountTo plugin)
            App.initHelpers('appear-countTo');
        });
    </script>
@endsection
