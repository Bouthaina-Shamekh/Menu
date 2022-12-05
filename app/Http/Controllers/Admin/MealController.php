<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $meals = Meal::orderByDesc('id')->paginate(5);
        return view('admin.meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $meals = Meal::all();
        return view('admin.meals.create', compact('meals','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Data
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'price' => 'required',
            'calories' => 'nullable',
            'image' => 'nullable',
            'image_icon1' => 'nullable',
            'image_icon2' => 'nullable',
            'image_icon3' => 'nullable',
            'category_id' => 'required',
        ]);

        $img = $request->file('image');
        $img_name = rand() . time() . $img->getClientOriginalName();
        $img->move(public_path('uploads/meals'), $img_name);

      //  $img = $request->file('image_icon1');
      //  $image_icon1 = rand() . time() . $img->getClientOriginalName();
      //  $img->move(public_path('uploads/meals'), $image_icon1);

      //  $img = $request->file('image_icon2');
      //  $image_icon2 = rand() . time() . $img->getClientOriginalName();
      //  $img->move(public_path('uploads/meals'), $image_icon2);

      //  $img = $request->file('image_icon3');
      //  $image_icon3 = rand() . time() . $img->getClientOriginalName();
      //  $img->move(public_path('uploads/meals'), $image_icon3);


        // Insert To Database

        Meal::create([
            'name' => $request->name,
            'content' => $request->content,
            'price' => $request->price,
            'calories' => $request->calories,
            'image' => $img_name,
           // 'image_icon1' => $image_icon1,
          //  'image_icon2' => $image_icon2,
           // 'image_icon3' => $image_icon3,
            'category_id' => $request->category_id,
        ]);

        // Redirect
        return redirect()->route('admin.meals.index')->with('msg', 'Category created successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $category = Category::all();
        $categories = Category::all();
        $meals = Meal::all();
        $meal = Meal::findOrFail($id);
        return view('admin.meals.edit', compact('meals', 'meal','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate Data
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'price' => 'required',
            'calories' => 'required',
            'category_id' => 'required',
        ]);

        $meal = Meal::findOrFail($id);

        // Upload File

        $img_name = $meal->image;
        if($request->hasFile('image')) {
           $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/meals'), $img_name);
       }

       $image_icon1 = $meal->image_icon1;
        if($request->hasFile('image_icon1')) {
            $image_icon1 = rand() . time() . $request->file('image_icon1')->getClientOriginalName();
          $request->file('image_icon1')->move(public_path('uploads/meals'), $image_icon1);
       }

       $image_icon2 = $meal->image_icon2;
        if($request->hasFile('image_icon2')) {
            $image_icon2 = rand() . time() . $request->file('image_icon2')->getClientOriginalName();
          $request->file('image_icon2')->move(public_path('uploads/meals'), $image_icon2);
       }


       $image_icon3 = $meal->image_icon3;
        if($request->hasFile('image_icon3')) {
            $image_icon3 = rand() . time() . $request->file('image_icon3')->getClientOriginalName();
          $request->file('image_icon3')->move(public_path('uploads/meals'), $image_icon3);
       }


        // Insert To Database

        $meal->update([

            'name' => $request->name,
            'content' => $request->content,
            'price' => $request->price,
            'calories' => $request->calories,
            'image' => $img_name,
           // 'image_icon1' => $image_icon1,
           // 'image_icon2' => $image_icon2,
           // 'image_icon3' => $image_icon3,
          //  'category_id' => $request->category_id,


        ]);

        // Redirect
        return redirect()->route('admin.meals.index')->with('msg', 'Meal updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);

        File::delete(public_path('uploads/meals/'.$meal->image));
        $meal->delete();

        File::delete(public_path('uploads/meals/'.$meal->image_icon1));
        $meal->delete();

        File::delete(public_path('uploads/meals/'.$meal->image_icon2));
        $meal->delete();

        File::delete(public_path('uploads/meals/'.$meal->image_icon3));
        $meal->delete();

        return redirect()->route('admin.meals.index')->with('msg', 'Meal deleted successfully')->with('type', 'danger');

    }
}
