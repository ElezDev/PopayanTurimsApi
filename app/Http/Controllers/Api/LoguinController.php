<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Bridge\AccessToken;
use Illuminate\Support\Facades\Auth;
class LoguinController extends Controller
{
    public function store(Request $request){


        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|',
        ]);

        $user = User::create($request->all());


        $credentials = $request->only('email','password');


        if(!Auth::attempt($credentials)){
            return response([
                "message"=>"Usuario  y/ocontraseña incorrecta"
            ],401);
        }

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'user'=> $user,
            'access_token'=>$accessToken
        ]);

    }

}
