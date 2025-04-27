<?php

namespace App\Policies;

use App\Models\Startup;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Validation\Rules\Exists;

class StartupPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Startup $startup): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'entrepreneur' && !$user->startup->exists();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Startup $startup): bool
    {
        return $user->role === 'entrepreneur' && $user->startup = $startup;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Startup $startup): bool
    {
        return $user->role === 'entrepreneur' && $user->startup->exists() && $user->startup = $startup;
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Startup $startup): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Startup $startup): bool
    {
        return false;
    }
}
