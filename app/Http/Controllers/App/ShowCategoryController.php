<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ShowCategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $topPosts = $category->posts()->active()->orderBy('view', 'desc')->limit(5)->get();
        $breadcrumbs = [__('Categories') => 'home', $category->name => ''];
        $posts = $category->posts()->active()->latest()->paginate(10);

        //seo
        //seo
        SEOTools::setTitle($category->name);
        SEOTools::setDescription($category->meta);
        SEOTools::opengraph()->addProperty('type', 'categorys');

        return view('app.category', compact(['category', 'breadcrumbs', 'topPosts', 'posts']));


    }

}
