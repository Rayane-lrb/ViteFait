<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories, 'count' => count($categories)]);
    }

    function create() {
        return view('admin.categories.create');
    }

    function store(Request $request) {

        $request->validate([]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect('/categories');
    }
}
