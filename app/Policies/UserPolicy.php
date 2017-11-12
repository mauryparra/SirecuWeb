<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can access index method.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->hasRole('admin');
    }


    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $userEdit
     * @return mixed
     */
    public function view(User $user, User $userEdit)
    {
        return $user->hasRole('admin') || $user->id == $userEdit->id;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $userEdit
     * @return mixed
     */
    public function update(User $user, User $userEdit)
    {
        return $user->hasRole('admin') || $user->id == $userEdit->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $userEdit
     * @return mixed
     */
    public function delete(User $user, User $userEdit)
    {
        return $user->hasRole('admin') || $user->id == $userEdit->id;
    }
}
