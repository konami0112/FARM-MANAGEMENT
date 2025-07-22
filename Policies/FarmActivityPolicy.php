<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\FarmActivity;
use Illuminate\Auth\Access\HandlesAuthorization;

class FarmActivityPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('activity.view');
    }

    public function view(Admin $admin, FarmActivity $farmActivity)
    {
        return $admin->hasPermissionTo('activity.view');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('activity.create');
    }

    public function update(Admin $admin, FarmActivity $farmActivity)
    {
        return $admin->hasPermissionTo('activity.edit');
    }

    public function delete(Admin $admin, FarmActivity $farmActivity)
    {
        return $admin->hasPermissionTo('activity.delete');
    }

    public function restore(Admin $admin, FarmActivity $farmActivity)
    {
        return $admin->hasPermissionTo('activity.delete');
    }

    public function forceDelete(Admin $admin, FarmActivity $farmActivity)
    {
        return $admin->hasPermissionTo('activity.delete');
    }
}
