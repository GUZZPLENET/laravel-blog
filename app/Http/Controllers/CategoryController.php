<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('pages.category.list', compact('categories'));
    }

    public function category(Category $category) {
        $categories = Category::all();

        return view('pages.category.posts', compact('categories', 'category'));
    }
}
