<?php

namespace App\Policies;

use App\Models\AvailableTimings;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AvailableTimingsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('viewAny available_timings')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AvailableTimings $availableTimings): bool
    {
        if ($user->can('view available_timings')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->can('create available_timings')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AvailableTimings $availableTimings): bool
    {
        if ($user->can('edit available_timings')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AvailableTimings $availableTimings): bool
    {
        if ($user->can('delete available_timings')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AvailableTimings $availableTimings): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AvailableTimings $availableTimings): bool
    {
        return true;
    }
}
