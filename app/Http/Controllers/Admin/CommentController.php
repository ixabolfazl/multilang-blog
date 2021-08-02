<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{

    public $breadcrumbs = [
        'Dashboard' => 'admin.dashboard',
        'Comments' => 'admin.comments.index',
    ];

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * Display a listing of the comments.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $query = Comment::latest()->with(['user', 'replies', 'post'])->withCount('replies');
        if (isset($request->approved)) {
            if ($request->approved == 1) {
                $query->where('is_approved', 1);
            } elseif ($request->approved == 0) {
                $query->where('is_approved', 0);
            }
        }
        if(auth()->user()->role=="Author"){
            $query->whereHas('post', function($query){
                return $query->where('user_id',auth()->user()->id);
            });

        }
        $comments = $query->paginate(15);
        return view('admin.comments.comments', compact(['breadcrumbs', 'comments']));
    }


    /**
     * Store a replay for comment in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replay(Request $request, Comment $comment)
    {
        Gate::authorize('replay', $comment);
        $request->validate([
            'comment' => 'required|string',
        ]);

        Comment::create([
            'is_approved' => true,
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
     * Remove the specified comment from storage.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('status', __('The comment was :atrribute successfully!', ['atrribute' => __('deleted')]));
    }


    /**
     * Change Status Ctegory from storage.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus(Comment $comment)
    {
        Gate::authorize('status', $comment);

        $status = !$comment->is_approved;

        $comment->update(['is_approved' => $status]);

        return redirect()->back()
            ->with('status', __('The status of :name was :atrribute successfully!',
                ['atrribute' => __($comment->is_approved ? 'approved' : 'unapproved'), 'name' => __('Comment')]));
    }
}
