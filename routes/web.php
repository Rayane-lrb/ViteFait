<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use Illuminate\Support\Facades\Route;

//Public pages
Route::get('/', function () {return view('welcome');});
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/faqs', [\App\Http\Controllers\FaqController::class, 'index']);

//User pages
Route::get('/dashboard', function () {return view('userzone.dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'show'])->name('article.show');


//Admin pages

Route::get('/admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.index');
Route::get('/admin/categories/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
Route::post('/admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/categories/{id}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
Route::put('/admin/categories/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
Route::delete('/admin/categories/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/admin/faqs', [\App\Http\Controllers\Admin\FaqController::class, 'index'])->name('faqs.index');
Route::get('/admin/faqs/create', [\App\Http\Controllers\Admin\FaqController::class, 'create'])->name('faq.create');
Route::post('/admin/faqs/', [\App\Http\Controllers\Admin\FaqController::class, 'store'])->name('faq.store');
Route::get('/admin/faqs/{id}/edit', [\App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('faq.edit');
Route::put('/admin/faqs/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'update'])->name('faq.update');
Route::delete('/admin/faqs/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('faq.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

