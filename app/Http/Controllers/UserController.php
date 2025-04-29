<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function EditProfile(Request $request)
    {
        $request->validate([
            'new_name' => 'string|max:255|nullable',
            'new_email' => 'email|nullable',
            'new_phone' => 'string|min:8|max:20|nullable',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'new_bio' => 'string|max:500|nullable'
        ]);

        $User = User::find(Auth::id());

        if ($request->filled('new_name')) {
            $User->name = $request->new_name;
        }

        if ($request->filled('new_email')) {
            $User->email = $request->new_email;
        }

        if ($request->filled('new_phone')) {
            $User->phone = $request->new_phone;
        }

        if ($request->filled('new_bio')) {
            $User->bio = $request->new_bio;
        }

        if ($request->hasFile('profile_image')) {
            if ($User->profile_picture_url && !filter_var($User->profile_picture_url, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($User->profile_picture_url);
            }
            $imagePath = $request->file('profile_image')->store('profile-pictures', 'public');
            $User->profile_picture_url = $imagePath;
        }

        $User->save();

        return redirect()->route('settings');
    }

    public function RenderSettingsPage()
    {
        return view('common/settings');
    }
}
