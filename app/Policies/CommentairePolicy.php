<?php

namespace App\Policies;

use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentairePolicy
{
    use HandlesAuthorization;

    public function before(user $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function view(User $user, Commentaire $commentaire)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if (Auth::user()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(User $user, Commentaire $commentaire)
    {
        return  $user->id === $commentaire->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function delete(User $user, Commentaire $commentaire)
    {
        if ($user->id === $commentaire->user_id || $user->id === $commentaire->post->user_id) {
            return  true;
        }
    }
}
