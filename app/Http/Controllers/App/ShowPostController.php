<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;

class ShowPostController extends Controller
{
    /**
     * Display the specified post.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //check enabled
        if ($post->status == 'Disable') {
            abort(404);
        }

        //seo
        SEOTools::setTitle($post->title);
        SEOTools::setDescription($post->meta ?? $post->description);
        SEOTools::opengraph()->addProperty('type', 'posts');
        SEOTools::jsonLd()->addImage(asset($post->image));

        //incre view
        $post->increment('view');

        // next and previous post
        $previousPost = Post::active()->latest()->where('id', '<', $post->id)->first();
        $nextPost = Post::active()->where('id', '>', $post->id)->first();

        //comments
        $comments = Comment::latest()->where([['is_approved', true], ['comment_id', null]])->get();
        $commentsCount = $comments->count();

        //breadcrumb
        $breadcrumbs = [__('Posts') => 'home', $post->title => ''];

        return view('app.post', compact(['post', 'comments', 'commentsCount', 'previousPost', 'nextPost', 'breadcrumbs']));
    }
}
