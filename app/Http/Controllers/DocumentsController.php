<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\firma;
use App\Models\tokenView;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Client;

class DocumentsController extends Controller
{
    public function index()
    {
        return view('Admin.documents',[
            'clients'=>Client::all(),
            'firma'=>firma::all(),
            'token'=>tokenView::all(),
            'business'=>Business::all(),
            'users'=>User::all()
        ]);
    }

}
