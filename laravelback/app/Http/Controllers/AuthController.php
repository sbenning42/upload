<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $this->validate($request, []);
        if ($token = JWTAuth::attempt($request->only(['email', 'password']))) {
            return response()->json(['user' => JWTAuth::toUser($token), 'token' => $token], 201);
        } else {
            return response()->json(['errors' => 'Wrong Credentials'], 422);
        }
    }
}
