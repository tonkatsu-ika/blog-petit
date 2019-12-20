<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\Http\Controllers\Controller;
use Image;
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
        //dd($request->all());

        // 画像の下処理
        $image_url = $request->image_url;
        $image_file_name = $image_url->getClientOriginalName();
        $dir_to_save_images = 'storage/images/';
        $image = Image::make($image_url);
        $image->resize(null, 200, function($constraint){
            $constraint->aspectRatio();
        })
        ->crop(200, 200)
        ->save(public_path($dir_to_save_images.$image_file_name));

        // 通常のstore処理
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->article = $request->article;
        //$blog->image_url = $request->image_url->store('public/images');
        $blog->image_url = 'images/'.$image_file_name;
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
        $blog->image_url = $request->image_url;
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
