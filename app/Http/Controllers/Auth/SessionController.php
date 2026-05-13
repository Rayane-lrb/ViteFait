<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

        if(! Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            throw ValidationException::withMessages([
                'email' => ['Les identifiants ne correspondent pas.'],
            ]);
        }

        $request->session()->regenerate();

        return redirect('/');
    }

    function destroy() {

        Auth::logout();
        return redirect('/');
    }
}
