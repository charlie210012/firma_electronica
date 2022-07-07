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
        $data = [
            'name'=>$request->name,
            'redirect'=>$request->redirect,
            'confidential'=>true
        ];

        $info = json_decode(json_encode($data),true);
        $response = $Clients->store($info);
        Log::info($response);
    }
    
}
