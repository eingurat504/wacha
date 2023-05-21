<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeaveTypePolicy
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
        return $user->can('view-any leave_types');
    }

    /**
     * Determine whether the consumer can view a user.
     *
     * @param User $user
     * @param int  $leaveTypeId
     *
     * @return bool
     */
    public function view(User $user, int $leaveTypeId)
    {
        if ($user->id == $leaveTypeId) {
            return true;
        }

        return $user->can('view leave_types');
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
        return $user->can('create leave_types');
    }

    /**
     * Determine whether the consumer can update a user.
     *
     * @param User $user
     * @param int $leaveTypeId
     *
     * @return bool
     */
    public function update(User $user, int $leaveTypeId)
    {
        if ($user->id == $leaveTypeId) {
            return true;
        }

        return $user->can('update leave_types');
    }

   

    /**
     * Determine whether the consumer can soft delete any user.
     *
     * @param User $user
     * @return bool
     */
    public function softDelete(User $user)
    {
        return $user->can('soft-delete leave_types');
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
        return $user->can('restore leave_types');
    }

    /**
     * Determine whether the consumer can permanently delete any user.
     *
     * @param User $user
     * @return bool
     */
    public function forceDelete(User $user)
    {
        return $user->can('force-delete leave_types');
    }
}
