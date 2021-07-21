<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{

    public function index()
    {
        Gate::authorize('viewAny', 'dashboard');
        $breadcrumbs = ['Dashboard' => ''];
        $users = User::latest()->take(5)->get();
        $users_count = User::count();
        $last_posts = Post::with(['user', 'categories']);
        $posts_orderby_views = Post::with(['user', 'categories']);
        $comments = Comment::latest()->with(['user', 'post', 'replies'])->withCount('replies');
        $category_count = Category::count();
        $deleted_posts = Post::onlyTrashed();


        if (auth()->user()->role == "Author") {
            $last_posts->where('user_id', auth()->user()->id);
            $posts_orderby_views->where('user_id', auth()->user()->id);

            $comments->whereHas('post', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            });

            $deleted_posts->where('user_id', auth()->user()->id);
        }

        $posts_count = $last_posts->count();
        $views = $last_posts->sum('view');
        $comments_count = $comments->count();

        $last_posts = $last_posts->latest()->take(5)->get();
        $posts_orderby_views = $posts_orderby_views->orderBy('view', 'desc')->take(5)->get();

        $comments = $comments->take(5)->get();
        $deleted_posts_count = $deleted_posts->count();

        return view('admin.dashboard', compact([
            'users', 'last_posts', 'comments', 'breadcrumbs', 'views', 'posts_orderby_views',
            'posts_count', 'comments_count', 'users_count', 'category_count', 'deleted_posts_count'
        ]));
    }
}
