<?php

namespace App\Services\ValidateRequest\Answers;

use App\Services\ValidateRequest\Implementations\ValidationsAnswers;
use Illuminate\Support\Facades\Validator;

class UserEmptyFields implements ValidationsAnswers
{
    public function outPut($request)
    {
        $userData=Validator::make($request->all(),[
            'name'=>'string|required',
            'email'=>'email|required',
            'password'=>'required',
            'business_id'=>'required'
        ]);

        if ($userData->fails()) {
            return response([
                'mensaje'=> 'Debes enviar la estructura completa',
                'ejemplo'=>json_decode(json_encode([
                        "name"=>"Fulanito",
                        "email"=>"fulanito@nexura.com",
                        "password"=>12345678,
                        "business_id"=>58
                ]),true)
            ]);
        }
        
        
    }
}