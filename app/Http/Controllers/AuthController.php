<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function Sign_In()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        if (!Auth::attempt(request()->only('email', 'password'), request()->filled('remember'))) {
            return redirect()->route('login')->with('error', 'Invalid email or password');
        }
        session()->regenerate();
        return redirect()->route('home');
    }

    public function Sign_Up()
    {
        request()->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:8',
            'role'      => 'required|in:investor,entrepreneur',
        ]);

        $New_user = new User;
        $hashedPassword = Hash::make(request('password'));
        $New_user->name = request('full_name');
        $New_user->email = request('email');
        $New_user->password = $hashedPassword;
        $New_user->role = request('role');

        $New_user->save();

        Auth::login($New_user);
        return redirect()->route('home');
    }

    public function Sign_Out()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'You have been signed out.');
    }
}
