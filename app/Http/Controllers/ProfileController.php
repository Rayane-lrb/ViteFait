<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //index for admins


    function show (string $id) {

        $profile = Profile::findOrFail($id);

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
            'username' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255'
        ]);

        $profile = Profile::findOrFail($id);
        $profile->update([
            'username' => $request->username,
            'bio' => $request->bio
        ]);

        return redirect(route('profile.showOwn'));
    }
}
