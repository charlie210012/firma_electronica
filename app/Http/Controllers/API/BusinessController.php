<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Services\ValidateClient\ValidateClient;
use App\Services\ValidateRequest\ValidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BusinessController extends Controller
{
    public function index(Request $request)
    {
        $client_id = ValidateClient::client($request->bearerToken());
        //usar un resource para la respuesta
        return response([
            'Negocios Registrados'=>Business::where('client_id',$client_id)->get()
        ]);

    }

    public function create(Request $request)
    {
       
        $evaluate = ValidateRequest::evaluate($request,'Business');
        if(!empty($evaluate)) {
            return $evaluate;
        }

        $client_id = ValidateClient::client($request->bearerToken());
        $business = Business::create([
            'business_name'=>$request->business_name,
            'client_id'=>$client_id,
            'token'=>Hash::make($request->business_name.$client_id)
        ]);
        return response([
            'mensaje'=>'El negocio a sido creado correctamente',
            'datos'=>json_decode(json_encode([
                'business_id'=>$business->id,
                'name'=>$business->business_name,
                'token'=>$business->token
            ]),true)
        ]);
    }
}
