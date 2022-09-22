<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exclusão | Atv Cadastro</title>
</head>
<body>
	<a href="index.html">Menu</a> | <a href="consulta.php">Consultar</a> | <a href="cadastra.php">Cadastrar</a>
	<hr>
	<div style= "margin-left: 10%; margin-right: 10%; margin-top: 10%;">
		<p style="text-align: center; font-size: 40px;">Exclusão de Alunos</p>
	</div>
</body>
</html>

<?php

	if(!isset($_POST["raAluno"])){
		echo "<p style='text-align: center;'>Selecione o aluno a ser excluído!</p>";
	}
	else{

		include("conexao.php");
		
		$ra = $_POST["raAluno"];
		try{

			$stmt = $pdo->prepare('DELETE FROM alunos WHERE ra = :ra');
			$stmt->bindParam(':ra', $ra);
			$stmt->execute();

			echo  "<p style='text-align: center;'>" . $stmt->rowCount() . " aluno com o RA - $ra removido!</p>";

		}catch(PDOException $e){
			echo 'Error: ' . $e->getMessage();

		}

		$pdo = null;

	}

?>