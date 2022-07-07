<?php

namespace App\Http\Controllers\API;

use App\Events\signatureRequest;
use App\Http\Controllers\Controller;
use App\Models\autentic;
use App\Models\Business;
use App\Models\firma;
use App\Models\tokenView;
use App\Models\User;
use App\Services\ValidateClient\ValidateClient;
use App\Services\ValidateRequest\ValidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Laravel\Passport\Client;
use PDF;
use PDFMerger;


class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Crear sistema de logs (Estado: pendiente)
    public function index()
    {
        return response([
            'message'=>'Esta es la api de forma electronica'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Delegar la responsabilidad de verificacion a la plataforma
        //Recordar hacer una validacion de datos
        $evaluate = ValidateRequest::evaluate($request,'Sign');
        if(!empty($evaluate)) {
            return $evaluate;
        }

        $client_id = ValidateClient::client($request->bearerToken());
        if(isset($request)){
            $users = User::where([
                'client_id'=>$client_id,
                'business_id'=>$request->business_id
                ])->get();

            // var_dump($users);
            // die();

            //mejorar sistema de validaciones
            //evitar que el mismo documento se firme dos veces

            if(!empty($users)){
                $file = $request->file('document')->store('public/document');

                if($file){

                    foreach($users as $user){
                        $rastro = firma::create([
                            'name_document' => $request->nameDocument,
                            'user_id'=>$user->id,
                            'business_id'=>$request->business_id,
                            'verify'=>Hash::make($user->id.$client_id.$request->nameDocument.now()),
                            'url'=>$request->file('document')->hashName(),
                            'otp'=>Str::random(6),
                            'status'=>0
                        ]);
                        $token = tokenView::create([
                            'firma_id'=>$rastro->id,
                            'client_id'=>$client_id,
                            'user_id'=>$user->id,
                            'business_id'=>$request->business_id,
                            'tokenView'=>md5('verify'.$user->id.$client_id.$request->business_id.$rastro->id.now().'view')
                        ]);
                        $data = [
                            'otp' =>$rastro->otp,
                            'email'=>$user->email,
                            'tokenView'=>$token->tokenView,
                            'rastro' =>$rastro,
                            'nameDocument'=>$request->nameDocument
                        ];
                        event(new signatureRequest($data));
                    }

                    return response([
                        'message'=>'La solicitud ha sido iniciada con exito',
                        'fecha de registro'=>now()
                    ]);
                }
            }else{
                return response([
                    'message'=>'La solicitud No ha sido procesada',
                    'advertencia'=>'Cliente no existe en el sistema'
                ]);
            }
        }
        
    }

    public function sign(Request $request)
    {
        $user = User::find($request->user_id);
        $firma =firma::find($request->firma_id);


        if($firma->otp !== $request->otp){
            return Redirect("/custody/$request->token")->with('otp',true);
        }else{
           $firma->status=1;
           $firma->save();

           return Redirect("/custody/$request->token")->with('status',true);
        }
        


        
    }

    public function Generatefirma($firmas)
    {
        //mejorar querys con relaciones

        date_default_timezone_set('America/Bogota');
    
        $client =  User::find($firmas[0]->user_id)->client_id;
        $dateClient = Client::find($client);
        $users = User::where('client_id',$client)->get();
        $autentic = autentic::all();
        $business = Business::all();
        $pdf = PDF::loadView('firmas.firma',[
            'firmas'=>$firmas,
            'usuarios'=>$users,
            'autentic'=>$autentic,
            'cliente'=>$dateClient,
            'negocios'=>$business
        ])
        ->save(storage_path('/app/public/signature/') .$client. 'archivo.pdf');
    }

    public function mergePdf($firmas)
    {
        $client =  User::find($firmas->first()->user_id);
        $users = User::where('client_id',$client)->get();
        $oMerger = PDFMerger::init();

        $oMerger->addPDF(storage_path('/app/public/document/'.$firmas->first()->url), 'all');
        $oMerger->addPDF(storage_path('/app/public/signature/'.$client->client_id.'archivo.pdf'), 'all');

        $oMerger->merge();
        $oMerger->save(storage_path('/app/public/completed/').$client->client_id.'merged_result.pdf');
    }

    public function custody($tokenView)
    {
        
        if(!empty($tokenView)){          
            $registro = tokenView::where('tokenView',$tokenView)->first();
            $firma = firma::find($registro->firma_id);
            $user = User::find($registro->user_id);
            $autentic = autentic::where('user_id',$registro->user_id)->first();
            $client = Client::find($registro->client_id);

            if(!$autentic){
                return view('custody.autentic',[
                    'registro' => $registro
                ]);
            }else{
                if($firma->status == 1){
                    return view('custody.custody',[
                        'registro'=> $registro,
                        'user'=>$user,
                        'firma'=>$firma,
                        'cliente'=>$client,
                        'status'=>true
                    ]);
                }
                return view('custody.custody',[
                    'registro'=> $registro,
                    'user'=>$user,
                    'firma'=>$firma,
                    'cliente'=>$client,
                ]);
            }
        }
    }

    public function process(Request $request)
    {
        //Hacer la validaciones correctas
        //Hacer validaciones de fecha
        $firma = firma::find($request->firma_id);
        $user =User::find($request->user_id);
        $registro = tokenView::where('tokenView',$request->token)->first();
       
        if(!Hash::check($request->password,$user->password)){
            return view('custody.autentic',[
                'registro' => $registro,
                'mensaje'=>'Error en las credenciales'
            ]);
        }


        $autentic = autentic::create([
            'user_id'=>$request->user_id,
            'identifier'=>$request->identifier,
            'expeditionDate'=>strtotime($request->dateExpedition),
            'phone'=>$request->phone,
            'birthdayDate'=>strtotime($request->dateBirth)
        ]);

        return $this->custody($request->token);

    }

    public function document(Request $request)
    {
        $firmas = firma::where([
            'url'=>$request->dir,
            'status'=>1
            ])->get();

    

        if(!isset($firmas[0])){
            if($request->dir){
                $filename = '/app/public/document/'.$request->dir;
                $path = storage_path($filename);

                return response(file_get_contents($path), 200)
                  ->header('Content-Type', 'application/pdf');
            }
        }else{
            $this->Generatefirma($firmas);
            $this->mergePdf($firmas);
            $client =  User::find($firmas->first()->user_id);
            $filename = '/app/public/completed/'.$client->client_id.'merged_result.pdf';
                $path = storage_path($filename);

                return response(file_get_contents($path), 200)
                  ->header('Content-Type', 'application/pdf');
        }
       

    }
}
