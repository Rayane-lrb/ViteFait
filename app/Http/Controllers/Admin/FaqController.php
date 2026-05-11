<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    function index() {
        $faqs = Faq::all();
        return view('admin.faqs.index', ['faqs' => $faqs]);
    }


}
