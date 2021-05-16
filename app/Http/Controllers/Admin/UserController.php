<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $breadcrumbs = [
        'Dashboard' => 'admin.dashboard',
        'Users' => 'admin.users',
    ];

    /**
     * Display a listing of the Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs;
        $users = User::paginate(15);
        return view('admin.users.users', compact(['breadcrumbs', 'users']));
    }

    /**
     * Display a listing of Deleted Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $breadcrumbs = $this->breadcrumbs;
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
        //
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return redirect()->back()->with('status', 'hi');
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
        return redirect()->back()->with('status', 'hi');
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
        return redirect()->back()->with('status', 'hi');
    }

    /**
     * Change Status resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */

    public function changeStatus(User $user)
    {
        if ($user->status == 'enable') {
            $user->update([
                'status' => 'disable'
            ]);
        } else {
            $user->update([
                'status' => 'enable'
            ]);
        }
        return redirect()->back();
    }


}
