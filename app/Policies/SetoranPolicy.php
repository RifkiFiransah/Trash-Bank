<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use App\Models\Setoran;
use Illuminate\Auth\Access\HandlesAuthorization;

class SetoranPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User|Admin $user): bool
    {
        return $user->can('view_any_setoran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User|Admin $user, Setoran $setoran): bool
    {
        return $user->can('view_setoran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User|Admin $user): bool
    {
        return $user->can('create_setoran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User|Admin $user, Setoran $setoran): bool
    {
        return $user->can('update_setoran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User|Admin $user, Setoran $setoran): bool
    {
        return $user->can('delete_setoran');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User|Admin $user): bool
    {
        return $user->can('delete_any_setoran');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User|Admin $user, Setoran $setoran): bool
    {
        return $user->can('force_delete_setoran');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User|Admin $user): bool
    {
        return $user->can('force_delete_any_setoran');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User|Admin $user, Setoran $setoran): bool
    {
        return $user->can('restore_setoran');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User|Admin $user): bool
    {
        return $user->can('restore_any_setoran');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User|Admin $user, Setoran $setoran): bool
    {
        return $user->can('replicate_setoran');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User|Admin $user): bool
    {
        return $user->can('reorder_setoran');
    }
}
