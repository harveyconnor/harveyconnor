@extends('layouts.app')

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Header -->
        <div class="content bg-gray-lighter">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h1 class="page-heading">
                        Activity <small>Vital UI components for your project.</small>
                    </h1>
                </div>
                <div class="col-sm-5 text-right hidden-xs">
                    <ol class="breadcrumb push-10-t">
                        <li>UI Elements</li>
                        <li><a class="link-effect" href="">Activity</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END Page Header -->

        <!-- Page Content -->
        <div class="content">
            <!-- Alerts -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Alerts</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <!-- Success Alert -->
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h3 class="font-w300 push-15">Success</h3>
                                <p>The <a class="alert-link" href="javascript:void(0)">App</a> was updated!</p>
                            </div>
                            <!-- END Success Alert -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Info Alert -->
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h3 class="font-w300 push-15">Information</h3>
                                <p>Information <a class="alert-link" href="javascript:void(0)">message</a>!</p>
                            </div>
                            <!-- END Info Alert -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Warning Alert -->
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h3 class="font-w300 push-15">Warning</h3>
                                <p>Please pay <a class="alert-link" href="javascript:void(0)">attention</a>!</p>
                            </div>
                            <!-- END Warning Alert -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Danger Alert -->
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h3 class="font-w300 push-15">Error</h3>
                                <p>Opps, an error <a class="alert-link" href="javascript:void(0)">occured</a>!</p>
                            </div>
                            <!-- END Danger Alert -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Alerts -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
