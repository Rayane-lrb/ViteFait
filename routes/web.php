<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use Illuminate\Support\Facades\Route;

//Public pages
Route::get('/', function () {return view('welcome');});
Route::get('/faqs', [\App\Http\Controllers\FaqController::class, 'index']);

//articles

Route::get('/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'show'])->name('article.show');

//guest pages
Route::middleware('guest')->group(function () {
    //register
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    //login
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

//ath user pages
Route::middleware('auth')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy']);

    //profile
    Route::get('/profile/{id}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'showOwn'])->name('profile.showOwn');
    Route::get('/profile/{id}/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

//Admin pages
Route::middleware('auth', \App\Http\Middleware\IsAdmin::class)->group(function () {
    Route::get('/admin/articles/create', [App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('article.create');
    Route::post('/admin/articles', [App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('article.store');
    Route::get('/admin/articles/{id}/edit', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/admin/articles/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('article.update');
    Route::delete('/admin/articles/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'destroy'])->name('article.destroy');

    //category
    Route::get('/admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/admin/categories/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
    Route::post('/admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/categories/{id}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/admin/categories/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/categories/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.destroy');

    //faq
    Route::get('/admin/faqs', [\App\Http\Controllers\Admin\FaqController::class, 'index'])->name('faqs.index');
    Route::get('/admin/faqs/create', [\App\Http\Controllers\Admin\FaqController::class, 'create'])->name('faq.create');
    Route::post('/admin/faqs/', [\App\Http\Controllers\Admin\FaqController::class, 'store'])->name('faq.store');
    Route::get('/admin/faqs/{id}/edit', [\App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/admin/faqs/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'update'])->name('faq.update');
    Route::delete('/admin/faqs/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('faq.destroy');

    //users
    Route::get('/admin/users', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])->name('users.store');
    Route::put('/admin/users/{id}', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'destroy'])->name('users.destroy');
});

