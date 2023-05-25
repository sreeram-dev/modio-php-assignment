<?php

namespace Database\Seeders;

use App\Models\Mod;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();
         // TODO: challenge 2.0
         Mod::factory(10)->create();
    }
}
