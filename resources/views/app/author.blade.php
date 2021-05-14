@extends('app.layouts.app')
@section('content')
    <section class="author-area pb-40">
        <div class="container">
            <ul class="breadcrumb">
                @include('app.layouts.breadcrumb')
            </ul>
            @include('app.layouts.author-details')
        </div>
    </section>
    <section class="all-category-news ptb-40">
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
    @include('app.layouts.more-post-area')
@endsection
