<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');
        $remember = $request->filled('remember_me');

        if (Auth::attempt($credential, $remember)) {
            return redirect()->intended('/');
        }

        return back()->with(
            'error', 'Please check your password and account name and try again',
        );
    }

}
