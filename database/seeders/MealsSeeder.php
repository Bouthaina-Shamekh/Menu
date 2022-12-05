<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;

class MealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meals = Meal::create([
            'id' =>'1',
            'name' =>'حمص',
            'content' => 'حمص بزيت الزيتون والسماق',
            'price'  => '2',
            'calories' => '320',
            'image' =>'8537541061670071979حمص.webp',
            'category_id' => '4'
        ]);

        $meals = Meal::create([
            'id' =>'2',
            'name' => 'متبل باذنجان',
            'content' => 'باذنجان بالفلفل والريحان والمايونيز',
            'price'  => '2',
            'calories' => '320',
            'image' =>'10383792571670071855متبل-الباذنجان-1.webp',
            'category_id' => '4'
        ]);
    }
}
