<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ResizeImage;

class PostController extends Controller
{
    public function post($id) {
        $post = Blog::findOrFail($id);

        return view('pages.blog.post', compact('post'));
    }

    public function user($id) {
        $user = User::findOrFail($id);
        $posts = Blog::where('creator', $user->id)->get();

        return view('pages.user.posts', compact('user', 'posts'));
    }

    public function create() {
        $categories = Category::all();

        return view('pages.blog.create', compact('categories'));
    }

    public function store(PostRequest $request) {
        $name = time() . '.' . $request->file('image')->extension();
        ResizeImage::make($request->file('image'))->resize(600, 450)->save(public_path('upload/') . $name);

        $data = $request->only(['title', 'description', 'content', 'category']);

        $blog = new Blog();
        $blog->image = $name;
        $blog->creator = Auth::id();
        $blog->fill($data);
        $blog->save();

        return redirect()->route('post', $blog);
    }
}
