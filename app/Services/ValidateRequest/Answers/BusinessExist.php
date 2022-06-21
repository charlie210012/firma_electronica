<?php

namespace App\Services\ValidateRequest\Answers;

use App\Models\Business;
use App\Services\ValidateRequest\Implementations\ValidationsAnswers;

class BusinessExist implements ValidationsAnswers
{
    public function outPut($request)
    {
        $business = Business::where('business_name',$request->business_name)->first();

        if($business){
            return response([
                'mensaje'=>'Negocio ya existe en el sistema, trata con un nombre diferente'
            ]);
        }

        if(isset($request->business_id)){
            $business = Business::find($request->business_id);
            if(!$business){
                return response([
                    'mensaje'=>'No puedes registrar un usuario, el negocio no existe'
                ]);
            }
        }
        
        
    }
}