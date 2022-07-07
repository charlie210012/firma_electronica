<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Client;
use Laravel\Passport\Http\Controllers\ClientController;

class ClientsController extends Controller
{
    public function index()
    {

        return view('Admin.clients',[
            'clients'=>Client::all()
        ]);
    }

    public function create(ClientController $Clients, Request $request)
    {
        
        $response = $Clients->store($request);
        if ($response){
            return response([
                'status'=> 'OK'
            ]);
        }else{
            return response([
                'status'=> 'ERROR'
            ]);
        }
    }
    
}
