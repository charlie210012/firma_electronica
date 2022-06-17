<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tenant;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    public function login(Request $request)
    {
        $tenantAuth=Validator::make($request->all(),[
            'nit'=>'required',
            'verify'=>'required'
        ]);

        if ($tenantAuth->fails()) {
            return response([
                'mensaje'=> 'nit y codigo de verificacion son requeridos'
                // mejorar respuesta
            ]);
        }

        $tenant = tenant::where($request->all())->first();

        if($tenant){
            $user = User::where([
                'email'=>$tenant->email,
                'password'=>$tenant->verify
            ])->first();
    
            auth()->login($user);
        
            if(!auth()){
                return response([
                    'mensaje'=> 'informacion invalida',
                ]);
            }
    
            $accessToken = Auth()->user()->createToken('authToken')->accessToken;
    
            return response([
                'tenant' => $tenant->tenant,
                'accessToken'=> $accessToken
            ]);
        }
        return response([
            'mensaje'=> 'nit o codigo de verificacion incorrecto'
        ]);

        


    }
    public function create(Request $request)
    {

        $tenantData=Validator::make($request->all(),[
                'tenant'=> 'required',
                'nit'=>'required',
                'phone'=>'required',
                'email'=>'email|required'
            ]);

         if ($tenantData->fails()) {
            return response([
                'mensaje'=> 'Todos los datos necesarios para registrar un tenant'
                // mejorar respuesta
            ]);
        }
        $tenant = tenant::create($request->all()+['verify'=>Hash::make($request->nit,[
                'user_id'=>$request->id,
                'date'=>$request->tenant,
                'dateNow'=>now()
            ])
        ]);

        if(!$tenant){
            return response([
                'mensaje'=> 'Error al guardar tenant'
                // mejorar respuesta
            ]);
        }
       
        return response([
            'mensaje'=> 'Se creo el tenant correctamente',
            'verityCode'=>$tenant->verify
        ]);

    }
}
