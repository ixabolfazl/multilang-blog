<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AddCommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        //
    }

}
