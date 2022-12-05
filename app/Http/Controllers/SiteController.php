<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories_slider = Category::orderByDesc('id')->take(4)->get();
        $meals = Meal::orderByDesc('id')->take(3)->get();
        $menus = Menu::first();
        return view('site.index', compact('categories_slider','meals','menus'));
    }
}
