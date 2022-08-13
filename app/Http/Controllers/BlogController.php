<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){

        $blogs = Blog::all()->where('status', 1);
        return view('frontend.blog.index', [
            'blogs' => $blogs
        ]);
    }

    public function singleBlog($id){
        $blog = Blog::find($id);
        return view('frontend.blog.blog')->with('blog', $blog);

    }
}
