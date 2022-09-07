<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification E-mail</title>
</head>
<body>
    <h1 class="text-info">Aqui va el saludo</h1>
    <p>hola señor {{$client->nome}}{{$client->sobrenome}}</p>
    <p> le saludamos de Friends Fun</p>
    <p>se ha realizado un registro de sus datos {{$client->create_at}}</p>
    <p>con los siguientes datos</p>
    <ul>
        <li>{{$client->nome}}</li>
        <li>{{$client->sobrenome}}</li>
        <li>{{$client->rg}}</li>
    </ul>
</body>
</html>