<?php

namespace App\Policies;

use App\Model\Kategori;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KategoriPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $user->role == 'admin';
    }


    public function view(User $user, Kategori $kategori)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role == 'admin';
    }


    public function update(User $user, Kategori $kategori)
    {
        return $user->role == 'admin';
    }


    public function delete(User $user, Kategori $kategori)
    {
        return $user->role == 'admin';
    }


    public function restore(User $user, Kategori $kategori)
    {
        //
    }


    public function forceDelete(User $user, Kategori $kategori)
    {
        //
    }
}
