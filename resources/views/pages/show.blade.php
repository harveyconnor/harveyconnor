@extends('layouts.front_end.app')
@section('page_title',$page->title)
@section('content')
    <main id="main-container">
        <!-- Hero Content -->
        <div class="bg-image" style="background-image: url('http://weknowyourdreams.com/images/ocean/ocean-02.jpg');">
            <div class="bg-primary-op">
                <section class="content content-full content-boxed overflow-hidden">
                    <!-- Section Content -->
                    <div class="push-100-t push-100 text-center">
                        <h1 class="text-white push-10 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">{{ $page->title }}</h1>
                        <h2 class="h5 text-white-op visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">{{ $page->description }}</h2>
                    </div>
                    <!-- END Section Content -->
                </section>
            </div>
        </div>
        <!-- END Hero Content -->

        <!-- Story Content -->
        <div class="bg-white">
            <section class="content content-boxed">
                <!-- Section Content -->
                <div class="row push-50-t push-50 nice-copy-story">
                    <div class="col-sm-8 col-sm-offset-2">
                        {{-- add text-center class if in need of auto centering all data--}}
                        <p>
                            {!! $page->content !!}
                        </p>
                    </div>
                </div>
                <!-- END Section Content -->
            </section>
        </div>
    </main>
@endsection
@section('extra_scripts')
    <script>
        jQuery(function () {
            App.initHelpers(['appear', 'magnific-popup','appear-countTo']);
        });
    </script>
@endsection
