<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('publications')->insert([
            'name' => 'THE NATION',
            'price' => '1250',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('publications')->insert([
            'name' => 'WEEKEND NATION',
            'price' => '1250',
             'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('publications')->insert([
            'name' => 'NATION ON SUNDAY',
            'price' => '1250',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
