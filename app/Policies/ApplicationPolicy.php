<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the consumer can view any user.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view-any applications');
    }

    /**
     * Determine whether the consumer can view a user.
     *
     * @param User $user
     * @param int  $leaveId
     *
     * @return bool
     */
    public function view(User $user, int $applicationId)
    {
        if ($user->id == $applicationId) {
            return true;
        }

        return $user->can('view applications');
    }

    /**
     * Determine whether the consumer can create users.
     *
     * @param User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create applications');
    }

    /**
     * Determine whether the consumer can apply for leave.
     *
     * @param User $user
     *
     * @return bool
     */
    public function accept(User $user, int $applicationId)
    {
        if ($user->id == $applicationId) {
            return true;
        }

        return $user->can('accept applications');
    }

    /**
     * Determine whether the consumer can apply for leave.
     *
     * @param User $user
     *
     * @return bool
     */
    public function approve(User $user, int $applicationId)
    {
        if ($user->id == $applicationId) {
            return true;
        }

        return $user->can('approve applications');
    }

    /**
     * Determine whether the consumer can apply for leave.
     *
     * @param User $user
     *
     * @return bool
     */
    public function confirm(User $user, int $applicationId)
    {
        if ($user->id == $applicationId) {
            return true;
        }

        return $user->can('confirm applications');
    }

    /**
     * Determine whether the consumer can update a user.
     *
     * @param User $user
     * @param int $leaveId
     *
     * @return bool
     */
    public function update(User $user, int $applicationId)
    {
        if ($user->id == $applicationId) {
            return true;
        }

        return $user->can('update applications');
    }

    /**
     * Determine whether the consumer can soft delete any user.
     *
     * @param User $user
     * @return bool
     */
    public function softDelete(User $user)
    {
        return $user->can('soft-delete applications');
    }

    /**
     * Determine whether the consumer can restore any user.
     *
     * @param \App\Models\User $user$consumer
     *
     * @return bool
     */
    public function restore(User $user)
    {
        return $user->can('restore applications');
    }

    /**
     * Determine whether the consumer can permanently delete any user.
     *
     * @param User $user
     * @return bool
     */
    public function forceDelete(User $user)
    {
        return $user->can('force-delete applications');
    }
}
