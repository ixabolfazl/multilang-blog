<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AddCommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param AddCommentRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddCommentRequest $request, Post $post)
    {
        Comment::create([
            'is_approved' => false,
            'comment' => $request->comment,
            'post_id' => $post->id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with('status', __('The comment was :atrribute successfully!', ['atrribute' => __('submitted')]));
    }

}
