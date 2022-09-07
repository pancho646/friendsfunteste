<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification E-mail</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center">
        <h1 class="text-success bg-warning">Bem-vindo</h1>    
    </div>
    
    <p>Oi, senhor {{$client->nome}} {{$client->sobrenome}}</p>
    <p> <strong> Somos Friends Fun</strong></p>
    <p>Fizemos um registro em nosso banco de dados</p>
    <p>com os seguintes dados</p>
    <ul>
        <li>Nome: {{$client->nome}}</li>
        <li>sobrenome: {{$client->sobrenome}}</li>
        <li>RG: {{$client->rg}}</li>
    </ul>

	<!--
    footer-bottom  start
    ============================= -->
	<footer id="footer-bottom">
		<div class="container bg-danger">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="block">
						<p>Email from FriendsFun Fun!!!.<a
								href="http://www.friendsfun.com"> Click aqui para mais informaçoes</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>