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

	if(!isset($_POST["raAluno"])){
		echo "<p style='text-align: center;'>Selecione o aluno a ser editado!</p>";
	}
	else{

		
		$ra = $_POST["raAluno"];
		include("conexao.php");
		try{

			$stmt = $pdo->prepare('select * from alunos where ra = :ra');
			$stmt->bindParam(':ra', $ra);
			$stmt->execute();

			$edificacoes = "";
			$enfermagem = "";
			$informatica = "";
			$qualidade = "";
			$geodesia = "";
			$mecanica = "";

			while ($row = $stmt->fetch()){
				if($row['curso'] == "Edificações"){
					$edificacoes = "selected";
				} else if($row['curso'] == "Enfermagem"){
					$enfermagem = "selected";
				} else if($row['curso'] == "Informática"){
					$informatica = "selected";
				} else if($row['curso'] == "Qualidade"){
					$qualidade = "selected";
				} else if($row['curso'] == "Geodésia"){
					$geodesia = "selected";
				} else if($row['curso'] == "Mecânica"){
					$mecanica = "selected";
				}
			echo  "<div style= 'margin-left: 10%; margin-right: 10%;'>\n
		<form method='POST' action='altera.php'>\n
			RA: \n
			<input type='text' size='10' name='ra' value ='$row[ra]' readonly >\n
			<br><br>

			Nome:\n
			<input type='text' size='30' name='nome' value ='$row[nome]'>\n
			<br><br>

			Curso:\n
			<select name='curso'>\n
				<option></option>\n
				<option value='Informática' $informatica> Informática</option>\n
				<option value='Enfermagem' $enfermagem> Enfermagem</option>\n
				<option value='Edificações' $edificacoes> Edificações</option>\n
				<option value='Qualidade'$qualidade> Qualidade</option>\n
				<option value='Mecânica' $mecanica> Mecânica</option>\n
				<option value='Geodésia' $geodesia> Geodésia e Cartografia</option>\n
			</select>\n
			<br><br>\n

			<input type='submit' name='Salvar' value='Salvar';>\n
		</form>\n
		<hr>\n
	</div>\n";
			}

		}catch(PDOException $e){
			echo 'Error: ' . $e->getMessage();

		}

		$pdo = null;

	}

?>