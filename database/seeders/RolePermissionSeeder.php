<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        $permissions = [

            ['name' => 'user list'],
            ['name' => 'create user'],
            ['name' => 'edit user'],
            ['name' => 'delete user'],

            ['name' => 'role list'],
            ['name' => 'role create'],
            ['name' => 'role edit'],
            ['name' => 'role delete'],

            // ['name' => 'permission list'],
            // ['name' => 'permission create'],
            // ['name' => 'permission edit'],
            // ['name' => 'permission delete'],

        ];

        foreach ($permissions as $item) {
            Permission::create($item);
        }

        $role->syncPermissions(Permission::all());
        $user = User::first();
        $user->assignRole($role);
    }
}
