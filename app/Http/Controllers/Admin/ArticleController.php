<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    function index () {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    function create() {
        return view('admin.articles.create');
    }

    function store(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'content_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg']
        ]);
        $file_path = null;

        if ($request->hasFile('content_image')) {
            $file_path = $request->file('content_image')->store('articles', 'public');
        }
        Article::create([
            'title' => $request->title,
            'text' => $request->text,
            'content_image' => $file_path,
            'published_at' => now(),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('articles.index');
    }

   function show (string $id) {
        $article = Article::findOrFail($id);
        $authorProfile = $article->user->profile;
        return view('articles.show', ['article' => $article, 'authorProfile' => $authorProfile]);
    }

    function edit (string $id) {
        $article = Article::findOrFail($id);

        return view('admin.articles.edit', ['article' => $article]);
    }

    function update(Request $request, string $id) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'content_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg']
        ]);
        $article = Article::findOrFail($id);

        if($request->hasFile('content_image')) {
            if($article->content_image) {
                Storage::delete($article->content_image);
            }
            $new_image = $request->file('content_image')->store('images', 'public');
            $article->content_image = $new_image;
            }

        $article->update([
            'title' => $request->title,
            'text' => $request->text
        ]);

        return redirect('/articles');
    }

    function destroy (string $id) {
        $article = Article::findOrFail($id);

        if($article->content_image) {
            Storage::delete('public/' . $article->content_image);
        }
        $article->delete();

        return redirect('/articles');
    }
}
