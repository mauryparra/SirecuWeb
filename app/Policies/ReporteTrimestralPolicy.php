<?php

namespace App\Policies;

use App\User;
use App\ReporteTrimestral;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReporteTrimestralPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the reporteTrimestral.
     *
     * @param  \App\User  $user
     * @param  \App\ReporteTrimestral  $reporteTrimestral
     * @return mixed
     */
    public function view(User $user, ReporteTrimestral $reporteTrimestral)
    {
        //
    }

    /**
     * Determine whether the user can create reporteTrimestrals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the reporteTrimestral.
     *
     * @param  \App\User  $user
     * @param  \App\ReporteTrimestral  $reporteTrimestral
     * @return mixed
     */
    public function update(User $user, ReporteTrimestral $reporteTrimestral)
    {
        //
    }

    /**
     * Determine whether the user can delete the reporteTrimestral.
     *
     * @param  \App\User  $user
     * @param  \App\ReporteTrimestral  $reporteTrimestral
     * @return mixed
     */
    public function delete(User $user, ReporteTrimestral $reporteTrimestral)
    {
        return $user->hasRole('admin');
    }
}
