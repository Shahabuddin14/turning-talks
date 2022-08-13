<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\PhotoGallery;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //
    public function home(){

        $blog = Blog::all();
        $teams = Team::all();
        $photo = PhotoGallery::all();
        $slide = Slide::all();
        $service = Service::all();
        return view('admin.home.home', [
            'blog' => $blog,
            'teams' => $teams,
            'photo' => $photo,
            'slide' => $slide,
            'service' => $service
        ]);
    }
}
