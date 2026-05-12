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
            'question' => ['required', 'string', 'max:255', 'unique:faqs'],
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

}
