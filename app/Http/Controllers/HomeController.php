<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = Blog::orderByDesc('created_at')->paginate(6);
        $categories = Category::limit(5)->get();

        return view('pages.home', compact('posts', 'categories'));
    }
}
