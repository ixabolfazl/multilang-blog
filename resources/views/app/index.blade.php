@extends('app.layouts.app')
@section('content')
    @include('app.layouts.index-top-posts')
    <section class="hot-news-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="section-title">
                        <h2>همه اخبار</h2>
                    </div>
                    @include('app.layouts.posts-list')
                </div>
                <div class="col-lg-4 col-md-12">
                    @include('app.layouts.featured-news')
                    @include('app.layouts.newsletter-box')

                </div>
            </div>
        </div>
    </section>
    @include('app.layouts.index-bottom-category-posts')
    @include('app.layouts.more-post-area')
@endsection
