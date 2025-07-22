<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Farm;
use Illuminate\Auth\Access\HandlesAuthorization;

class FarmPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('farm.view');
    }

    public function view(Admin $admin, Farm $farm)
    {
        return $admin->hasPermissionTo('farm.view');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('farm.create');
    }

    public function update(Admin $admin, Farm $farm)
    {
        return $admin->hasPermissionTo('farm.edit');
    }

    public function delete(Admin $admin, Farm $farm)
    {
        return $admin->hasPermissionTo('farm.delete');
    }
}
