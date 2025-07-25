<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $popularPost = Post::Where('status',1)->orderBy('view','desc')->limit(3)->get();
        return view('app.home',compact('popularPost'));
    }
    public function search(Request $request) {
        $query = $request->input('q');
        $posts = Post::where('title', 'like', '%' . $query . '%')->where('status', 1)->get();
        return view('app.search', compact('posts', 'query'));
    }
    public function animes() {
        $posts = Post::all();
        return view('app.animes',compact('posts'));
    }
}
