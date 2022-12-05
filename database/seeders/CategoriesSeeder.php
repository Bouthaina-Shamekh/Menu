<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = Category::create([
            'id' =>'1',
            'name' =>'برجر لحم',
            'image' =>'9173921601670071125برجر-لحم-1.webp',
        ]);

        $categories = Category::create([
            'id' =>'2',
            'name' =>'أطباق جانبية',
            'image' =>'1404735711670070869أطباق-جانبية-1 (1).webp',
        ]);

        $categories = Category::create([
            'id' =>'3',
            'name' =>'البوكسات',
            'image' =>'9676215921670070962البوكسات-1.webp',
        ]);

        $categories = Category::create([
            'id' =>'4',
            'name' =>'المشروبات',
            'image' =>'18849727831670071024المشروبات-1.webp',
        ]);

        $categories = Category::create([
            'id' =>'5',
            'name' =>'برجر لحم',
            'image' =>'9173921601670071125برجر-لحم-1.webp',
        ]);

        $categories = Category::create([
            'id' =>'6',
            'name' =>'برجر دجاج',
            'image' =>'9173921601670071125برجر-لحم-1.webp',
        ]);

    }
}
