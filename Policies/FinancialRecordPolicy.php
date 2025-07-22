<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\FinancialRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class FinancialRecordPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('financial.view');
    }

    public function view(Admin $admin, FinancialRecord $financialRecord)
    {
        return $admin->hasPermissionTo('financial.view');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('financial.create');
    }

    public function update(Admin $admin, FinancialRecord $financialRecord)
    {
        return $admin->hasPermissionTo('financial.edit');
    }

    public function delete(Admin $admin, FinancialRecord $financialRecord)
    {
        return $admin->hasPermissionTo('financial.delete');
    }

    public function restore(Admin $admin, FinancialRecord $financialRecord)
    {
        return $admin->hasPermissionTo('financial.delete');
    }

    public function forceDelete(Admin $admin, FinancialRecord $financialRecord)
    {
        return $admin->hasPermissionTo('financial.delete');
    }
}
