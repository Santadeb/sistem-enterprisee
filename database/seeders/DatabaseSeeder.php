<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\DepartmentSeeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        PermissionSeeder::class,
        RoleSeeder::class,
        UserSeeder::class,
        DepartmentSeeder::class,
        EmployeeSeeder::class,
        
        ]);
    }
}
