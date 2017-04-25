<?php 
function renderHTML () {
	return '<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Index</title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>

	<div class="row">
		<form class="form-signin" style="text-align: center;" method="POST" action="login.php">       
			<img class="logo_img" src="img/kecskelogo1.png" />
			<input type="text" class="form-control" name="username" placeholder="Felhasználónév" required />
			<input type="password" class="form-control" name="pass" placeholder="Jelszó" required/>      
			<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-bottom: 20px;">Bejelentkezés</button>   
			<a href="reg.php">Regisztráció</a>
		</form>
	</div>

</body>
</html>';
}