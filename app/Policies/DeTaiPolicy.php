<?php

namespace App\Policies;

use App\Models\Admin\DeTai;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeTaiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any de tais.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the de tai.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Admin\DeTai  $deTai
     * @return mixed
     */
    public function view(User $user, DeTai $deTai)
    {

        return true;
    }

    /**
     * Determine whether the user can create de tais.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the de tai.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Admin\DeTai  $deTai
     * @return mixed
     */
    public function update(User $user, DeTai $deTai)
    {
        return $user->id == $deTai->user_id;
    }

    /**
     * Determine whether the user can delete the de tai.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Admin\DeTai  $deTai
     * @return mixed
     */
    public function delete(User $user, DeTai $deTai)
    {
        return $user->id == $deTai->user_id;
    }

    /**
     * Determine whether the user can restore the de tai.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Admin\DeTai  $deTai
     * @return mixed
     */
    public function restore(User $user, DeTai $deTai)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the de tai.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Admin\DeTai  $deTai
     * @return mixed
     */
    public function forceDelete(User $user, DeTai $deTai)
    {
        //
    }
}
