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
		<form method="POST" enctype="multipart/form-data">
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

			Foto: <br>
			<input type="file" name="foto" accept="image/gif, image/png, image/jpg,  image/jpeg"> <br><br>

			<!-- arrumar banco de dados -->

			<input type="submit" name="Cadastrar">
		</form>
		<hr>
	</div>

</body>
</html>


<?php 

	define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

	if($_SERVER["REQUEST_METHOD"] === "POST"){

		try{
			include("conexao.php");
			$ra = $_POST['ra'];
			$nome = $_POST['nome'];
			$curso = $_POST['curso'];

			$foto = $_FILES['foto'];
			$nomeFoto = $foto['name'];
			$tipoFoto = $foto['type'];
			$tamanhoFoto = $foto['size'];

			if((trim($ra) == "") || (trim($nome) == "")){
				echo "<div style= 'margin-left: 10%; margin-right: 10%; margin-top: 10%;'> 
						<span style='text-align: center; '> Ra e nome são obrigatórios! </span>
					  </div>";

			}else if(($nomeFoto != "") && (!preg_match('/^image\/(jpg|jpeg|png|gif)$/', $tipoFoto))){

				echo "<div style= 'margin-left: 10%; margin-right: 10%; margin-top: 10%;'> 
						<span style='text-align: center; '> Selecione uma imagem válida (jpeg, png, gif) </span>
					  </div>";
			
			}else if($tamanhoFoto > TAMANHO_MAXIMO){

				echo "<div style= 'margin-left: 10%; margin-right: 10%; margin-top: 10%;'> 
						<span style='text-align: center; '> A imagem deve possuir no máximo 2MB</span>
					  </div>";
			}else{

				$stmt = $pdo->prepare("select * from alunos where ra = :ra");
				$stmt->bindParam(':ra', $ra);
				$stmt->execute();

				$rows = $stmt->rowCount();

				if($rows<=0){

					if($nomeFoto == ""){
						$fotoBinario = null;
					} else{
						$fotoBinario = file_get_contents($foto['tmp_name']);
					}
					$stmt = $pdo->prepare("insert into alunos (ra, nome, curso, foto) values (:ra, :nome, :curso, :foto)");
					$stmt->bindParam(':ra',$ra);
					$stmt->bindParam(':nome',$nome);
					$stmt->bindParam(':curso',$curso);
					$stmt->bindParam(':foto',$fotoBinario);
					$stmt->execute();

					echo "<span style= 'margin-left: 10%; margin-right: 10%; margin-top: 15%;'> Aluno cadastrado com sucesso</span>";
				}else{
					echo "<span style= 'margin-left: 10%; margin-right: 10%; margin-top: 15%;'> Esse RA já foi cadastrado! </span>";
				}
			}
		}catch (PDOException $e){
			echo "<span style='margin-left: 10%; margin-right: 10%; margin-top: 15%;'>". $e . "</span>";
		}
	}
	
 ?>