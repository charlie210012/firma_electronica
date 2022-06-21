<?php

namespace App\Services\ValidateRequest;

use App\Services\ValidateRequest\Implementations\ValidationsAnswers;

class ResponseValidation
{
    public function response(ValidationsAnswers $output,$request)
    {
        return $output->outPut($request);
    }
}