<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Penarikan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PenarikanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User|Admin $user): bool
    {
        return $user->can('view_any_penarikan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User|Admin $user, Penarikan $penarikan): bool
    {
        return $user->can('view_penarikan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User|Admin $user): bool
    {
        return $user->can('create_penarikan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User|Admin $user, Penarikan $penarikan): bool
    {
        return $user->can('update_penarikan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User|Admin $user, Penarikan $penarikan): bool
    {
        return $user->can('delete_penarikan');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User|Admin $user): bool
    {
        return $user->can('delete_any_penarikan');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User|Admin $user, Penarikan $penarikan): bool
    {
        return $user->can('force_delete_penarikan');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User|Admin $user): bool
    {
        return $user->can('force_delete_any_penarikan');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User|Admin $user, Penarikan $penarikan): bool
    {
        return $user->can('restore_penarikan');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User|Admin $user): bool
    {
        return $user->can('restore_any_penarikan');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User|Admin $user, Penarikan $penarikan): bool
    {
        return $user->can('replicate_penarikan');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User|Admin $user): bool
    {
        return $user->can('reorder_penarikan');
    }
}
