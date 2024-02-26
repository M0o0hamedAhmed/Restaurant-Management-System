<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'phone_number' => '0112321874',
            'roles_name' => ['admin']
        ]);
        $admin->assignRole(Role::query()->where('name', 'admin')->first());

        $staff = User::query()->create([
            'name' => 'staff',
            'email' => 'staff@staff.com',
            'password' => Hash::make('staff'),
            'phone_number' => '01551646552',
            'roles_name' => ['staff']
        ]);
        $staff->assignRole(Role::query()->where('name', 'staff')->first());
    }
}
