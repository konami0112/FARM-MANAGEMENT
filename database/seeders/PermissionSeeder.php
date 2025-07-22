<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions with admin guard
$permissions = [
     
    // Farm Permissions
    ['name' => 'farm.view', 'group' => 'farm', 'guard_name' => 'admin'],
    ['name' => 'farm.create', 'group' => 'farm', 'guard_name' => 'admin'],
    ['name' => 'farm.edit', 'group' => 'farm', 'guard_name' => 'admin'],
    ['name' => 'farm.delete', 'group' => 'farm', 'guard_name' => 'admin'],

    // Crop Permissions
    ['name' => 'crop.view', 'group' => 'crop', 'guard_name' => 'admin'],
    ['name' => 'crop.create', 'group' => 'crop', 'guard_name' => 'admin'],
    ['name' => 'crop.edit', 'group' => 'crop', 'guard_name' => 'admin'],
    ['name' => 'crop.delete', 'group' => 'crop', 'guard_name' => 'admin'],

    // Livestock Permissions
    ['name' => 'livestock.view', 'group' => 'livestock', 'guard_name' => 'admin'],
    ['name' => 'livestock.create', 'group' => 'livestock', 'guard_name' => 'admin'],
    ['name' => 'livestock.edit', 'group' => 'livestock', 'guard_name' => 'admin'],
    ['name' => 'livestock.delete', 'group' => 'livestock', 'guard_name' => 'admin'],

    // Financial Record Permissions
    ['name' => 'financial.view', 'group' => 'financial', 'guard_name' => 'admin'],
    ['name' => 'financial.create', 'group' => 'financial', 'guard_name' => 'admin'],
    ['name' => 'financial.edit', 'group' => 'financial', 'guard_name' => 'admin'],
    ['name' => 'financial.delete', 'group' => 'financial', 'guard_name' => 'admin'],

    // Market Linkage Permissions
    ['name' => 'market.view', 'group' => 'market', 'guard_name' => 'admin'],
    ['name' => 'market.create', 'group' => 'market', 'guard_name' => 'admin'],
    ['name' => 'market.edit', 'group' => 'market', 'guard_name' => 'admin'],
    ['name' => 'market.delete', 'group' => 'market', 'guard_name' => 'admin'],

    // Advisory Permissions
    ['name' => 'advisory.view', 'group' => 'advisory', 'guard_name' => 'admin'],
    ['name' => 'advisory.create', 'group' => 'advisory', 'guard_name' => 'admin'],
    ['name' => 'advisory.edit', 'group' => 'advisory', 'guard_name' => 'admin'],
    ['name' => 'advisory.delete', 'group' => 'advisory', 'guard_name' => 'admin'],

    // Farm Activity Permissions
    ['name' => 'activity.view', 'group' => 'activity', 'guard_name' => 'admin'],
    ['name' => 'activity.create', 'group' => 'activity', 'guard_name' => 'admin'],
    ['name' => 'activity.edit', 'group' => 'activity', 'guard_name' => 'admin'],
    ['name' => 'activity.delete', 'group' => 'activity', 'guard_name' => 'admin'],
];




        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission['name'], 'guard_name' => $permission['guard_name']], $permission);
        }
    }
}
