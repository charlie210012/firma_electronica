<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo de notificación</title>
</head>
<body>
    <h1>Solicitud de firma</h1>
    <p>Debe ingresar a este link {{url("/custody/".$data->data['tokenView'])}}
    <p>usa esta otp {{$data->data['otp']}} para confirmar tu solicitud</p>
</body>
</html>
