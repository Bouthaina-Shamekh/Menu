<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::create([
            'id' =>'1',
            'title' =>'الوجبات',
            'image' =>'19382724131670183094logo-1-1.png',
        ]);
    }
}
