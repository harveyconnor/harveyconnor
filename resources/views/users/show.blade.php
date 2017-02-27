@extends('layouts.app')
@section('page_title','User')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Header -->
        <div class="content bg-gray-lighter">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h1 class="page-heading">
                        User <small>Displaying user information.</small>
                    </h1>
                </div>
                <div class="col-sm-5 text-right hidden-xs">
                    <ol class="breadcrumb push-10-t">
                        <li>User</li>
                        <li><a class="link-effect">View</a></li>
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
                    <h3 class="block-title">View user information</h3>
                </div>
                <div class="block-content">
                    <user-view></user-view>
                </div>
            </div>
            <!-- END Alerts -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
@section('extra_scripts')
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
@endsection
