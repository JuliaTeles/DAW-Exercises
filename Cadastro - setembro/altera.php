<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar | Atv Cadastro</title>
</head>
<body>
	<a href="index.html">Menu</a> | <a href="consulta.php">Consultar</a> | <a href="cadastra.php">Cadastrar</a>
	<hr>
	<div style= "margin-left: 10%; margin-right: 10%; margin-top: 10%;">
		<p style="text-align: center; font-size: 40px;">Editar Alunos</p>
		<hr>
	</div>

</body>
</html>

<?php
	include("conexao.php");

	$ra = $_POST['ra'];
	$novoNome = $_POST['nome'];
	$novoCurso = $_POST['curso'];

	$foto = $_FILES['foto'];
	$nomeFoto = $foto['name'];
	$tipoFoto = $foto['type'];
	$tamanhoFoto = $foto['size'];

	try{
		if($nomeFoto != ""){
			$fotoBinario = file_get_contents($novaFoto['tmp_name']);
			$stmt = $pdo->prepare('UPDATE alunos SET nome = :novoNome, curso = :novoCurso, foto = :novaFoto WHERE ra = :ra');
			$stmt->bindParam(':novoNome', $novoNome);
			$stmt->bindParam(':novoCurso', $novoCurso);
			$stmt->bindParam(':novaFoto', $fotoBinario);
			$stmt->bindParam(':ra', $ra);
		} else{
			$stmt = $pdo->prepare('UPDATE alunos SET nome = :novoNome, curso = :novoCurso WHERE ra = :ra');
			$stmt->bindParam(':novoNome', $novoNome);
			$stmt->bindParam(':novoCurso', $novoCurso);
			$stmt->bindParam(':ra', $ra);
		}
			$stmt->execute();

			echo "Os dados do aluno $ra foram alterados!";

	}catch(PDOException $e){
			echo 'Error: ' . $e->getMessage();
	}

		$pdo = null;

?>

