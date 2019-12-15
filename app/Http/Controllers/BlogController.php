<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
      $blogs = Blog::all();
      return view('blog/index', compact('blogs'));
    }

    public function edit($id)
    {
      $blog = Blog::findOrFail($id);
      return view('blog/edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
      $blog = Blog::findOrFail($id);
      $blog->title = $request->title;
      $blog->article = $request->article;
      $blog->save();

      return redirect("/blog");
    }
}
