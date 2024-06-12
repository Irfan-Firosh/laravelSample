<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('register.login');
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:12|min:7'
        ]);

        $remember = $request->input('frem');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Logged In!');
        }

        return back()->withErrors(['invald' => 'Invalid Email or Password']);
    }
}
