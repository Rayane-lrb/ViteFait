<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        $categories = Category::all();

        $categoriesThisMonth = Category::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();

        $lastCategory = Category::latest()->first();

        $dateLastCategory = null;

        if($lastCategory) {
            $lastCategoryCreationDate = $lastCategory->created_at;
            if ($lastCategoryCreationDate->isToday()) {
                $dateLastCategory = "Aujourd'hui";
            } elseif ($lastCategoryCreationDate->isYesterday()) {
                $dateLastCategory = "Hier";
            } else {
                $dateLastCategory = $lastCategory->created_at->format('d/m/Y');
            }
        }
        return view('admin.categories.index', ['categories' => $categories, 'count' => count($categories), 'categoriesThisMonth' => $categoriesThisMonth, 'lastCategory' => $lastCategory, 'dateLastCategory' => $dateLastCategory]);

    }

    function create() {
        return view('admin.categories.create');
    }

    function store(Request $request) {

        $request->validate([
            'name' => ['required', 'min:3', 'unique:categories']
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect('admin/categories');
    }

    function edit(string $id) {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    function update(string $id, Request $request) {

        $request->validate([
            'name' => ['required', 'min:3', 'unique:categories']
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name
        ]);

        return redirect('/admin/categories');
    }

    function destroy(string $id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('admin/categories');
    }
}
