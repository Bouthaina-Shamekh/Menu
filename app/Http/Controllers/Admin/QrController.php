<?php

namespace App\Http\Controllers\Admin;

use App\Models\Qr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class QrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $qrs = Qr::orderByDesc('id')->paginate(5);
        return view('admin.qrs.index', compact('qrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qrs = Qr::all();
        return view('admin.qrs.create', compact('qrs'));
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
            'link' =>'nullable',
            'image' => 'required',
        ]);

        $img = $request->file('image');
        $img_name = rand() . time() . $img->getClientOriginalName();
        $img->move(public_path('uploads/qrs'), $img_name);

        // Insert To Database

        Qr::create([
            'link' => $request->link,
            'image' => $img_name,
        ]);

        // Redirect
        return redirect()->route('admin.qrs.index')->with('msg', 'Qr created successfully')->with('type', 'success');
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
        $qrs = Qr::all();
        $qr = Qr::findOrFail($id);

        return view('admin.qrs.edit' , compact('qrs','qr'));


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
            'link' => 'required',
        ]);

        $qr = Qr::findOrFail($id);

        // Upload File

        $img_name = $qr->image;
        if($request->hasFile('image')) {
           $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/qrs'), $img_name);
       }

        // Insert To Database

        $qr->update([
            'link' => $request->link,
            'image' => $img_name,
        ]);

        // Redirect
        return redirect()->route('admin.qrs.index')->with('msg', 'Qr updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qr = Qr::findOrFail($id);

        File::delete(public_path('uploads/qrs/'.$qr->image));
        $qr->delete();

        return redirect()->route('admin.qrs.index')->with('msg', 'Qr deleted successfully')->with('type', 'danger');
    }
}
