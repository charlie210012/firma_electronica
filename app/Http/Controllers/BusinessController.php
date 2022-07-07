<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Client;

class BusinessController extends Controller
{
    public function index()
    {
        return view('Admin.business',[
            'business'=>Business::all(),
            'clients'=>Client::all()
        ]);
    }

    public function create(Request $request)
    {
        $business = Business::create([
            'business_name'=>$request->business_name,
            'client_id'=>$request->client_id,
            'token'=>Hash::make($request->business_name.$request->client_id)
        ]);

        if ($business){
            return response([
                'status'=> 'OK'
            ]);
        }else{
            return response([
                'status'=> 'ERROR'
            ]);
        }

        
    }

    public function destroy(Request $request)
    {
        $negocio = Business::find($request->id);
        $negocio->revoked = 1;
        $negocio->save();
        if ($negocio){
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
