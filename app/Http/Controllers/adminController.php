<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function showProfile() {
        $user = Admin::orderBy('id','asc')->first();
        return view('admin.profile')->with('user', $user);
    }

    public function editProfile(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|max:255|regex:/^[^@]+@[^@]+\.[^@]+$/|unique:users,email|',
            'name' => 'required|max:30|min:3|unique:users,name',
            'password' => [
                'required',
                'max:12',
                'min:7',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&~])(?=.*[a-z]).{7,12}$/',
                'required_with:password_confirmation',
                'same:password_confirmation'
            ],
            'password_confirmation' => 'required|max:12|min:7'
        ], [
            'password.regex' => 'The password must include at least one uppercase letter, one special character, and one digit.',
            'email.regex' => 'Invalid Email Address'
        ]);
        $admin = Admin::orderBy('id','asc')->first(); 
        $admin->name = $credentials['name'];
        $admin->email = $credentials['email'];
        $admin->password = bcrypt($credentials['password']);
        $admin->save();
        if (Auth::guard('admin')->attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect()->route('admin.profile.show')->with('success', 'Updated Credentials');
        }
    }

    public function dashboard() {
        $users = DB::table('users')->get()->count();
        $orgs = DB::table('organizations')->get()->count();
        return view('admin.admin-test', ['users' => $users, 'orgs' => $orgs]);
    }

    public function organizations() {
        $orgs = Organization::paginate(5);
        return view('admin.organizations', ['orgs' => $orgs]);
    }

    public function userPage() {
        $users = User::paginate(7);
        return view('admin.user', ['users' => $users]);
    }

    public function createU($id) {
        $user = User::find($id);
        return view('admin.userUpdate')->with('user', $user);
    }

    public function update($id) {
        $credentials = request()->validate([
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'name' => 'required|max:255|min:3|unique:users,name,'.$id,
        ]);
        $user = User::find($id)->update($credentials);
        $success = "Updated succesfully";
        return redirect()->route('admin.users')->with('success', $success);
    }

    public function destroy($id) {
        $name = User::find($id)->name;
        User::destroy($id);
        return back()->with('deletion', $name);
    }
}
