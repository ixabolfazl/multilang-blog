<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ShowUserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $posts = $user->posts()->active()->latest()->paginate(10);
        //breadcrumb
        $breadcrumbs = [__('Users') => 'home', $user->name => ''];

        //seo
        SEOTools::setTitle($user->name);
        SEOTools::opengraph()->addProperty('type', 'users');
        SEOTools::jsonLd()->addImage(asset($user->image));

        return view('app.author', compact(['user', 'posts', 'breadcrumbs']));
    }


}
