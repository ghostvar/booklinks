<?php

namespace App\Http\Controllers;

use App\Route;
use App\Legislature;
use App\User;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class AuthController extends Controller {

    public function login(Request $request) {
        $credentials = $request->only('username', 'password'); // grab credentials from the request
        try {
            if (!$token = JWTAuth::attempt($credentials)) { // attempt to verify the credentials and create a token for the user
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500); // something went wrong whilst attempting to encode the token
        }

        return response()->json(['token' => "Bearer $token"]);
    }

    public function register(Request $request) {
        // $request->validate(
        //     [
        //         'username' => 'required|string|max:255|unique:users',
        //         'password' => 'required|string|min:6|confirmed'
        //     ]
        // );
        $user = new User();
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $token = JWTAuth::attempt($request->only('username', 'password'));
        return response()->json(['token' => "Bearer $token"]);
    }
}
?>
