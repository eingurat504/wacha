<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any permission.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view-any permissions');
    }

    /**
     * Determine whether the user can view a permission.
     *
     * @param \App\Models\User $user
     * @param int              $permissionId
     *
     * @return bool
     */
    public function view(User $user, int $permissionId)
    {
        // if ($user->permission_id == $permissionId) {
        //     return true;
        // }

        return $user->can('view permissions');
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create permissions');
    }

    /**
     * Determine whether the user can update a permission.
     *
     * @param \App\Models\User $user
     * @param int              $permissionId
     *
     * @return bool
     */
    public function update(User $user, int $permissionId)
    {
        // if ($user->id == $permissionId) {
        //     return true;
        // }

        return $user->can('update permissions');
    }

    /**
     * Determine whether the user can delete a permission.
     *
     * @param \App\Models\User $user
     * @param int              $permissionId
     *
     * @return bool
     */
    public function delete(User $user, $permissionId)
    {
        return $user->can('delete permissions');
    }
}
