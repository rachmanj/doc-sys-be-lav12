<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call([
            DepartmentSeeder::class,
            RolesAndPermissionsSeeder::class,
            ProjectTableSeder::class,
        ]);

        // Check if users already exist
        if (User::count() === 0) {
            // Create superadmin user
            $superadmin = User::create([
                'name' => 'Omanof Sullivant',
                'username' => 'superadmin',
                'email' => 'oman@example.com',
                'password' => Hash::make('654321'),
                'department_id' => 1, // IT department
                'project' => '000H',
            ]);
            
            // Assign superadmin role
            $superadmin->assignRole('superadmin');
            
            // Create a regular user for testing
            $user = User::create([
                'name' => 'Accounting User',
                'username' => 'accuser',
                'email' => 'accuser@example.com',
                'password' => Hash::make('654321'),
                'department_id' => 10, // Accounting department
                'project' => '000H',
            ]);
            
            // Assign user role
            $user->assignRole('user');
        }
    }
}
