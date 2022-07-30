<?php

namespace App\Policies;

use App\Models\AlumniTracer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlumniTracerPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AlumniTracer  $alumniTracer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AlumniTracer $alumniTracer)
    {
        //
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
     * @param  \App\Models\AlumniTracer  $alumniTracer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AlumniTracer $alumniTracer)
    {
        //
    }

    public function submittedThisYear(User $user)
    {
        return !$user->alumni_tracers()
            ->whereYear('traced_at', now()->year)
            ->exists();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AlumniTracer  $alumniTracer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AlumniTracer $alumniTracer)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AlumniTracer  $alumniTracer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AlumniTracer $alumniTracer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AlumniTracer  $alumniTracer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AlumniTracer $alumniTracer)
    {
        //
    }
}
