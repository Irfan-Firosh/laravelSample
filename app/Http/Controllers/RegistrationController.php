<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function register() {
        return view('register.create');
    }
    public function store(Request $request) {
        request()->validate([
            'email' => 'required|email|max:255|unique:users,email',
            'username' => 'required|max:255|min:3|unique:users,name',
            'password' => 'required|max:12|min:7|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|max:12|min:7'
        ]);
        $remember = $request->input('frem');
        $data = $request->all();
        $user = new User;
        $user->name = $data['username'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        Auth::login($user, $remember);
        $request->session()->regenerate();
        return redirect("/dashboard")->with('success', 'Your account has been created!');
    }
}
