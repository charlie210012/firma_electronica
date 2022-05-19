<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tenant;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

//cambiar a user controler
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user=Validator::make($request->all(),[
            'email'=>'email|required',
            'password'=>'required',
            'nit'=>'required',
            'typeUser'=>'required'
        ]);
        if ($user->fails()) {
            return response([
                'mensaje'=> 'Todos los datos son requeridos'
                // mejorar respuesta
            ]);
        }
       $tenantexist = tenant::where('nit',$request->nit)->first();

       return $tenantexist;
       die();

        
        $accessToken = Auth()->user()->createToken('authToken')->accessToken;

        return response([
            'user' => Auth()->user(),
            'accessToken'=> $accessToken
        ]);


    }

    public function create(Request $request)
    {
       
        $userData=Validator::make($request->all(),[
            'email'=>'email|required',
            'password'=>'required',
            'nit'=>'required',
            'typeUser'=>'required'

        ]);

        if ($userData->fails()) {
            return response([
                'mensaje'=> 'Todos los datos necesarios'
                // 'recurso' => 'Registrate en la siguiente url',
                // 'url' => env('APP_URL').'sign-up'
            ]);
        }

        $tenantexist = tenant::where('nit',$request->nit)->first();

        if(!$tenantexist){
            return response([
                'mensaje'=> 'El negocio no esta registrado en el sistema'
                // 'recurso' => 'Registrate en la siguiente url',
                // 'url' => env('APP_URL').'sign-up'
            ]);
        }
        //validar existencia
        User::create([
            'email'=>$request->email,
            'password'=>$request->password,
            'typeUser'=>$request->typeUser,
            'business_id'=>$tenantexist->id,
        ]);

        return response([
            'mensaje'=> 'El recurso ha sido registrado con exito'
            // 'recurso' => 'Registrate en la siguiente url',
            // 'url' => env('APP_URL').'sign-up'
        ]);

    }
}
