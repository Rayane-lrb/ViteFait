<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //index for admins


    function show (string $id) {

        $profile = Profile::findOrFail($id);

        if ($profile->user->is(Auth::user())) {

            return view('profile.show_own', ['profile' => $profile]);
        }

        return view('profile.show', ['profile' => $profile]);
    }

    function showOwn () {
        $ownProfile = Profile::where('user_id', auth()->id())->firstOrFail();

        return view('profile.show_own', ['profile' => $ownProfile]);
    }

    function edit(string $id) {
        $profile = Profile::findOrFail($id);

        return view('profile.edit', ['profile' => $profile]);
    }

    function update(Request $request, string $id) {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $id],
            'picture_path' => ['nullable', 'mimes:jpeg,jpg,png'],
            'bio' => ['nullable', 'string']
        ]);

        $profile = Profile::findOrFail($id);
        $profile->update([
            'username' => $request->username,
            'picture_path' => $request->picture_path,
            'bio' => $request->bio
        ]);

        return redirect(route('profile.showOwn'));
    }
}
