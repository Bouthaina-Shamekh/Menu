<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderByDesc('id')->paginate(5);
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.menus.create', compact('menus'));
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

            'image' => 'required',
            'title' => 'required',
        ]);

        $img = $request->file('image');
        $img_name = rand() . time() . $img->getClientOriginalName();
        $img->move(public_path('uploads/menus'), $img_name);

        // Insert To Database

        Menu::create([

            'image' => $img_name,
            'title' => $request->title,
        ]);

        // Redirect
        return redirect()->route('admin.menus.index')->with('msg', 'Menu created successfully')->with('type', 'success');
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
        $menus = Menu::all();
        $menu = Menu::findOrFail($id);

        return view('admin.menus.edit' , compact('menus','menu'));
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
            'title' => 'required',
        ]);

        $menu = Menu::findOrFail($id);

        // Upload File

        $img_name = $menu->image;
        if($request->hasFile('image')) {
           $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/menus'), $img_name);
       }

        // Insert To Database

        $menu->update([
            'title' => $request->title,
            'image' => $img_name,
        ]);

        // Redirect
        return redirect()->route('admin.menus.index')->with('msg', 'Menu updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        File::delete(public_path('uploads/menus/'.$menu->image));
        $menu->delete();

        return redirect()->route('admin.menus.index')->with('msg', 'Menu deleted successfully')->with('type', 'danger');
    }
}
