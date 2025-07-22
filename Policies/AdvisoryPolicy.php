<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Advisory;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvisoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('advisory.view');
    }

    public function view(Admin $admin, Advisory $advisory)
    {
        return $admin->hasPermissionTo('advisory.view');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('advisory.create');
    }

    public function update(Admin $admin, Advisory $advisory)
    {
        return $admin->hasPermissionTo('advisory.edit');
    }

    public function delete(Admin $admin, Advisory $advisory)
    {
        return $admin->hasPermissionTo('advisory.delete');
    }

    public function restore(Admin $admin, Advisory $advisory)
    {
        return $admin->hasPermissionTo('advisory.delete');
    }

    public function forceDelete(Admin $admin, Advisory $advisory)
    {
        return $admin->hasPermissionTo('advisory.delete');
    }
}
