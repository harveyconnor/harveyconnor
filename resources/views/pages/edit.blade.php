@extends('layouts.app')
@section('page_title','Edit Page')
@section('content')
    <main id="main-container">
        <div class="content bg-gray-lighter">
            <div class="row items-push">
                <div class="col-sm-7">
                    <h1 class="page-heading">
                        Edit Page <small>Modify an existing page.</small>
                    </h1>
                </div>
                <div class="col-sm-5 text-right hidden-xs">
                    <ol class="breadcrumb push-10-t">
                        <li>Pages</li>
                        <li><a class="link-effect">Edit</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content">
            <page-edit></page-edit>
        </div>
    </main>
@endsection
@section('extra_scripts')
<script src="{{ asset('js/slug.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script>
    CKEDITOR.replace( 'content' );
    CKEDITOR.config.disableNativeSpellChecker = false;
    $(function(){
        App.initHelpers(['tags-inputs']);
    });
</script>
@endsection
@section('extra_styles')
<link rel="stylesheet" href="{{ asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
@endsection
