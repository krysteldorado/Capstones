<?php

namespace App\Policies;

use App\Models\AlumniRegister;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlumniRegisterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->is_alumni;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AlumniRegister  $alumniRegister
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AlumniRegister $alumniRegister)
    {
        return $user->is_alumni;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->is_alumni;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AlumniRegister  $alumniRegister
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AlumniRegister $alumniRegister)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AlumniRegister  $alumniRegister
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AlumniRegister $alumniRegister)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AlumniRegister  $alumniRegister
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AlumniRegister $alumniRegister)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AlumniRegister  $alumniRegister
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AlumniRegister $alumniRegister)
    {
        //
    }
}
