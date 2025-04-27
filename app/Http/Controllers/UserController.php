<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function EditProfile()
    {
        request()->validate([
            'new_name' => 'string|max:255',
            'email'     => 'email|unique:users,email',
            'phone'     => 'string|min:8|max:20',
            'profile_picture_url'  => 'string|max:200',
            'bio'   => 'string|max:500'
        ]);
       
        $User = User::find(Auth::id());
        $User->name = request('new_name');
        $User->email = request('new_email');
        $User->phone = request('new_phone');
        request('new_profile')? $User->profile_picture_url = request('new_profile'): $User->profile_picture_url = ' https://i.pinimg.com/474x/07/c4/72/07c4720d19a9e9edad9d0e939eca304a.jpg';
        $User->bio = request('new_bio');
        $User->save();

        return redirect()->route('settings');
    }
    public function RenderSettingsPage(){
        return view('common/settings');
    }
}
