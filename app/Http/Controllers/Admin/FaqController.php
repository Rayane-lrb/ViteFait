<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    function index() {
        $faqs = Faq::all();
        $faqsCount = $faqs->count();

        return view('admin.faqs.index', ['faqs' => $faqs, 'faqsCount' => $faqsCount]);
    }

    function create() {
        $categories = Category::all();
        return view('admin.faqs.create', ['categories' => $categories]);
    }

    function store(Request $request) {
        $request->validate([
            'question' => ['required', 'string', 'max:255', 'unique:faqs,question,' . $request->id],
            'answer' => ['required', 'string'],
            'category_id' => 'required'
        ]);
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'category_id' => $request->category_id,
        ]);

        return redirect('/admin/faqs');
    }

    function edit(string $id) {
        $faq = Faq::findOrFail($id);
        $categories = Category::all();
        return view('admin.faqs/edit', ['faq' => $faq, 'categories' => $categories]);
    }

    function update(string $id, Request $request) {
        $request->validate([
            'question' => ['required', 'string', 'max:255', 'unique:faqs,question,' .$id],
            'answer' => ['required', 'string'],
            'category_id' => 'required'
        ]);
        $faq = Faq::findOrFail($id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'category_id' => $request->category_id,
        ]);
        return redirect('/admin/faqs');
    }

    function destroy(string $id) {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect('/admin/faqs');
    }
}
