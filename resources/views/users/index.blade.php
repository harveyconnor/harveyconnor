@extends('layouts.app')
@section('page_title','Users')
@section('content')
    <main id="main-container">
        <div class="content bg-gray-lighter">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h1 class="page-heading">
                        Users <small>Displaying all pages.</small>
                    </h1>
                </div>
                <div class="col-sm-5 text-right hidden-xs">
                    <ol class="breadcrumb push-10-t">
                        <li>Users</li>
                        <li><a class="link-effect">View all</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="block block-themed block-rounded">
                <div class="block-header bg-smooth-darker">
                    <h3 class="block-title">View all users</h3>
                </div>
                <div class="block-content">
                    <users></users>
                </div>
            </div>
        </div>
    </main>
@endsection
