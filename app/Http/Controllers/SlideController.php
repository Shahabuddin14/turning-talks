<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.slide', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $directory = 'admin/slide-images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $slide = new Slide();
        $slide->image = $imageUrl;
        $slide->title = $request->title;
        $slide->details = $request->details;
        $slide->class = $request->class;
        $slide->save();

        return back()->with('message','Slide added successfully');
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
        $slide = Slide::findOrFail($id);
        return view('admin.slide.edit', compact('slide'));
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
        $slide = Slide::find($id);
        $slideImage = $request->file('image');
        if($slideImage){

            unlink($slide->image);
            $imageName = $slideImage->getClientOriginalName();
            $directory = 'admin/slide-images/';
            $slideImage->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $slide->image = $imageUrl;
            $slide->title = $request->title;
            $slide->details = $request->details;
            $slide->class = $request->class;
            $slide->save();
        }
        else{
            $slide->title = $request->title;
            $slide->details = $request->details;
            $slide->class = $request->class;
            $slide->save();
        }
        return back()->with('message','Slide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        unlink($slide->image);
        $slide->delete();
        return back();
    }
}
