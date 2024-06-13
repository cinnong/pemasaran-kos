<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
        Permission::create(['name' => 'view data']);
        Permission::create(['name' => 'crud data']);

        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
        $role->givePermissionTo(Permission::all());

        $role = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);
        $role->givePermissionTo('view data');
    }
}
