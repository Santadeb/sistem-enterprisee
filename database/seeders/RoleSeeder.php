<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat role user / level user
        $admin = Role::updateOrCreate(['name' => 'admin']);
        $operator = Role::updateOrCreate(['name' => 'operator']);

        // Pastikan permission tersedia sebelum di-assign
        $permissions = [
            'show users', 'add users', 'edit users',
            'show department', 'add department', 'edit department'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Memberikan akses ke role admin (semua permissions)
        $admin->givePermissionTo(Permission::all());

        // Memberikan akses ke role operator (permission tertentu)
        $operator->givePermissionTo([
            'show users', 'add users', 'edit users',
            'show department', 'add department', 'edit department',
        ]);
    }
}
