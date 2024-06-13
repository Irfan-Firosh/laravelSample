<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function logoutUser(Request $request) {
        Auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with('Success', 'Logged Out Succesfully!');
    }

    public function logoutAdmin(Request $request) {
        Auth('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with('Success', 'Logged Out Succesfully!');
    }
    
    
}
