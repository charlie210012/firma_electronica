<?php

namespace App\Services\ValidateRequest\Answers;

use App\Models\Business;
use App\Models\User;
use App\Services\ValidateClient\ValidateClient;
use App\Services\ValidateRequest\Implementations\ValidationsAnswers;

class UserBusinessExist implements ValidationsAnswers
{
    public function outPut($request)
    {
        $client_id = ValidateClient::client($request->bearerToken());
        $user = User::where([
            'email'=>$request->email,
            'client_id'=>$client_id,
            'business_id'=>$request->business_id
        ])->first();

        if($user){
            return response([
                'mensaje'=>'El usuario ya esta registrado en este negocio'
            ]);
        }

        
        
        
    }
}