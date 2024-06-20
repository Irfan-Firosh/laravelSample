<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken($user->name . " \'s token")->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }

    function viewUser(Request $request) {
        $user = User::select('users.*', 
        DB::raw("DATE_FORMAT(created_at, '%m-%d-%Y') as formatted_created_at"),
        DB::raw("DATE_FORMAT(updated_at, '%m-%d-%Y') as formatted_updated_at"))
        ->where('email', $request->email)
        ->first();
        /* $user->created_at = $temp->format('m-d-Y');
        $temp = new \DateTime($user->updated_at);
        $user->updated_at = $temp->format('m-d-Y'); */
        return $user;
    }

    function viewOrg() {
        $orgs = Organization::all();
        foreach($orgs as $org) {
            $temp = new \DateTime($org->created_at);
            $org->formatted_created_at = $temp->format('m-d-Y');
            $temp = new \DateTime($org->updated_at);
            $org->formatted_updated_at = $temp->format('m-d-Y');
        }
        return $orgs;
    }
}
