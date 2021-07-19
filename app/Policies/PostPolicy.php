<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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

        return $user->role == "Author";
    }

    /**
     * Determine whether the user can view trash models.
     *
     * @param User $user
     * @return mixed
     */
    public function trash(User $user)
    {
        return $user->role == "Author";
    }

    /**
     * Determine whether the user can view comments of models.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function comments(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == "Author";
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can changeStatus the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function status(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can upload-image.
     *
     * @param User $user
     * @return mixed
     */
    public function upload(User $user)
    {
        return $user->role == "Author";
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }
}
