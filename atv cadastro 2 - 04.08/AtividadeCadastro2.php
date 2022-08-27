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
		RA: <br>
		<input type="text" name="ra">

		<br><br>

		Nome: <br>
		<input type="text" name="nome">

		<br><br>

		Curso: <br>
		<select name="curso">
			<option></option>
			<option value="Edificações">Edificações</option>
			<option value="Enfermagem">Enfermagem</option>
			<option value="Geodesia">Geodesia</option>
			<option value="Informatica">Informatica</option>
			<option value="Mecanica">Mecanica</option>
			<option value="Qualidade">Qualidade</option>
		</select> 

		<br><br>
		<input type="submit" value="Cadastrar">
		
	</form>

</body>
</html>

<?php

	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$ra = $_POST["ra"];
		$nome = $_POST["nome"];
		$curso = $_POST["curso"];

		if((trim($ra) == "") || (trim($nome) == "")){
			echo "RA e nome são obrigatórios!";
		}else{
			echo "Dados cadastrados com sucesso!";
		}
	}




?>