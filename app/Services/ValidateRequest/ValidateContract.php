<?php

namespace App\Services\ValidateRequest;


class ValidateContract
{
    public static function BusinessContracts()
    {
        $contracts = [
            'Campos vacios'=>'EmptyFields',
            'Negocio Existe'=>'BusinessExist'
        
        ];
        return $contracts;
    }
    public static function UserContracts()
    {
        $contracts = [
            'Campos vacios'=>'UserEmptyFields',
            'Negocio Existe'=>'BusinessExist',
            'Usuario Existe en el negocio'=>'UserBusinessExist'
        
        ];
        return $contracts;
    }
}