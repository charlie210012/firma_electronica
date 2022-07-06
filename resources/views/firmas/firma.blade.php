<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @foreach ($firmas as $firma)
    <hr>
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$usuarios->where('id',$firma->user_id)->first()->name}} - {{$autentic->where('user_id',$firma->user_id)->first()->identifier}}</h5>
              <hr>
              <h5 class="card-title">Registros de notificación</h5>
              <p class="card-text">Fecha y hora de envio de notificacion: {{date($firma->created_at)}}</p>
              <p class="card-text">Fecha y hora de envio de OTP: {{date($firma->created_at)}}</p>
              <p class="card-text">Fecha y hora de firma: {{date($firma->updated_at)}}</p>
              <p class="card-text">Correo de notificación: {{$usuarios->where('id',$firma->user_id)->first()->email}}</p>
              <p class="card-text">Rastro de firma: {{$firma->verify}}</p>
              <hr>
              <h5 class="card-title">Registros del cliente</h5>
              <p class="card-text">Nombre de cliente: {{$cliente->name}}</p>
              <p class="card-text">Nombre del negocio asociado: {{$negocios->where('id',$firma->business_id)->first()->business_name}}</p>
            </div>
          </div>
        </div>
    </div>
    <hr>
    @endforeach
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>