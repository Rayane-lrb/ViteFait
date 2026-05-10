<?php

use Illuminate\Support\Facades\Route;

//Public pages
Route::get('/', function () {return view('welcome');});


//User pages
Route::get('/dashboard', function () {return view('userzone.dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'show'])->name('article.show');

Route::get('/faq', [\App\Http\Controllers\FaqController::class, 'index']);

//Admin pages

Route::get('/admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.index');
Route::get('/admin/categories/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
Route::post('/admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
