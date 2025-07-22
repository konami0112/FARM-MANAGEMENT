<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Livestock;
use Illuminate\Auth\Access\HandlesAuthorization;

class LivestockPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('livestock.view');
    }

    public function view(Admin $admin, Livestock $livestock)
    {
        return $admin->hasPermissionTo('livestock.view');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('livestock.create');
    }

    public function update(Admin $admin, Livestock $livestock)
    {
        return $admin->hasPermissionTo('livestock.edit');
    }

    public function delete(Admin $admin, Livestock $livestock)
    {
        return $admin->hasPermissionTo('livestock.delete');
    }

    public function restore(Admin $admin, Livestock $livestock)
    {
        return $admin->hasPermissionTo('livestock.delete');
    }

    public function forceDelete(Admin $admin, Livestock $livestock)
    {
        return $admin->hasPermissionTo('livestock.delete');
    }
}
