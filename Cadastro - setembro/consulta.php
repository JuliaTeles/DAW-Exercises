<!DOCTYPE html>
<html>
<head> 

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consulta | Atv Cadastro</title>

</head>
<body>
	<a href="index.html">Menu</a> | <a href="cadastra.php">Cadastrar</a>
	<hr>

	<div style= "margin-left: 10%; margin-right: 10%; margin-top: 10%;">
		<p style="text-align: center; font-size: 40px;">Consulta de Alunos</p>
		<hr>
			<form method="post">
			RA: 
			<input type="text" size="10" name="ra">
			<br><br>
				<button type="submit">Consultar</button>
			</form>
			<br><hr><br>

	</div>

</body>
</html>

<?php 
	if($_SERVER["REQUEST_METHOD"] === 'POST'){
		include("conexao.php");

		if(isset($_POST["ra"]) && (trim($_POST["ra"]) != "")){
			$ra = $_POST["ra"];
			$stmt = $pdo->prepare("select * from alunos where ra = :ra order by curso, nome, foto");
			$stmt->bindParam(':ra',$ra);
		}else{
			$stmt = $pdo->prepare("select * from alunos order by curso, nome, foto");
		}

		try{

			$stmt->execute();

			echo "	<div style= 'margin-left: 10%; margin-right: 10%;'>
					<form method='post'>
					<table border='1px'>";
			echo "<tr>
					<th></th> <th>RA <th>Nome</th> <th>Curso</th> <th>Foto</th>
				  </tr>";

			while($row = $stmt->fetch()){
				echo "<tr>";
				echo "<td> <input type='radio' name='raAluno' value='" . $row['ra'] . "'> </td>";
				echo "<td>" . $row['ra'] . "</td>";
				echo "<td>" . $row['nome'] . "</td>";
				echo "<td>" . $row['curso'] . "</td>";
				if($row["foto"] == null){
					echo "<td align='center'> - </td>";
				}else{
					echo "<td align='center'><img src='data:image;base64," . base64_encode($row["foto"]) . "' width='50px' height='50px'> </td>";
				}
				echo "</tr>";

			}


			echo "</table><br>
			<hr><br>
			<button type='submit' formaction='remove.php'>Excluir</button>
			<button type='submit' formaction='edicao.php'>Editar</button>

			<br><hr><br><br>
			</div>
			</form>";
		}catch(PDOException $e){
			echo 'Error: ' . $e->getMessage();
		}
		$pdo = null;
	}
?>