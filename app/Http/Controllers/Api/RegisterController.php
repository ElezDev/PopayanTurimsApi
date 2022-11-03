<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|',
        ]);

        $user = User::create($request->all());

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'user' => $user,
            'access_token' => $accessToken
        ]);
    }

    public function loguin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response([
                "message" => "Datos incorrectos"
            ], 401);
        }

        $user = $request->user();
        $accessToken = $user->createToken('authToken')->accessToken;
        $token = $accessToken->token;
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();


        return response()->json(['data' => [
            'user' => Auth::user(),
            'access_token' => $accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($accessToken->token->expires_at)->toDateTimeString()
        ]]);
    }

}
