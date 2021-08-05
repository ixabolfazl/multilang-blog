@extends('app.layouts.app')@section('title',$category->name)
@section('seo')
    {!! SEO::generate() !!}
@endsection
@section('content')
    <div class="page-title-area">
        <div class="container">
            <ul class="breadcrumb">
                @include('app.layouts.breadcrumb')
            </ul>
        </div>
    </div>
    @include('app.layouts.catrgory-top-post')
    <section class="all-category-news ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">

                    <div class="section-title">
                        <h2>{{ $category->name }}</h2>
                    </div>
                    @include('app.layouts.posts-list')
                </div>
            </div>
        </div>
    </section>
@endsection
