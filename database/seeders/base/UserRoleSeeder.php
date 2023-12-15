<?php

namespace Database\Seeders\base;

use App\Models\Super\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::insert([
            [
                'role_name' => strtolower('superadmin'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => strtolower('admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => strtolower('user'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => strtolower('psr'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
