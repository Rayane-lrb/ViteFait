<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    function show(string $id) {
        $profile = Profile::findOrFail($id);

        if ($profile->user->is(Auth::user())) {
            return view('profile.show_own', ['profile' => $profile]);
        }

        return view('profile.show', ['profile' => $profile]);
    }

    function showOwn() {
        $profile = Profile::where('user_id', auth()->id())->firstOrFail();
        return view('profile.show_own', ['profile' => $profile]);
    }

    function edit(string $id) {
        $profile = Profile::findOrFail($id);
        return view('profile.edit', ['profile' => $profile]);
    }

    function update(Request $request, string $id) {


        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $id],
            'picture_path' => ['sometimes', 'nullable', 'mimes:jpeg,jpg,png', 'dimensions:max_width=500,max_height=500'],
            'bio' => ['nullable', 'string']
        ]);

        $new_picture_path = null;

        $profile = Profile::findOrFail($id);
        if($request->hasFile('picture_path')) {
            if($profile->picture_path) {
                Storage::delete($profile->picture_path);
            }
                $new_picture_path = $request->file('picture_path')->store('profile_pictures', 'public');
        }
        else $new_picture_path = $profile->picture_path;

        $profile->update([
            'username' => $request->username,
            'picture_path' => $new_picture_path,
            'bio' => $request->bio
        ]);
        return redirect(route('profile.showOwn'));
    }
}
