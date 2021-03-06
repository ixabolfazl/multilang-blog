<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddPostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public $breadcrumbs = [
        'Dashboard' => 'admin.dashboard',
        'Posts' => 'admin.posts.index',
    ];

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the post.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $user = auth()->user();
        $postsQuery = Post::latest()->with(['user', 'categories']);
        if (isset($request->search)) {
            $postsQuery->whereTranslationLike('title', "%{$request->search}%");
        }
        if ($user->role == "Author") {
            $postsQuery->where('user_id', $user->id);
        }
        $posts = $postsQuery->paginate(15);
        return view('admin.posts.posts', compact(['breadcrumbs', 'posts']));
    }

    /**
     * Display a listing of Deleted Posts.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function trash()
    {
        Gate::authorize('trash', Post::class);
        $breadcrumbs = array_merge($this->breadcrumbs, ['Deleted Posts' => 'admin.posts.trash']);
        $posts = Post::onlyTrashed()->orderBy('deleted_at', 'desc')
            ->with(['user', 'categories'])->where('user_id', auth()->user()->id)->paginate(15);
        return view('admin.posts.deleted-post', compact(['breadcrumbs', 'posts']));

    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $breadcrumbs = array_merge($this->breadcrumbs, ['New Post' => 'admin.posts.create']);
        $categories = Category::latest()->where('status', 'enable')->get();
        return view('admin.posts.new-post', compact(['breadcrumbs', 'categories']));
    }

    /**
     * Store a newly created post in storage.
     *
     * @param AddPostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddPostRequest $request)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $base_name = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileName = $base_name . '.' . $ext;
            while (File::exists(public_path('uploads/posts/image/' . $fileName))) {
                $fileName = strtolower(Str::random(3)) . '-' . $fileName;
            }
            $request->image->move(public_path('uploads/posts/image'), $fileName);
        }

        // remove null fields in languages
        $request = $this->removeNullFields($request);

        $post = Post::create(array_merge($request->all(), ['user_id' => auth()->user()->id, 'image' => $fileName]));

        $post->categories()->sync($request->category);

        return redirect()->route('admin.posts.index')->with('status', __('The post was :atrribute successfully!', ['atrribute' => __('created')]));

    }

    /**
     * Display the specified post.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified post.
     *
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function comments(Request $request, Post $post)
    {
        Gate::authorize('forceDelete', $post);
        $breadcrumbs = $breadcrumbs = array_merge($this->breadcrumbs, [$post->title => '']);
        $query = $post->comments()->latest()->with(['user', 'replies', 'post'])->withCount('replies');
        if (isset($request->approved)) {
            if ($request->approved == 1) {
                $query->where('is_approved', 1);
            } elseif ($request->approved == 0) {
                $query->where('is_approved', 0);
            }
        }
        $comments = $query->paginate(15);
        return view('admin.posts.post-comments', compact(['breadcrumbs', 'comments', 'post']));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $breadcrumbs = $breadcrumbs = array_merge($this->breadcrumbs, ['Edit Post' => 'admin.posts.create']);
        $categories = Category::latest()->active()->get();
        $postCategories = $post->categories()->get()->pluck('id')->toArray();
        return view('admin.posts.edit-post', compact(['post', 'breadcrumbs', 'categories', 'postCategories']));
    }

    /**
     * Update the specified post in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            //remove old image
            if (File::exists(public_path($post->image))) {
                File::delete(public_path($post->image));
            }

            $base_name = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileName = $base_name . '.' . $ext;
            while (File::exists(public_path('uploads/posts/image/' . $fileName))) {
                $fileName = strtolower(Str::random(3)) . '-' . $fileName;
            }
            $request->image->move(public_path('uploads/posts/image'), $fileName);
        }

        // remove null fields in languages
        $request = $this->removeNullFields($request);

        $post->update(array_merge($request->all(), isset($fileName) ? ['image' => $fileName] : []));

        $post->categories()->sync($request->category);

        return redirect()->route('admin.posts.index')->with('status', __('The post was :atrribute successfully!', ['atrribute' => __('updated')]));
    }

    /**
     * Remove the specified post from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('status', __('The post was :atrribute successfully!', ['atrribute' => __('deleted')]));
    }

    /**
     * Force Delete Post from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function delete($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        Gate::authorize('forceDelete', $post);
        //remove image
        if (File::exists(public_path($post->image))) {
            File::delete(public_path($post->image));
        }
        $post->forceDelete();
        return redirect()->back()->with('status', __('The post was :atrribute successfully!', ['atrribute' => __('deleted')]));
    }

    /**
     * Restore Deleted Post.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        Gate::authorize('restore', $post);
        $post->restore();
        return redirect()->back()->with('status', __('The post was :atrribute successfully!', ['atrribute' => __('restored')]));
    }

    /**
     * Change Status user from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */

    public function changeStatus(Post $post)
    {
        Gate::authorize('status', $post);

        $status = $post->status == 'Enable' ? 'Disable' : 'Enable';

        $post->update(['status' => $status]);

        return redirect()->back()
            ->with('status', __('The status of :name was :atrribute successfully!',
                ['atrribute' => __($post->status == 'Enable' ? 'enabled' : 'disabled'), 'name' => __('post')]));
    }


    /**
     * upload the image in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        Gate::authorize('upload', Post::class);
        $validator = Validator::make($request->all(), ['upload' => 'image|max:1024',], [], ['upload' => __('Image')]);

        if ($validator->fails()) {
            return response(['error' => ['message' => $validator->errors()->first()]]);
        } elseif ($request->hasFile('upload') && $request->file('upload')->isValid()) {

            $base_name = pathinfo($request->upload->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileName = $base_name . '.' . $ext;
            while (File::exists(public_path('uploads/posts/' . $fileName))) {
                $fileName = strtolower(Str::random(3)) . '-' . $fileName;
            }
            $request->upload->move(public_path('uploads/posts'), $fileName);

            $url = asset('uploads/posts/' . $fileName);
            return response(['url' => $url]);
        }
    }
}
