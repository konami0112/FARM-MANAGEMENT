<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\MarketLinkage;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarketLinkagePolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('market.view');
    }

    public function view(Admin $admin, MarketLinkage $marketLinkage)
    {
        return $admin->hasPermissionTo('market.view');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('market.create');
    }

    public function update(Admin $admin, MarketLinkage $marketLinkage)
    {
        return $admin->hasPermissionTo('market.edit');
    }

    public function delete(Admin $admin, MarketLinkage $marketLinkage)
    {
        return $admin->hasPermissionTo('market.delete');
    }

    public function restore(Admin $admin, MarketLinkage $marketLinkage)
    {
        return $admin->hasPermissionTo('market.delete');
    }

    public function forceDelete(Admin $admin, MarketLinkage $marketLinkage)
    {
        return $admin->hasPermissionTo('market.delete');
    }
}
