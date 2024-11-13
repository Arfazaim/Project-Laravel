<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/posts/download', [PostController::class, 'downloadPDF'])->name('posts.download');

//route resource

Route::resource('/posts', \App\Http\Controllers\PostController::class);
Auth::routes();

Route::resource('/post',\App\Http\Controllers\PostController::class);
Route::resource('/fakultas',\App\Http\Controllers\FakultasController::class);
Route::resource('/prodi',\App\Http\Controllers\ProdiController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
