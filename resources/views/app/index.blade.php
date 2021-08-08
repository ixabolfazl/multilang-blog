@extends('app.layouts.app')@section('title',__('Home'))
@section('seo')
    {!! SEO::generate() !!}
@endsection
@section('content')
    @include('app.layouts.index-top-posts')
    <section class="hot-news-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="section-title">
                        <h2>{{ __('Posts') }}</h2>
                    </div>
                    @include('app.layouts.posts-list')
                </div>
                <div class="col-lg-4 col-md-12"></div>
            </div>
        </div>
    </section>
@endsection
