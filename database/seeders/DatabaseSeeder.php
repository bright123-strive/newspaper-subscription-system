<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();
        DB::table('users')->truncate();


        $this->call([RolesSeeder::class, UsersTableSeeder::class,PublicationsSeeder::class]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
