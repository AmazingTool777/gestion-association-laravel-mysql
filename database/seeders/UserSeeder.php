<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Super admin
            [
                'email' => 'super-admin@hello-asso.com',
                'password' => Hash::make('password'),
                'role' => 'SUPER_ADMIN'
            ],
            // Admin
            [
                'email' => 'sitrakaramanoelina@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'ADMIN',
            ],
            // Basic / Members
            [
                'email' => 'fenitraandrianiaina@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'BASIC',
            ],
            [
                'email' => 'tolotrarabefaly@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'BASIC',
            ],
        ]);

        User::factory()->count(10)->create();
    }
}
