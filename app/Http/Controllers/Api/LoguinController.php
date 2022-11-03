<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Laravel\Passport\Bridge\AccessToken;
use Illuminate\Support\Facades\Auth;


class LoguinController extends Controller
{

    public function loguin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required|string|min:5|',
        ]);



        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response([
                "message" => "Datos incorrectos"
            ], 401);
        }
        $accessToken=Auth::user()->createToken('authTestToken')->accessToken;
        return response([

            'user'=> Auth::user(),
            'access_token'=>$accessToken
        ]);
    }
}
