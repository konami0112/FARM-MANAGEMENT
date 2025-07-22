<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Crop;
use Illuminate\Auth\Access\HandlesAuthorization;

class CropPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('crop.view');
    }

    public function view(Admin $admin, Crop $crop)
    {
        return $admin->hasPermissionTo('crop.view');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('crop.create');
    }

    public function update(Admin $admin, Crop $crop)
    {
        return $admin->hasPermissionTo('crop.edit');
    }

    public function delete(Admin $admin, Crop $crop)
    {
        return $admin->hasPermissionTo('crop.delete');
    }

    public function restore(Admin $admin, Crop $crop)
    {
        return $admin->hasPermissionTo('crop.delete');
    }

    public function forceDelete(Admin $admin, Crop $crop)
    {
        return $admin->hasPermissionTo('crop.delete');
    }
}
