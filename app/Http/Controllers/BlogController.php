<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $blogs = Blog::paginate(6);
        return view('blog/index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog/show', compact('blog'));
    }

    public function create()
    {
        $blog = new Blog();
        return view('blog/create', compact('blog'));
    }

    public function store(BlogRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->article = $request->article;
        $blog->user_id = Auth::user()->id;
        $blog->save();
  
        return redirect('/');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        $this->authorize('edit', $blog);
        return view('blog/edit', compact('blog'));
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->article = $request->article;
        $blog->user_id = Auth::user()->id;
        $blog->save();
  
        return redirect('/');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect('/');
    }
}
