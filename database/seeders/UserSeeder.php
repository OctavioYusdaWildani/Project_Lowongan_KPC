<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Guest User
        User::create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => Hash::make('password'),
            'role' => 'guest',
        ]);

        // Staff
        User::create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        // Manager
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            'role' => 'department_manager',
        ]);
        
        User::create([
            'name' => 'Aliefyan',
            'email' => 'aliefyan@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'department_manager',
        ]);       

        // Director
        User::create([
            'name' => 'Director User',
            'email' => 'director@example.com',
            'password' => Hash::make('password'),
            'role' => 'director',
        ]);

        // HR Manager
        User::create([
            'name' => 'HR Manager User',
            'email' => 'hrmanager@example.com',
            'password' => Hash::make('password'),
            'role' => 'hr_manager',
        ]);

        User::create([
            'name' => 'AliefHR',
            'email' => 'aliefhakim1807@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'hr_manager',
        ]);
        
    }
}
