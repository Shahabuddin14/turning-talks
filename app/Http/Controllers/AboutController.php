<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use Illuminate\Http\Request;
use App\Models\Team;

class AboutController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        $details = AboutContent::orderBy('id', 'desc')->take(1)->get();
        return view('frontend.about.index',[
            'teams' => $teams,
            'details' => $details
        ]);
    }
}
