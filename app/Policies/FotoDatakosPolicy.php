<?php

namespace App\Policies;

use App\Models\User;
use App\Models\foto_datakos;
use Illuminate\Auth\Access\HandlesAuthorization;

class FotoDatakosPolicy
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
        return true; // Modify this based on your authorization logic
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\foto_datakos  $fotoDatakos
     * @return bool
     */
    public function view(User $user, foto_datakos $fotoDatakos)
    {
        return true; // Modify this based on your authorization logic
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return true; // Modify this based on your authorization logic
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\foto_datakos  $fotoDatakos
     * @return bool
     */
    public function update(User $user, foto_datakos $fotoDatakos)
    {
        return true; // Modify this based on your authorization logic
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\foto_datakos  $fotoDatakos
     * @return bool
     */
    public function delete(User $user, foto_datakos $fotoDatakos)
    {
        return true; // Modify this based on your authorization logic
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\foto_datakos  $fotoDatakos
     * @return bool
     */
    public function restore(User $user, foto_datakos $fotoDatakos)
    {
        return true; // Modify this based on your authorization logic
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\foto_datakos $fotoDatakos
     * @return bool
     */
    public function forceDelete(User $user, foto_datakos $fotoDatakos)
    {
        return true; // Modify this based on your authorization logic
    }
}
