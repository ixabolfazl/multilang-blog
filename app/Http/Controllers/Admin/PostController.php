<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $posts = Post::orderBy('id', 'DESC')->with('user')->paginate(15);
        return view('admin.posts.posts', compact(['breadcrumbs', 'posts']));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified post in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified post from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * upload the image in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return response
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
