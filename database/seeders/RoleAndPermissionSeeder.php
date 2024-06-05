<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Admin', 'Sales', 'Client', 'Client_reviewer'];
        $allPermissions = ['add review','edit review','delete review','view review','add user','edit user','delete user','view user'];
        $otherPermissions = ['add review','edit review','delete review','view review'];
        foreach ($allPermissions as $key => $permissionName) {
            $permission = Permission::create(['name' => $permissionName]);
        }
        foreach ($roles as $key => $roleName) {
            $role = Role::create(['name' => $roleName]);
            if($roleName == 'Admin'){
                foreach ($allPermissions as $key => $adminPermission) {
                    $role->givePermissionTo($adminPermission);
                }
            }else{
                foreach ($otherPermissions as $key => $otherPermission) {
                    $role->givePermissionTo($otherPermission);
                }
            }
        }
    }
}
