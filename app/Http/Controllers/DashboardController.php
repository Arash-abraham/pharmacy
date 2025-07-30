<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $user = User::findOrFail(Auth::id());
        $comments = $user->comments()->with('post')->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('comments'));
    }
}
