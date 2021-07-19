<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public $breadcrumbs = [
        'Dashboard' => 'admin.dashboard',
        'Users' => 'admin.users.index',
    ];


    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the Users.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs;
        $users = User::latest()->paginate(15);
        return view('admin.users.users', compact(['breadcrumbs', 'users']));
    }

    /**
     * Display a listing of Deleted Users.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function trash()
    {
        Gate::authorize('trash', User::class);
        $breadcrumbs = array_merge($this->breadcrumbs, ['Deleted Users' => 'admin.users.trash']);
        $users = User::onlyTrashed()->paginate(15);
        return view('admin.users.deleted', compact(['breadcrumbs', 'users']));
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $breadcrumbs = array_merge($this->breadcrumbs, ['New User' => 'admin.users.create']);
        return view('admin.users.new-user', compact(['breadcrumbs']));
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param AddUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddUserRequest $request)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $fileName = strtolower(Str::random(10)) . time() . "." . $request->image->extension();
            $request->image->move(public_path('uploads/profile'), $fileName);
            $request->image = $fileName;
        }
        $request->password = Hash::make($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => isset($fileName) ? $fileName : Null,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.users.index')->with('status', __('The user was :atrribute successfully!', ['atrribute' => __('created')]));
    }

    /**
     * Display Users.
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function show(User $user, Request $request)
    {
        if ($user->Role == "User") {
            abort(404);
        }

        $breadcrumbs = array_merge($this->breadcrumbs, ['User' => '', $user->name => '']);
        $postsQuery = Post::latest()->with(['user', 'categories'])->where('user_id', $user->id);
        if (isset($request->search)) {
            $postsQuery->whereTranslationLike('title', "%{$request->search}%");
        }
        $posts = $postsQuery->paginate(15);
        return view('admin.users.user-posts', compact(['breadcrumbs', 'posts', 'user']));

    }

    /**
     * Show the form for editing Users.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $breadcrumbs = array_merge($this->breadcrumbs, ['Edit User' => 'admin.users.edit-user']);
        return view('admin.users.edit-user', compact(['breadcrumbs', 'user']));
    }

    /**
     * Update Users in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {

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
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => isset($fileName) ? $fileName : Null,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]));
        return redirect()->route('admin.users.index')
            ->with('status', __('The user was :atrribute successfully!', ['atrribute' => __('updated')]));
    }

    /**
     * Soft Delete Users from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('status', __('The user was :atrribute successfully!', ['atrribute' => __('deleted')]));
    }


    /**
     * Force Delete Users from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function delete($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        Gate::authorize('forceDelete', $user);
        if (File::exists(public_path($user->image))) {
            File::delete(public_path($user->image));
        }
        $user->forceDelete();
        return redirect()->back()->with('status', __('The user was :atrribute successfully!', ['atrribute' => __('deleted')]));
    }

    /**
     * Restore Deleted Users.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function restore($id)
    {

        $user = User::withTrashed()->findOrFail($id);
        Gate::authorize('restore', $user);
        $user->restore();
        return redirect()->back()->with('status', __('The user was :atrribute successfully!', ['atrribute' => __('restored')]));
    }

    /**
     * Change Status user from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */

    public function changeStatus(User $user)
    {
        Gate::authorize('status', User::class);
        $status = $user->status == 'Enable' ? 'Disable' : 'Enable';

        $user->update(['status' => $status]);

        return redirect()->back()
            ->with('status', __('The status of :name was :atrribute successfully!',
                ['atrribute' => __($user->status == 'Enable' ? 'enabled' : 'disabled'), 'name' => __('user')]));
    }


    /**
     * Remove Image from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|void
     */

    public function removeImage(User $user)
    {
        Gate::authorize('removeImage', $user);
        if ($user->image != Null && File::exists(public_path($user->image))) {
            File::delete(public_path($user->image));
            $user->update(['image' => Null]);
            return redirect()->back()
                ->with('status', __('The image of user was deleted successfully!',));
        }
        return abort(404);
    }


}
