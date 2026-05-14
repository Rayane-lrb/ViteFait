<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    function create() {
        return view('auth.register');
    }
    function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email'],
            'birthday' => ['required', 'date', 'before:today'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Profile::create([
            'username' => $user->name,
            'birthday' => $request->birthday,
            'user_id' => $user->id,
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
