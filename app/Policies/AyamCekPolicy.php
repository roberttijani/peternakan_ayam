<?php

namespace App\Policies;

use App\Model\AyamCek;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AyamCekPolicy
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
        return $user->role == 'admin' || $user->role == 'petugas';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\AyamCek  $ayamCek
     * @return mixed
     */
    public function view(User $user, AyamCek $ayamCek)
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
        return $user->role == 'admin' || $user->role == 'petugas';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\AyamCek  $ayamCek
     * @return mixed
     */
    public function update(User $user, AyamCek $ayamCek)
    {
        return $user->role == 'admin' || $user->role == 'petugas';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\AyamCek  $ayamCek
     * @return mixed
     */
    public function delete(User $user, AyamCek $ayamCek)
    {
        return $user->role == 'admin' || $user->role == 'petugas';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\AyamCek  $ayamCek
     * @return mixed
     */
    public function restore(User $user, AyamCek $ayamCek)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\AyamCek  $ayamCek
     * @return mixed
     */
    public function forceDelete(User $user, AyamCek $ayamCek)
    {
        //
    }
}
