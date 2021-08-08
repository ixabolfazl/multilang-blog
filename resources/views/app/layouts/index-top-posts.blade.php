<section class="new-news-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="new-news-list">
                    @foreach($topPosts->slice(0, 2) as $topPost)
                        <div class="single-new-news">
                            <img src="{{ asset($topPost->image) }}" alt="image">
                            <div class="news-content">
                                <ul>
                                    <li><i class="icofont-calendar"></i>{{ $topPost->date }}</li>
                                </ul>
                                <h3><a href="{{ route('post.show',$topPost->slug) }}">{{ $topPost->title }}</a></h3>
                            </div>
                            <div class="tags bg-{{ $topPost->id%4+1 }}">
                                @foreach($topPost->categories as $PostCategories)
                                    <a href="{{ route('category.show',$PostCategories->slug) }}">{{ $PostCategories->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-12 ">
                @foreach($topPosts as $topPost)
                    @if($loop->iteration==3)
                        <div class="new-news owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="single-default-news">
                                <img src="{{ asset($topPost->image) }}" alt="image">
                                <div class="news-content">
                                    <ul>
                                        <li>
                                            <i class="icofont-user-suited"></i><a href="{{ route('user.show',$topPost->user->id) }}">{{ $topPost->author }}</a>
                                        </li>
                                        <li><i class="icofont-calendar"></i>{{ $topPost->date }}</li>
                                    </ul>
                                    <h3><a href="{{ route('post.show',$topPost->slug) }}">{{ $topPost->title }}</a></h3>
                                </div>
                                <div class="tags bg-{{ $topPost->id%4+1 }}">
                                    @foreach($topPost->categories as $PostCategories)
                                        <a href="{{ route('category.show',$PostCategories->slug) }}">{{ $PostCategories->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach

            </div>
            <div class="col-lg-3 col-md-12">
                @foreach($topPosts->slice(3, 5) as $topPost)
                    <div class="single-new-news">
                        <img src="{{ asset($topPost->image) }}" alt="image">
                        <div class="news-content">
                            <ul>
                                <li><i class="icofont-calendar"></i>{{$topPost->date }}</li>
                            </ul>
                            <h3><a href="{{ route('post.show',$topPost->slug) }}">{{ $topPost->title }}</a></h3>
                        </div>
                        <div class="tags bg-{{ $topPost->id%4+1 }}">
                            @foreach($topPost->categories as $PostCategories)
                                <a href="{{ route('category.show',$PostCategories->slug) }}">{{ $PostCategories->name }}</a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
