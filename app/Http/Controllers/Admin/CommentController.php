<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public $breadcrumbs = [
        'Dashboard' => 'admin.dashboard',
        'Comments' => 'admin.comments.index',
    ];

    /**
     * Display a listing of the comments.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs;
        $comments = Comment::orderBy('id', 'DESC')->with(['user', 'replies', 'post'])->withCount('replies')->paginate(15);
        return view('admin.comments.comments', compact(['breadcrumbs', 'comments']));
    }


    /**
     * Store a newly created comment in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Comment $comment)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'comment_id' => $comment->id,
            'post_id' => $comment->post->id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('admin.comments.index')
            ->with('status', __('The comment was :atrribute successfully!', ['atrribute' => __('replied')]));
    }

    /**
     * Display the specified comment.
     *
     * @param Comment $comment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $breadcrumbs = array_merge($this->breadcrumbs, ['Show Comment' => 'admin.comments.edit']);
        return view('admin.comments.show-comment', compact(['comment', 'breadcrumbs']));
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param Comment $comment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $breadcrumbs = array_merge($this->breadcrumbs, ['Edit Comment' => 'admin.comments.edit']);
        return view('admin.comments.edit-comment', compact(['comment', 'breadcrumbs']));
    }

    /**
     * Update the specified comment in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate(['comment' => 'required|string']);

        $comment->update(['comment' => $request->comment]);

        return redirect()->route('admin.comments.index')
            ->with('status', __('The comment was :atrribute successfully!', ['atrribute' => __('updated')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin\Comments $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comments)
    {
        //
    }
}
