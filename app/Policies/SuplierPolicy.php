<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Suplier;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuplierPolicy
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
     * @param  \App\Suplier  $suplier
     * @return mixed
     */
    public function view(User $user, Suplier $suplier)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Suplier  $suplier
     * @return mixed
     */
    public function update(User $user, Suplier $suplier)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Suplier  $suplier
     * @return mixed
     */
    public function delete(User $user, Suplier $suplier)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Suplier  $suplier
     * @return mixed
     */
    public function restore(User $user, Suplier $suplier)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Suplier  $suplier
     * @return mixed
     */
    public function forceDelete(User $user, Suplier $suplier)
    {
        //
    }
}
