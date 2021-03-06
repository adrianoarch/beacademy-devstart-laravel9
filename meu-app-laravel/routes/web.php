<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    PostController
};

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('template.home');
});

Route::middleware('auth')->group(function () {
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}/posts', [PostController::class, 'show'])->name('posts.show');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
});

Route::middleware(['auth', 'admin'])->group(function () 
{
    Route::get('/admin', [UserController::class, 'admin'])->name('admin.index');
});


// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


