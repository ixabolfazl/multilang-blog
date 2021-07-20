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
        $posts = Post::latest()->with(['user', 'categories'])->take(5)->get();
        $posts_count = Post::count();
        $comments = Comment::latest()->with(['user', 'post', 'replies'])->withCount('replies')->take(5)->get();
        $comments_count = Comment::count();
        $category_count = Category::count();
        $deleted_posts_count = Post::onlyTrashed()->count();
        return view('admin.dashboard', compact([
            'users', 'posts', 'comments', 'breadcrumbs',
            'posts_count', 'comments_count', 'users_count', 'category_count', 'deleted_posts_count'
        ]));
    }
}
