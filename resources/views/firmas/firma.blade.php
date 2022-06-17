<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @foreach ($firmas as $firma)
    <div>{{$usuarios->where('id',$firma->user_id)->first()->name}}</div>
    @endforeach
</body>
</html>