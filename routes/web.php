<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\FakultasController;

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

//Route prodi
Route::get('/prodi', [ProdiController::class, 'index']);
Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit']);
Route::put('/prodi/{id}', [ProdiController::class, 'update']);
Route::delete('/prodi/{id}', [ProdiController::class, 'destroy']);

Route::get('/fakultas/{id}/edit', [FakultasController::class, 'edit'])->name('fakultas.edit');
Route::delete('/fakultas/{id}', [FakultasController::class, 'destroy'])->name('fakultas.destroy');

require __DIR__.'/auth.php';
