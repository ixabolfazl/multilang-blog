<div class="breaking-news-content clearfix">
    <h6 class="breaking-title"><i class="icofont-flash"></i>{{__('Breaking News').":"}}</h6>
    <div class="breaking-news-slides owl-carousel owl-theme">
        @foreach($setting[app()->getLocale()]->breaking_title_category()->first()->posts()->get() as $post)
            <div class="single-breaking-news">
                <p>
                    <a href="index.htm#">{{$post->title}}</a>
                </p>
            </div>
        @endforeach
    </div>
</div>
