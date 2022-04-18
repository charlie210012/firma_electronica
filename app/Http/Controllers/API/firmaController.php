<?php

namespace App\Http\Controllers\API;

use App\Events\signatureRequest;
use App\Http\Controllers\Controller;
use App\Models\autentic;
use App\Models\firma;
use App\Models\tokenView;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PDF;
use PDFMerger;

class firmaController extends Controller
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
        
        //Recordar hacer una validacion de datos
        if(isset($request)){
            $user = autentic::where([
                'identifier'=>$request->identifier,
                'expeditionDate'=>strtotime($request->expeditionDate)
            ])->first();
            if(!empty($user)){
                $file = $request->file('document')->store('public/document');

                if($file){
                    $rastro = firma::create([
                        'user_id'=>$user->user_id,
                        'verify'=>Hash::make($request->identifier,[
                            'user_id'=>$user->user_id,
                            'date'=>$request->expeditionDate,
                            'dateNow'=>now()
                        ]),
                        'url'=>$request->file('document')->hashName(),
                        'otp'=>Str::random(6)
                    ]);
                    $data = [
                        'otp' =>$rastro->otp,
                        'usuario'=>$user->User,
                        'rastro' =>$rastro
                    ];
                    event(new signatureRequest($data));
                    return response([
                        'message'=>'La solicitud ha sido procesada con exito',
                        'codigo de verificación'=>$rastro->verify,
                        'fecha de registro'=>now()
                    ]);
                }
            }else{
                return response([
                    'message'=>'La solicitud No ha sido procesada',
                    'advertencia'=>'Usuario no autenticado'
                ]);
            }
        }
        
    }

    public function confirm(Request $request)
    {
        if(isset($request)){
            $confirmar = firma::where([
                'otp'=>$request->otp,
                'verify'=>$request->verify
            ])->first();
            if(!empty($confirmar)){

                $this->Generatefirma($confirmar->id);
                $this->mergePdf($confirmar->id);

                //controlar la creaccion de tokenView
                $token = tokenView::create([
                    'firma_id'=>$confirmar->id,
                    'tokenView'=>md5('verify'.$confirmar->id.'view')
                ]);
                return response([
                    'message'=>'Confirmación de firma correcta',
                    'advertencia'=>'Verificacion de otp correcta',
                    'url'=>env("APP_URL").'custody/'.$token->tokenView
                ]);
            }else{
                return response([
                    'message'=>'Confirmación de firma incorrecta',
                    'advertencia'=>'Verificacion de otp incorrecta'
                ]);
            }
        }
    }

    public function Generatefirma($id)
    {
        $pdf = PDF::loadView('firmas.firma')
        ->save(storage_path('/app/public/signature/') .$id. 'archivo.pdf');
    }

    public function mergePdf($id)
    {
        $verify = firma::find($id);
        $oMerger = PDFMerger::init();

        $oMerger->addPDF(storage_path('/app/public/document/'.$verify->url), 'all');
        $oMerger->addPDF(storage_path('/app/public/signature/'.$id.'archivo.pdf'), 'all');

        $oMerger->merge();
        $oMerger->save(storage_path('/app/public/completed/').$id.'merged_result.pdf');
    }

    public function custody($tokenView)
    {
        if(!empty($tokenView)){
            $registro = tokenView::where('tokenView',$tokenView)->first();
            if($registro){
                $filename = '/app/public/completed/'.$registro->firma_id.'merged_result.pdf';
                $path = storage_path($filename);

                return response(file_get_contents($path), 200)
                  ->header('Content-Type', 'application/pdf');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function show(firma $firma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, firma $firma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function destroy(firma $firma)
    {
        //
    }
}
