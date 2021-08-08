<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show()
    {
        $posts = Post::active()->latest()->paginate(10);
        $topPosts = Post::active()->orderBy('view', 'desc')->limit(5)->get();
        $setting = Setting::where('lang', app()->getLocale())->first();
        //seo
        SEOTools::setTitle(__('Home'));
        SEOTools::setDescription($setting->description);
        SEOTools::jsonLd()->addImage(asset($setting->logo_url));

        return view('app.index', compact(['posts', 'topPosts']));


    }
}
