<!DOCTYPE html>
<html>
<head> 

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro | Atv Cadastro</title>

</head>
<body>
	<a href="index.html">Menu</a> | <a href="consulta.php">Consultar</a> 
	<hr>

	<div style= "margin-left: 10%; margin-right: 10%; margin-top: 10%;">
		<p style="text-align: center; font-size: 40px;">Cadastro</p>
		<hr>
		<form method="POST">
			RA: 
			<input type="text" size="10" name="ra">
			<br><br>

			Nome:
			<input type="text" size="30" name="nome">
			<br><br>

			Curso:
			<select name="curso">
				<option></option>
				<option value="Informática"> Informática</option>
				<option value="Enfermagem"> Enfermagem</option>
				<option value="Edificações"> Edificações</option>
				<option value="Qualidade"> Qualidade</option>
				<option value="Mecânica"> Mecânica</option>
				<option value="Geodésia"> Geodésia e Cartografia</option>
			</select>
			<br><br>

			<input type="submit" name="Cadastrar">
		</form>
		<hr>
	</div>

</body>
</html>


<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		try{
			$ra = $_POST['ra'];
			$nome = $_POST['nome'];
			$curso = $_POST['curso'];

			if((trim($ra) == "") || (trim($nome) == "")){
				echo "<div style= 'margin-left: 10%; margin-right: 10%; margin-top: 10%;'> 
						<span style='text-align: center; '> Ra e nome são obrigatórios! </span>
					  </div>";

			}else{
				include("conexao.php");

				$stmt = $pdo->prepare("select * from alunos where ra = :ra");
				$stmt->bindParam(':ra', $ra);
				$stmt->execute();

				$rows = $stmt->rowCount();

				if($rows<=0){
					$stmt = $pdo->prepare("insert into alunos (ra, nome, curso) values (:ra, :nome, :curso)");
					$stmt->bindParam(':ra',$ra);
					$stmt->bindParam(':nome',$nome);
					$stmt->bindParam(':curso',$curso);
					$stmt->execute();

					echo "<span style= 'margin-left: 10%; margin-right: 10%; margin-top: 15%;'> Aluno cadastrado com sucesso</span>";
				}else{
					echo "<span style= 'margin-left: 10%; margin-right: 10%; margin-top: 15%;'> Esse RA já foi cadastrado! </span>";
				}
			}
		}catch (PODException $e){
			echo "<span style='margin-left: 10%; margin-right: 10%; margin-top: 15%;'> Houve um erro viu</span>";
		}
	}
	
 ?>