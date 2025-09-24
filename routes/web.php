<?php

use App\Http\Controllers\Admin\AdminDashboadrController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckAdmin;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class , 'home'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/animes', [HomeController::class , 'animes'])->name('animes');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/dashboard',[DashboardController::class , 'index'])->middleware(['auth'])->name('dashboard');
Route::delete('/comment/{id}', function ($id) {
    $comment = Comment::findOrFail($id);
    if (Auth::id() !== $comment->user_id) {
        abort(403);
    }
    $comment->delete();
    return redirect()->back()->with('success', 'Comment deleted successfully.');
})->name('comment.delete');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); 
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');


// Route::prefix('admin')->middleware([CheckAdmin::class])->name('admin.')->group(function() {
//     Route::get('/' , DashboardController::class);
// });

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/' , [AdminDashboadrController::class,'index']);
});


require __DIR__.'/auth.php';
