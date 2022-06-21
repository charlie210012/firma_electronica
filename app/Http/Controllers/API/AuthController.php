<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tenant;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\User;
use App\Services\ValidateClient\ValidateClient;
use App\Services\ValidateRequest\ValidateRequest;
use Firebase\JWT\JWT;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\PassportUserProvider;
use Laravel\Passport\Token;
use Symfony\Bridge\PsrHttpMessage\ArgumentValueResolver\PsrServerRequestResolver;
use Laravel\Passport\Guards\TokenGuard;
use Nyholm\Psr7\Factory\Psr17Factory;
use Symfony\Bridge\PsrHttpMessage\Factory\PsrHttpFactory;

//cambiar a user controler
class AuthController extends Controller
{
    public function index(Request $request)
    {
        $client_id = ValidateClient::client($request->bearerToken());
        //usar resource
        //validar si el business_id pertenece al cliente
        return response([
            'Usuario registrados en el negocio'=>User::where([
                'client_id'=>$client_id,
                'business_id'=>$request->business_id
                ])->get()
        ]);

        
    }

    public function create(Request $request)
    {
        $evaluate = ValidateRequest::evaluate($request,'User');
        if(!empty($evaluate)) {
            return $evaluate;
        }
        
        $client_id = ValidateClient::client($request->bearerToken());

        
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'client_id'=>$client_id,
            'business_id'=>$request->business_id
        ]);

        return response([
            'mensaje'=> 'El usuario ha sido registrado con exito'
        ]);

    }
}
