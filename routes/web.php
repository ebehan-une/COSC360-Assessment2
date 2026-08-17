<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Laravel Authentication Routes:
Auth::routes();

// Redirect User to Login Initially:
Route::get('/', function () { return redirect('/admin'); })->middleware('auth');

// Destination once Logged In:
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// Administrator Group:
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Category Routes:
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/all', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/save', [CategoryController::class, 'store'])->name('save');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
    });
    // Post Routes:
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/all', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
        Route::post('/save', [PostController::class, 'store'])->name('save');
        Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('delete');
    });
});