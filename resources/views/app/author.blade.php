@extends('app.layouts.app')@section('title',$user->name)
@section('seo')
    {!! SEO::generate() !!}
@endsection
@section('content')
    <div class="page-title-area">
        <div class="container">
            <ul class="breadcrumb">
                @include('app.layouts.breadcrumb')
            </ul>
            @include('app.layouts.author-details')
        </div>
    </div>
    <section class="all-category-news ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">

                    <div class="section-title">
                        <h2>{{ $user->name }}</h2>
                    </div>
                    @include('app.layouts.posts-list')
                </div>
            </div>
        </div>
    </section>
@endsection
