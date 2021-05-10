<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the consumer can view any user.
     *
     * @param \App\Models\User $consumer
     *
     * @return bool
     */
    public function viewAny(User $consumer)
    {
        return $consumer->can('view-any users');
    }

    /**
     * Determine whether the consumer can view a user.
     *
     * @param \App\Models\User $consumer
     * @param int              $userId
     *
     * @return bool
     */
    public function view(User $consumer, int $userId)
    {
        if ($consumer->id == $userId) {
            return true;
        }

        return $consumer->can('view users');
    }

    /**
     * Determine whether the consumer can create users.
     *
     * @param \App\Models\User $consumer
     *
     * @return bool
     */
    public function create(User $consumer)
    {
        return $consumer->can('create users');
    }

    /**
     * Determine whether the consumer can update a user.
     *
     * @param \App\Models\User $consumer
     * @param int              $userId
     *
     * @return bool
     */
    public function update(User $consumer, int $userId)
    {
        if ($consumer->id == $userId) {
            return true;
        }

        return $consumer->can('update users');
    }

    /**
     * Determine whether the consumer can soft delete any user.
     *
     * @param \App\Models\User $consumer
     *
     * @return bool
     */
    public function softDelete(User $consumer)
    {
        return $consumer->can('soft-delete users');
    }

    /**
     * Determine whether the consumer can restore any user.
     *
     * @param \App\Models\User $consumer
     *
     * @return bool
     */
    public function restore(User $consumer)
    {
        return $consumer->can('restore users');
    }

    /**
     * Determine whether the consumer can permanently delete any user.
     *
     * @param \App\Models\User $consumer
     *
     * @return bool
     */
    public function forceDelete(User $consumer)
    {
        return $consumer->can('force-delete users');
    }
}
