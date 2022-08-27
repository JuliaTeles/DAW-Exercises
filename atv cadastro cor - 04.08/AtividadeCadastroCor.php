<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Cadastro </title>
</head>
<body>

	<h1>Cadastro de alunos</h1>

	<form method="post">
		Nome: <br>
		<input type="text" name="nome">

		<br><br>

		Idade: <br>
		<input type="text" name="idade">

		<br><br>

		Cor: <br>
		<input type="color" name="cor">

		<br><br>
		<input type="submit" value="Cadastrar">
		
	</form>

</body>
</html>

<?php

	if($_SERVER["REQUEST_METHOD"] == 'POST'){

		$nome = $_POST["nome"];
		$idade = $_POST["idade"];
		$cor = $_POST["cor"];

		setcookie("Nome", $nome, time()+3600);
		setcookie("Idade", $idade, time()+3600);
		setcookie("Cor", $cor, time()+3600);
		setcookie("contaVisitas", 0, time()+3600);
		
		echo "Cadastro efetuado com sucesso!";
		echo "<br><br>";
	}

?>