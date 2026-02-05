<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/home', [Controller::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    #Posts
    Route::get('/my_posts', [PostController::class, 'my_posts'])->name('my_posts');
    Route::get('/create_post', [PostController::class, 'create'])->name('create_post');
    Route::post('/create_post', [PostController::class, 'store'])->name('create_post');
    Route::get('/edit_post/{id}', [PostController::class, 'edit'])->name('edit_post');
    Route::put('/edit_post/{id}', [PostController::class, 'update'])->name('edit_post');
    Route::delete('/delet_post/{id}', [PostController::class, 'destroy'])->name('delet_post');

    #Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
