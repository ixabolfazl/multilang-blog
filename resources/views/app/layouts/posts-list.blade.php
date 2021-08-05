@foreach($posts as $post)
    <div class="single-category-news">
        <div class="blog-box">
            <div class="row m-0 align-items-center">
                <div class="col-lg-5 col-md-6 p-0">
                    <div class="category-news-image">
                        <a href="{{ route('post.show',$post->slug) }}">
                            <img src="{{ asset($post->image) }}" alt="image"> </a>
                        <div class="tags bg-{{ $post->id%4+1 }}">
                            @foreach($post->categories as $PostCategories)
                                <a href="{{ route('category.show',$PostCategories->slug) }}">{{ $PostCategories->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="category-news-content">
                        <h3><a href="{{ route('post.show',$post->slug) }}">{{ $post->title }}</a></h3>
                        <li><i class="icofont-calendar"></i>{{ $post->date }}</li>
                        <p>{{ Str::limit($post->description, 200) }}</p>
                        <div class="posts-content">
                            <a href="{{ route('post.show',$post->slug) }}" class="read-more-btn"><span>{{__('Read more')}}</span>
                                <i class="icofont-arrow-{{ app()->getLocale()=='fa'? 'left': 'right' }}"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
{{ $posts->links('app.layouts.pagination') }}

