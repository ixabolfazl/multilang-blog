<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddPostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public $breadcrumbs = [
        'Dashboard' => 'admin.dashboard',
        'Posts' => 'admin.posts.index',
    ];

    /**
     * Display a listing of the post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs;
        $posts = Post::orderBy('id', 'DESC')->with(['user', 'categories'])->paginate(15);
        return view('admin.posts.posts', compact(['breadcrumbs', 'posts']));
    }

    /**
     * Display a listing of Deleted Posts.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function trash()
    {
        $breadcrumbs = array_merge($this->breadcrumbs, ['Deleted Posts' => 'admin.posts.trash']);
        $posts = Post::onlyTrashed()->orderBy('deleted_at', 'desc')->with(['user', 'categories'])->paginate(15);
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
        $categories = Category::orderBy('id', 'DESC')->where('status', 'enable')->get();
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
     * Show the form for editing the specified post.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $breadcrumbs = $breadcrumbs = array_merge($this->breadcrumbs, ['Edit Post' => 'admin.posts.create']);
        $categories = Category::orderBy('id', 'DESC')->active()->get();
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
        $user = Post::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->back()->with('status', __('The post was :atrribute successfully!', ['atrribute' => __('restored')]));
    }


    /**
     * upload the image in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), ['upload' => 'image|max:1024',], [], ['upload' => __('Image')]);

        if ($validator->fails()) {
            return response(['error' => ['message' => $validator->errors()->first()]]);
        } elseif ($request->hasFile('upload') && $request->file('upload')->isValid()) {
            //upload image
            $fileName = strtolower(Str::random(10)) . time() . "." . $request->upload->extension();
            $request->upload->move(public_path('uploads/posts'), $fileName);
            $url = asset('uploads/posts/' . $fileName);
            return response(['url' => $url]);
        }
    }
}
