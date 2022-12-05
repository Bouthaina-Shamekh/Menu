<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MealsSeeder;
use Database\Seeders\CategoriesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MealsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(MenusSeeder::class);

    }
}
