<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Log;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin data already exists
        if (User::where('email', 'admin@example.com')->doesntExist()) {

            $roleId = Role::where('name', 'admin')->where('status', 1)->value('id');

            // Seed admin data
            $admin = [
                'first_name' => 'Demo',
                'last_name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // You should hash the password
                'role_id' => $roleId, // Optionally, you can add a role field
            ];

            // Insert admin data into the users table
            User::create($admin);
        } else {
            $this->command->info('Admin user already exists, skipping seeding.');
        }
    }
}
