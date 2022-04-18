<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email'=> 'email|required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($loginData)){

            return response([
                'mensaje'=> 'informacion invalida',
                'recurso' => 'Registrate en la siguiente url',
                'url' => env('APP_URL').'sign-up'
            ]);
        }

        
        $accessToken = Auth()->user()->createToken('authToken')->accessToken;

        return response([
            'user' => Auth()->user(),
            'accessToken'=> $accessToken
        ]);


    }
}
