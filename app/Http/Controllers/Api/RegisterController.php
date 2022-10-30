<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\Bridge\AccessToken;

class RegisterController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|',
        ]);

        $user = User::create($request->all());

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'user'=> $user,
            'access_token'=>$accessToken
        ]);




}



}
