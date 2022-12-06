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

        $categories = Category::orderByDesc('id')->latest()->get();
        $meals = Meal::all();
        $menus = Menu::first();
        return view('site.index', compact('meals','menus','categories'));
    }

    public function details($id)
    {
        $meals = Meal::find($id);
        return view ('site.details', compact('meals'));
    }
}
