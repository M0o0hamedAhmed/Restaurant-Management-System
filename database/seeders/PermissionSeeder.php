<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            ['name' => 'view users'],
            ['name' => 'create users'],
            ['name' => 'edit users'],
            ['name' => 'delete users'],

            ['name' => 'view categories'],
            ['name' => 'create categories'],
            ['name' => 'edit categories'],
            ['name' => 'delete categories'],

            ['name' => 'view menuItems'],
            ['name' => 'create menuItems'],
            ['name' => 'edit menuItems'],
            ['name' => 'delete menuItems'],

            ['name' => 'view orders'],
            ['name' => 'create orders'],
            ['name' => 'edit orders'],
            ['name' => 'delete orders'],

            ['name' => 'view roles'],
            ['name' => 'create roles'],
            ['name' => 'edit roles'],
            ['name' => 'delete roles'],

            ['name' => 'view permissions'],
            ['name' => 'create permissions'],
            ['name' => 'edit permissions'],
            ['name' => 'delete permissions'],
        ];
//        Permission::query()->insert(['name' => 'delete permissions']);
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
