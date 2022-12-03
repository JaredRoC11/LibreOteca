<?php

namespace App\Policies;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class libroPolicy
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
        //No necesario 
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Libro $libro)
    {
        //NO necesario
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->id == '1' and $user->email == 'admin@admin.com';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Libro $libro)
    {
        return $user->id == '1' and $user->email == 'admin@admin.com';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Libro $libro)
    {
        return $user->id == '1' and $user->email == 'admin@admin.com';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Libro $libro)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Libro $libro)
    {
        //
    }
}
