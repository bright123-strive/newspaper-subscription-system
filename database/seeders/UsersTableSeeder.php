<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@mwnation.com',
            'password' => ('password')
        ]);


        User::factory()->create([
            'name' => 'Sales Manager',
            'role_id' => 2,
            'email' => 'sales@mwnation.com',
            'password' => ('secret'),

        ]);
    }
}
