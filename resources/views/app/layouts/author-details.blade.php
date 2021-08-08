<div class="author-box">
    <img src="{{  asset($user->image??'assets\app\img\user.png') }}" alt="user-image">
    <div class="author-info">
        <div class="author-title">
            <h3>{{ $user->name }}</h3>
        </div>
        <ul class="post-meta-info">
            <li><i class="icofont-blogger"></i>{{__('Posts')}}: {{ $posts->count() }}</li>
        </ul>

    </div>
</div>
