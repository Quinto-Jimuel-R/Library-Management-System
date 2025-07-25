<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string'],
        ]);

        if(Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->intended('/user/book');
            }

            return redirect('login')->with('error', 'Unauthorized access');
        }

        return back()->withErrors([
            'invalid' => 'Incorrect email or password',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('login')->with('success', 'You have been logout');
    }
}
