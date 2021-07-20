<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    public $breadcrumbs = [
        'Dashboard' => 'admin.dashboard',
        'Profile' => '',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('viewAny', 'profile');
        $user = auth()->user();
        $breadcrumbs = $this->breadcrumbs;
        return view('admin.users.profile', compact(['user', 'breadcrumbs']));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        Gate::authorize('update', 'profile');
        $user = auth()->user();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //upload new image
            $fileName = strtolower(Str::random(10)) . time() . "." . $request->image->extension();
            $request->image->move(public_path('uploads/profile'), $fileName);
            //remove last image
            if ($user->image != Null && File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
        }

        $user->update(array_filter([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => isset($fileName) ? $fileName : Null,
            'password' => isset($request->password) ? bcrypt($request->password) : Null,
        ]));
        return redirect()->back()
            ->with('status', __('The user was :atrribute successfully!', ['atrribute' => __('updated')]));
    }


}
