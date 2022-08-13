<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('admin.services.service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.services.create');
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
        $directory = 'admin/service-images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $service = new Service();
        $service->image = $imageUrl;
        $service->name = $request->name;
        $service->title = $request->title;
        $service->details = $request->details;
        $service->save();

        return back()->with('message','Service added successfully');

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
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
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
        $service = Service::find($id);
        $serviceImage = $request->file('image');
        if($serviceImage){

            unlink($service->image);
            $imageName = $serviceImage->getClientOriginalName();
            $directory = 'admin/service-images/';
            $serviceImage->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $service->image = $imageUrl;
            $service->name = $request->name;
            $service->title = $request->title;
            $service->details = $request->details;
            $service->save();
        }
        else{

            $service->name = $request->name;
            $service->title = $request->title;
            $service->details = $request->details;
            $service->save();
        }
        return back()->with('message','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        unlink($service->image);
        $service->delete();
        return back();
    }
}
