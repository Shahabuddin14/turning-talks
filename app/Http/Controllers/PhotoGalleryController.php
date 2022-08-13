<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    //
    public function index(){

        $photos = PhotoGallery::all();
        return view('frontend.photo.index',[
            'photos' => $photos
        ]);
    }

}
