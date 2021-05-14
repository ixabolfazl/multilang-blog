@extends('app.layouts.app')
@section('content')
    <section class="news-details-area pb-40">
        <div class="container">
            <ul class="breadcrumb">
                @include('app.layouts.breadcrumb')
            </ul>
            <div class="row">
                <div class="col-lg-8 col-md-12">

                    @include('app.layouts.post-details')
                    @include('app.layouts.post-controls-buttons')
                    @include('app.layouts.comments-area')
                </div>
                <div class="col-lg-4 col-md-12">
                    @include('app.layouts.widget-area')
                </div>
            </div>
        </div>
    </section>
    @include('app.layouts.more-post-area')
@endsection
