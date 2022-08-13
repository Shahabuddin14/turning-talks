<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class AdminTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::all();
        return view('admin.team.team', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.team.create');
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
        $directory = 'admin/member-images/';
        $photo->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $team = new Team();
        $team->photo = $imageUrl;
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->facebook = $request->facebook;
        $team->youtube = $request->youtube;

        $team->save();

        return back()->with('message','Team added successfully');

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
        $team = Team::findOrFail($id);
        return view('admin.team.edit', compact('team'));
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
        $team = Team::find($id);
        $teamImage = $request->file('photo');
        if($teamImage){

            unlink($team->photo);
            $imageName = $teamImage->getClientOriginalName();
            $directory = 'admin/member-images/';
            $teamImage->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $team->photo = $imageUrl;
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->facebook = $request->facebook;
            $team->youtube = $request->youtube;
            $team->save();
        }
        else{
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->facebook = $request->facebook;
            $team->youtube = $request->youtube;
            $team->save();
        }
        return back()->with('message','Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        unlink($team->photo);
        $team->delete();
        return back();
    }
}
