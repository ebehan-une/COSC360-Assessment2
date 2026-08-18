<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Laravel Authentication Routes:
Auth::routes();

// Redirect User to Login Initially:
Route::get('/', function () { return redirect('/admin'); })->middleware('auth');

// Destination once Logged In:
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// User Routing (View Blog Posts):
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Administrator Routing:
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Category Routes:
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/all', [CategoryController::class, 'list'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/save', [CategoryController::class, 'save'])->name('save');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
    // Post Routes:
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/all', [PostController::class, 'list'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
        Route::post('/save', [PostController::class, 'save'])->name('save');
        Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('delete');
    });
});

// Error Routing, Automatically handled by Laravel.