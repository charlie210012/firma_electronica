<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tenant;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

//cambiar a user controler
class AuthController extends Controller
{
    public function login(Request $request)
    {
        //funcion no hace nada depurar
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

        //validar si cliente existe
        $userData=Validator::make($request->all(),[
            'name'=>'string|required',
            'email'=>'email|required',
            'password'=>'required',
            'client_id'=>'required'
        ]);

        if ($userData->fails()) {
            return response([
                'mensaje'=> 'Todos los datos necesarios'
            ]);
        }

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'client_id'=>$request->client_id
        ]);

        return response([
            'mensaje'=> 'El usuario ha sido registrado con exito'
        ]);

    }
}
