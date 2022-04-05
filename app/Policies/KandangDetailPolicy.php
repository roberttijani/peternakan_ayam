<?php

namespace App\Policies;

use App\Model\KandangDetail;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KandangDetailPolicy
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
     * @param  \App\KandangDetail  $kandangDetail
     * @return mixed
     */
    public function view(User $user, KandangDetail $kandangDetail)
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
     * @param  \App\KandangDetail  $kandangDetail
     * @return mixed
     */
    public function update(User $user, KandangDetail $kandangDetail)
    {
        return $user->role == 'admin' || $user->role == 'petugas';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\KandangDetail  $kandangDetail
     * @return mixed
     */
    public function delete(User $user, KandangDetail $kandangDetail)
    {
        return $user->role == 'admin' || $user->role == 'petugas';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\KandangDetail  $kandangDetail
     * @return mixed
     */
    public function restore(User $user, KandangDetail $kandangDetail)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\KandangDetail  $kandangDetail
     * @return mixed
     */
    public function forceDelete(User $user, KandangDetail $kandangDetail)
    {
        //
    }
}
