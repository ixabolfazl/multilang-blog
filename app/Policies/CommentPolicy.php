<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return mixed
     */
    public function view(User $user, Comment $comment)
    {
        if($user->role == "Author") {
            return $user->id==$comment->post->user_id;
        }
    }

    /**
     * Determine whether the user can replay models.
     *
     * @param User $user
     * @param Comment $comment
     * @return mixed
     */
    public function replay(User $user,Comment $comment)
    {
        if($user->role == "Author") {
            return $user->id==$comment->post->user_id;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        if($user->role == "Author") {
            return $user->id==$comment->post->user_id;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        if($user->role == "Author") {
            return $user->id==$comment->post->user_id;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return mixed
     */
    public function restore(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return mixed
     */
    public function forceDelete(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can changeStatus the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return mixed
     */
    public function status(User $user, Comment $comment)
    {
        if($user->role == "Author") {
            return $user->id==$comment->post->user_id;
        }
    }
}
