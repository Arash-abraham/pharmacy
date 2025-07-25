<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show($slug) {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('view'); 
        return view('app.posts.show', compact('post'));
    }
    
}
