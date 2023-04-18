<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VaccinationBookedLogs;
use Illuminate\Auth\Access\Response;

class VaccinationBookedLogsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('viewAny vaccination_booked_logs')or auth()->user()->hasRole('Super Admin')  ) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, VaccinationBookedLogs $vaccinationBookedLogs): bool
    {
        if ($user->can('view vaccination_booked_logs') or auth()->user()->hasRole('Super Admin')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->can('create vaccination_booked_logs') or auth()->user()->hasRole('Super Admin')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, VaccinationBookedLogs $vaccinationBookedLogs): bool
    {
        if ($user->can('edit vaccination_booked_logs') or auth()->user()->hasRole('Super Admin')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, VaccinationBookedLogs $vaccinationBookedLogs): bool
    {
        if ($user->can('delete vaccination_booked_logs') or auth()->user()->hasRole('Super Admin')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, VaccinationBookedLogs $vaccinationBookedLogs): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, VaccinationBookedLogs $vaccinationBookedLogs): bool
    {
        //
    }
}
