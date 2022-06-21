<?php

namespace App\Services\ValidateRequest;

class ValidateRequest
{
    public static function evaluate($request,$type)
    {
        $method = $type."Contracts";
        $responseValidations = ValidateContract::$method();
        $validation = new ResponseValidation();

        foreach($responseValidations as $responseValidation){
            $method = '\\App\\Services\\ValidateRequest\\Answers\\'.$responseValidation;
            if(!empty($validation->response(new $method,$request))){
               return $validation->response(new $method,$request);
            }
        }
    }
}