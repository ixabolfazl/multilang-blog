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
        $posts = Post::latest()->with(['user', 'categories']);
        $comments = Comment::latest()->with(['user', 'post', 'replies'])->withCount('replies');
        $category_count = Category::count();
        $deleted_posts = Post::onlyTrashed();


        if (auth()->user()->role == "Author") {
            $posts->where('user_id', auth()->user()->id);

            $comments->whereHas('post', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            });

            $deleted_posts->where('user_id', auth()->user()->id);
        }

        $posts_count = $posts->count();
        $posts = $posts->take(5)->get();
        $comments_count = $comments->count();
        $comments = $comments->take(5)->get();
        $deleted_posts_count = $deleted_posts->count();

        return view('admin.dashboard', compact([
            'users', 'posts', 'comments', 'breadcrumbs',
            'posts_count', 'comments_count', 'users_count', 'category_count', 'deleted_posts_count'
        ]));
    }
}
