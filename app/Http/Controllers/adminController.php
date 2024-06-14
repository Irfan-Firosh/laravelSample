<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class adminController extends Controller
{
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
        request()->validate([
            'email' => 'required|email|max:255|unique:users,email',
            'username' => 'required|max:255|min:3|unique:users,name',
        ]);
        return view('admin.userUpdate')->with('id', $id);
    }

    public function update($id) {

    }

    public function destroy($id) {
        $name = User::find($id)->name;
        User::destroy($id);
        return back()->with('deletion', $name);
    }
}
