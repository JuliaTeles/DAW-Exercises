<!DOCTYPE html>
<html>
<head> 

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

</head>
<body>

	<div style= "margin-left: 10%; margin-right: 10%; margin-top: 15%;">
		<p style="text-align: center; font-size: 40px;">Login</p>
		<hr>
			<form method="post">
	
			<input type="hidden" value="true" name="logou">

			Login: <br>
			<input type="text" name="login"> <br> <br>

			Senha: <br>
			<input type="text" name="senha"> <br> <br>

			<button type="submit">Entrar</button>

			</form>
		<hr>
	</div>

</body>
</html>


<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$login = $_POST['login'];
		$senha = $_POST['senha'];

		if(($login == 'jesus') && ($senha == '12345')) {
			session_start();

			$_SESSION['login'] = $login;
			$_SESSION['logou'] = true;

			header("location:inicio.php");

		} else {
			echo "Usuário inválido! Realize o cadastro.";
		}
	}
 ?>