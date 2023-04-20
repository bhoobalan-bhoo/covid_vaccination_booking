<?php

namespace App\Policies;

use App\Models\Slots;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SlotsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('viewAny slots')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Slots $slots): bool
    {
        if ($user->can('view slots')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->can('create slots')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Slots $slots): bool
    {
        if ($user->can('edit slots')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Slots $slots): bool
    {
        if ($user->can('delete slots')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Slots $slots): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Slots $slots): bool
    {
        return true;
    }
}
