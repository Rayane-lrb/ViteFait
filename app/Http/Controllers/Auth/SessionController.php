<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function create() {
        return view('auth.login');
    }
    function store(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        $request->session()->regenerate();

        return redirect('/');
    }

    function destroy() {

        Auth::logout();
        return redirect('/');
    }
}
