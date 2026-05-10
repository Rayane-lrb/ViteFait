<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

//USER
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'show'])->name('article.show');


Route::get('/faq', [\App\Http\Controllers\FaqController::class, 'index']);

Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
