<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    function index () {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

   function show (string $id) {
        $article = Article::findOrFail($id);
        $authorProfile = $article->user->profile;

        return view('articles.show', ['article' => $article, 'authorProfile' => $authorProfile]);
    }
}
