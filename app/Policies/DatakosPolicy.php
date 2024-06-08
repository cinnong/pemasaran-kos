<?php

namespace App\Policies;

use App\Models\User;
use App\Models\datakos;
use Illuminate\Auth\Access\HandlesAuthorization;

class DatakosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\datakos  $datakos
     * @return bool
     */
    public function view(User $user, datakos $datakos)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\datakos  $datakos
     * @return bool
     */
    public function update(User $user, datakos $datakos)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\datakos  $datakos
     * @return bool
     */
    public function delete(User $user, datakos $datakos)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\datakos  $datakos
     * @return bool
     */
    public function restore(User $user, datakos $datakos)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\datakos  $datakos
     * @return bool
     */
    public function forceDelete(User $user, datakos $datakos)
    {
        return true;
    }
}

