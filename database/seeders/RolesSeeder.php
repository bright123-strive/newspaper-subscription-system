<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'This is the administration role',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Sales',
            'description' => 'This is the sales role',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('roles')->insert([
            'name' => 'Subscriber',
            'description' => 'This is the subscriber role',
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
