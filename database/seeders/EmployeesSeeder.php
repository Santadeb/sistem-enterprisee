<?php

namespace Database\Seeders;

use App\Models\Emlpoyee;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'user_id' => 1,
                'departments_id' => 1,
                'address' => 'jl.santai',
                'place_of_birth' => 'pekanbaru',
                'dob' =>'2004-12-02',
                'religion' => 'Islam',
                'sex' => 'Male',
                'phone' => '1231412',
                'salary' => '010910239',
            ],
            [
                'user_id' => 3,
                'departments_id' => 3,
                'address' => 'jl.santai',
                'place_of_birth' => 'pelalawan',
                'dob' =>'2004-12-02',
                'religion' => 'Islam',
                'sex' => 'Male',
                'phone' => '1231567',
                'salary' => '0109',
            ],
            
        ];
        
       foreach($employees as $employee) {
            Employee::create($employee);
        }
    }
}