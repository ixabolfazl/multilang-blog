<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param User $user
     * @return void|bool
     */
    public function before(User $user)
    {
        if ($user->role == "Admin") {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Setting $Setting
     * @return mixed
     */
    public function view(User $user, Setting $Setting)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Setting $Setting
     * @return mixed
     */
    public function update(User $user, Setting $Setting)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Setting $Setting
     * @return mixed
     */
    public function delete(User $user, Setting $Setting)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Setting $Setting
     * @return mixed
     */
    public function restore(User $user, Setting $Setting)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Setting $Setting
     * @return mixed
     */
    public function forceDelete(User $user, Setting $Setting)
    {
        //
    }
}
