<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Cadastro </title>
</head>
<body>

	<h1>Cadastro de alunos</h1>

	<form method="post" action="Cadastro.php?op=save">
		RA: <br>
		<input type="text" name="ra">

		<br><br>

		Nome: <br>
		<input type="text" name="nome">

		<br><br>

		Curso: <br>
		<input type="text" name="curso">

		<br><br>
		<input type="submit" value="Cadastrar">
		
	</form>

</body>
</html>