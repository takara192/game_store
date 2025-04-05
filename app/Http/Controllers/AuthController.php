<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:6|string',
            'email' => 'required|email|string|unique:users,email',
            'password' =>'required|min:6|confirmed|string',
            'term' => 'accepted'
        ], [
            'email.unique' => 'This email has already used!'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
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
        ) ->withInput();
    }

}
