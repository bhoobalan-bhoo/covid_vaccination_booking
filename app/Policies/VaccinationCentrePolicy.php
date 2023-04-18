<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VaccinationCentre;
use Illuminate\Auth\Access\Response;

class VaccinationCentrePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('viewAny vaccination_centres') or auth()->user()->hasRole('Super Admin')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, VaccinationCentre $vaccinationCentre): bool
    {
        if ($user->can('view vaccination_centres') or auth()->user()->hasRole('Super Admin')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->can('create vaccination_centres') or auth()->user()->hasRole('Super Admin')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, VaccinationCentre $vaccinationCentre): bool
    {
        if ($user->can('edit vaccination_centres') or auth()->user()->hasRole('Super Admin')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, VaccinationCentre $vaccinationCentre): bool
    {
        if ($user->can('delete vaccination_centres') or auth()->user()->hasRole('Super Admin')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, VaccinationCentre $vaccinationCentre): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, VaccinationCentre $vaccinationCentre): bool
    {
        //
    }
}
