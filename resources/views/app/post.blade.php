@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css") }}">
@endsection
@extends('app.layouts.app')@section('title',$post->title)
@section('seo')
    {!! SEO::generate() !!}
@endsection
@section('content')
    <section class="news-details-area pb-40">
        <div class="container">
            <ul class="breadcrumb">
                @include('app.layouts.breadcrumb')
            </ul>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="news-details">
                        <div class="article-img">
                            <img src="{{ asset($post->image) }}" alt="image">
                        </div>
                        <div class="article-content">
                            <h1>{{ $post->title }}</h1>
                            <ul class="entry-meta">
                                <li><i class="icofont-user"></i> <a href="{{ route('user.show',$post->user->id) }}">{{$post->user->name}}</a></li>
                                <li><i class="icofont-eye-alt"></i> {{$post->view}}</li>
                                <li><i class="icofont-calendar"></i>{{$post->date}}</li>
                            </ul>
                            <ul class="category mb-4">
                                <li><span>{{__('Categories')}}:</span></li>
                                @foreach($post->categories as $category)
                                    <li><a href="{{ route('category.show',$category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            {!! $post->body !!}
                        </div>
                    </div>
                    <div class="post-controls-buttons">
                        <div>
                            @if($nextPost)
                                <a href="{{ route('post.show',$nextPost->slug) }}">{{ __('Next post') }}</a>
                            @endif
                        </div>
                        <div>
                            @if($previousPost)
                                <a href="{{ route('post.show',$previousPost->slug) }}">{{ __('Previous post') }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="comments-area">
                        @if($commentsCount>0)
                            <h3 class="comments-title">{{ $commentsCount." ".__('Comment') }}</h3>
                            <ol class="comment-list">
                                @foreach($comments as $comment)
                                    <li class="comment">
                                        <article class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="{{ asset($comment->user->image??'assets\app\img\user.png') }}" class="avatar" alt="image">
                                                    <b class="fn">{{$comment->user->name}}</b>
                                                </div>
                                                <div class="comment-metadata">
                                                    <time>{{$comment->date}}</time>
                                                </div>
                                            </footer>
                                            <div class="comment-content">
                                                <p>{{$comment->comment}}</p>
                                            </div>
                                            @can('replay',$comment)
                                                <div class="reply">
                                                    <a href="{{ route('admin.comments.show',$comment->id) }}" class="comment-reply-link">پاسخ دادن</a>
                                                </div>
                                            @endcan
                                        </article>
                                        @if($comment->replies)
                                            <ol class="children">
                                                @foreach($comment->replies as $replay)
                                                    <li class="comment">
                                                        <article class="comment-body">
                                                            <footer class="comment-meta">
                                                                <div class="comment-author vcard">
                                                                    <img src="{{ asset($replay->user->image??'assets\app\img\user.png') }}" class="avatar" alt="image">
                                                                    <b class="fn">{{$replay->user->name}}</b>
                                                                </div>
                                                                <div class="comment-metadata">
                                                                    <time>{{$replay->date}}</time>
                                                                </div>
                                                            </footer>
                                                            <div class="comment-content">
                                                                <p>{{$replay->comment}}</p>
                                                            </div>
                                                            @can('replay',$replay)
                                                                <div class="reply">
                                                                    <a href="{{ route('admin.comments.show',$replay->id) }}" class="comment-reply-link">پاسخ دادن</a>
                                                                </div>
                                                            @endcan
                                                        </article>
                                                    </li>
                                                @endforeach

                                            </ol>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">{{__('Leave a comment')}}</h3>
                            <form class="comment-form" action="{{ route('comment.store',$post->id) }}" method="post">
                                @csrf
                                @method('put')
                                @auth

                                    <p class="comment-form-comment">
                                        <label for="comment">{{__('Comment')}}</label>
                                        <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>
                                    </p>
                                    <p class="form-submit">
                                        <input type="submit" name="submit" id="submit" class="submit" value="{{__('Send')}}">
                                    </p>
                                @endauth
                                @guest
                                    <div class="comment-notes">
                                        <div class="alert alert-primary" role="alert">
                                            {{ __('You must be logged in to leave a comment!') }}
                                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </div>
                                    </div>


                                @endguest

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    @if(Session::has('status'))
        <script>
            $(window).on('load', function () {
                Swal.fire({
                    icon: 'success',
                    title: '{{__('Success')}}',
                    text: '{{ Session::get('status') }}',
                    showConfirmButton: false,
                    timer: 3000,
                });
            })
        </script>
    @endif
@endsection
