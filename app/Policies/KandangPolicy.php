<?php

namespace App\Policies;

use App\Model\Kandang;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KandangPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Kandang  $kandang
     * @return mixed
     */
    public function view(User $user, Kandang $kandang)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Kandang  $kandang
     * @return mixed
     */
    public function update(User $user, Kandang $kandang)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Kandang  $kandang
     * @return mixed
     */
    public function delete(User $user, Kandang $kandang)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Kandang  $kandang
     * @return mixed
     */
    public function restore(User $user, Kandang $kandang)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Kandang  $kandang
     * @return mixed
     */
    public function forceDelete(User $user, Kandang $kandang)
    {
        //
    }
}
