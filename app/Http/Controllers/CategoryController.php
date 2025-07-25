<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('app.category',compact('categories'));
    }
    public function show(Category $category) {
        $posts = $category->posts;
        return view('app.category-show', compact('category', 'posts'));
    }
}
