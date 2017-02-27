@extends('layouts.app')
@section('page_title','Pages')
@section('content')
    <main id="main-container">
        <div class="content bg-gray-lighter">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h1 class="page-heading">
                        Pages <small>Displaying all pages.</small>
                    </h1>
                </div>
                <div class="col-sm-5 text-right hidden-xs">
                    <ol class="breadcrumb push-10-t">
                        <li>Pages</li>
                        <li><a class="link-effect">View all</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="block block-themed block-rounded block-bordered">
                <div class="block-header bg-smooth-darker">
                    <div class="block-options-simple">
                        <a href="{{ route('pages.create') }}">
                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Create new page"><i class="fa fa-plus"></i></button>
                        </a>
                    </div>
                    <h3 class="block-title">View all pages</h3>
                </div>
                <div class="block-content">
                    <pages></pages>
                </div>
            </div>
        </div>
    </main>
@endsection
