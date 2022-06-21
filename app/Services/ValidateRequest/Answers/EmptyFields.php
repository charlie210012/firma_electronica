<?php

namespace App\Services\ValidateRequest\Answers;

use App\Services\ValidateRequest\Implementations\ValidationsAnswers;
use Illuminate\Support\Facades\Validator;

class EmptyFields implements ValidationsAnswers
{
    public function outPut($request)
    {
        $business=Validator::make($request->all(),[
            'business_name'=>'string|required'
        ]);

        if ($business->fails()) {
            return response([
                'mensaje'=>'Tienes que especificar el nombre del negocio enviando (business_name)',
            ]);
        }
        
        
    }
}