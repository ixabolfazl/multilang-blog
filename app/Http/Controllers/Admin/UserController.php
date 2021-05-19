<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public $breadcrumbs = [
        'Dashboard' => 'admin.dashboard',
        'Users' => 'admin.users.index',
    ];

    /**
     * Display a listing of the Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs;
        $users = User::orderBy('id', 'DESC')->paginate(15);
        return view('admin.users.users', compact(['breadcrumbs', 'users']));
    }

    /**
     * Display a listing of Deleted Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $breadcrumbs = array_merge($this->breadcrumbs, ['Deleted Users' => 'admin.users.trash']);
        $users = User::onlyTrashed()->paginate(15);
        return view('admin.users.deleted', compact(['breadcrumbs', 'users']));
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = array_merge($this->breadcrumbs, ['New User' => 'admin.users.create']);
        return view('admin.users.new-user', compact(['breadcrumbs']));
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param \Illuminate\Http\Request $request
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing Users.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update Users in storage.
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
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */

    public function delete($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->back()->with('status', __('The user was :atrribute successfully!'), ['atrribute' => __('deleted')]);
    }

    /**
     * Restore Deleted Users.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->back()->with('status', __('The user was :atrribute successfully!', ['atrribute' => __('restored')]));
    }

    /**
     * Change Status resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */

    public function changeStatus(User $user)
    {
        if ($user->status == 'Enable') {
            $user->update([
                'status' => 'Disable'
            ]);
        } else {
            $user->update([
                'status' => 'Enable'
            ]);
        }
        return redirect()->back()
            ->with('status', __('The status of :name was :atrribute successfully!',
                ['atrribute' => __($user->status == 'Enable' ? 'enabled' : 'disabled'),
                    'name' => __('user')]));
    }


}
