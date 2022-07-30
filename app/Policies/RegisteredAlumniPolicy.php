<?php

namespace App\Policies;

use App\Models\RegisteredAlumni;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegisteredAlumniPolicy
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
     * @param  \App\Models\RegisteredAlumni  $registeredAlumni
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RegisteredAlumni $registeredAlumni)
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
     * @param  \App\Models\RegisteredAlumni  $registeredAlumni
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RegisteredAlumni $registeredAlumni)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisteredAlumni  $registeredAlumni
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RegisteredAlumni $registeredAlumni)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisteredAlumni  $registeredAlumni
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RegisteredAlumni $registeredAlumni)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisteredAlumni  $registeredAlumni
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RegisteredAlumni $registeredAlumni)
    {
        //
    }
}
