@extends('layouts.app')
@section('page_title','PTV')
@section('extra_styles')

@endsection
@section('content')
    <main id="main-container">
        <div class="content bg-gray-lighter">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h1 class="page-heading">
                        PTV <small>Live updates.</small>
                    </h1>
                </div>
                <div class="col-sm-5 text-right hidden-xs">
                    <ol class="breadcrumb push-10-t">
                        <li>Chat</li>
                        <li><a class="link-effect">Live</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <ptv></ptv>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('extra_scripts')

@endsection
