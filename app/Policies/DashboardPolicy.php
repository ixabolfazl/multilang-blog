<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DashboardPolicy
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
     * Determine whether the user can view Dashboard.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->role == "Author") {
            return true;
        }
    }
}
