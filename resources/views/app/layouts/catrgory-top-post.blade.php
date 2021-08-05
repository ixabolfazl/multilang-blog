<section class="default-news-area bg-color-none">
    <div class="container">
        <div class="row">
            <div class="default-news-slides owl-carousel owl-theme">
                @foreach($topPosts as $topPost)
                    <div class="col-lg-12 col-md-12">
                        <div class="single-default-news">
                            <img src="{{ asset($topPost->image) }}" alt="image">
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="icofont-user-suited"></i><a href="{{ route('user.show',$topPost->user->id) }}">{{ $topPost->user->name }}</a>
                                    </li>
                                    <li><i class="icofont-calendar"></i>{{ $topPost->date }}</li>
                                </ul>
                                <h3><a href="{{ route('post.show',$topPost->slug) }}">{{ $topPost->title }}</a></h3>
                            </div>
                            <div class="tags bg-{{ $topPost->id%4+1 }}">
                                @foreach($topPost->categories as $topPostCategories)
                                    <a href="{{ route('category.show',$topPostCategories->slug) }}">{{ $topPostCategories->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
