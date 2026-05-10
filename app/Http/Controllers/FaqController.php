<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    function index() {
        $faqs = Faq::all();

        return view('faq', ['faqs' => $faqs]);
    }
}
