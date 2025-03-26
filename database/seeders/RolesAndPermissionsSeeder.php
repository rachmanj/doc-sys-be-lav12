<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'dashboard' => ['index'],
            'documents' => ['index'],
            'deliveries' => ['index'],
            'reports' => ['index'],
            'master' => ['index'],
            'settings' => ['index'],
            'users' => ['index', 'create', 'edit', 'delete'],
            'roles' => ['index', 'create', 'edit', 'delete'],
            'permissions' => ['index', 'create'],
            'invoices' => ['index', 'create', 'edit', 'delete'],
            'addocs' => ['index', 'create', 'edit', 'delete'],
            'addocs_type' => ['index', 'create', 'edit', 'delete'],
            'inv_type' => ['index', 'create', 'edit', 'delete'],
            'spis' => ['index', 'create', 'edit', 'delete'],
            'lpd' => ['index', 'create', 'edit', 'delete']
        ];

        foreach ($permissions as $resource => $actions) {
            foreach ($actions as $action) {
                $permissionName = "{$resource}.{$action}";

                Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
            }
        }

        // Create roles and assign permissions
        // SuperAdmin role
        $superadminRole = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => 'web']);
        $superadminRole->givePermissionTo(Permission::all());

        // Role User
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        $userRole->givePermissionTo([
            'dashboard.index',
            'documents.index',
            'deliveries.index',
            'reports.index',
            'master.index',
        ]);

    }
}
