<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('admin.blog.blog', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog.create');
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
        $directory = 'admin/blog-images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $blog = new Blog();
        $blog->image = $imageUrl;
        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->status = $request->status;
        $blog->save();

        return back()->with('message','Blog added successfully');

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
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
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
        $blog = Blog::find($id);
        $blogImage = $request->file('image');
        if($blogImage){

            unlink($blog->image);
            $imageName = $blogImage->getClientOriginalName();
            $directory = 'admin/blog-images/';
            $blogImage->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $blog->image = $imageUrl;
            $blog->title = $request->title;
            $blog->details = $request->details;
            $blog->status = $request->status;
            $blog->save();
        }
        else{
            $blog->title = $request->title;
            $blog->details = $request->details;
            $blog->status = $request->status;
            $blog->save();
        }
        return back()->with('message','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        unlink($blog->image);
        $blog->delete();
        return back();
    }
}
