<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    function index() {
        $users = User::all();
        $count = $users->count();
        return view('admin.users.index', ['users' => $users, 'count' => $count]);
    }
    function create() {
        if(Auth::check() && auth()->user()->is_admin) {
            return view('admin.users.create');
        }
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
        if(auth()->check() && auth()->user()->is_admin) {
            return redirect()->route('users.index');
        }
        if(!Auth::check()) {
            Auth::login($user);
        }

        return redirect('/');
    }

    function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'is_admin' => ['required', 'in:0,1']
        ]);

        $user->update([
            'is_admin' => (bool) $request->is_admin,
            'remember_token' => null
            ]);

        if (Auth::id() === $user->id) {
            Auth::logout();
            return redirect()->route('login');
        }
        return redirect()->route('users.index');
    }
    function destroy(string $id) {
        $user = User::findOrFail($id);
        $isSelf = auth()->user()->id === $user->id;

        if ($user->profile?->picture_path) {
            Storage::delete($user->profile->picture_path);
        }

        $user->delete();

        if ($isSelf) {
            Auth::logout();
            return redirect('/');
        }

        return redirect()->route('users.index');
    }
}
