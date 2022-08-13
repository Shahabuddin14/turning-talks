<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $abouts = AboutContent::all();
        return view('admin.about.about', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $imageName = $photo->getClientOriginalName();
        $directory = 'admin/about-images/';
        $photo->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $about = new AboutContent();
        $about->photo = $imageUrl;
        $about->details = $request->details;
        $about->save();

        return back()->with('message','About added successfully');

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
        $about = AboutContent::findOrFail($id);
        return view('admin.about.edit', compact('about'));
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
        $about = AboutContent::find($id);
        $aboutImage = $request->file('photo');
        if($aboutImage){

            unlink($about->photo);
            $imageName = $aboutImage->getClientOriginalName();
            $directory = 'admin/about-images/';
            $aboutImage->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $about->photo = $imageUrl;
            $about->details = $request->details;
            $about->save();
        }
        else{

            $about->details = $request->details;
            $about->save();
        }
        return back()->with('message','About updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = AboutContent::findOrFail($id);
        unlink($about->photo);
        $about->delete();
        return back();
    }
}
